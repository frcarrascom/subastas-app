<?php
require_once("../clases/dbmanager.php");
session_start();

//declaramos resultado
$resultado = null;

/*ENVIAMOS ERROR 2 SI NO HAY ALGUN CAMPO ESCRITO*/
if ((!isset($_POST['usr']) || !isset($_POST['pass'])) && (empty($_GET['usr']) || empty($_GET['pass']))) {
    header("Location: ./login.php?e=2");
} else {
    $usr = isset($_POST['usr']) ? $_POST['usr'] : $_GET['usr'];
    $pass = isset($_POST['pass']) ? $_POST['pass'] : $_GET['pass'];

    $resultado = DbManager::logearUsuario($usr, $pass);

    if ($resultado->getCodUsuario() !== null) {

        //fecha para comprobar
        $hoy = strtotime("today");

        //traemos todos los productos y comprobamos las fechas
        $subastasPujadas = DbManager::getSubastasCompletasPujadas($resultado->getCodUsuario());

        $todasSubastasPujadas = DbManager::getTodasSubastasCompletasPujadas();

        var_dump($todasSubastasPujadas);

        //por cada producto si la fecha final es el dia de hoy se envia un mensaje a todos los pujadores
        foreach ($subastasPujadas as $ps) {

            if ($ps[3] == 'finalizada') {
                if (strtotime($ps[4]) <= $hoy) {

                    //traemos puja mas alta para avisar al usuario
                    $pujaMasAlta = DbManager::getPujaMasAlta($ps[1]);

                    //si el usuario que se loguea es el mismo de la puja mas alta se le envia un mensaje para informarle
                    if ($pujaMasAlta->getCodPujador() == $resultado->getCodUsuario()) {

                        //escribimos el mensaje
                        $mensajeGanador = "Enhorabuena, has ganado la puja con nombre= " . $ps[2];
                        $fechaHoyGanador = date("Y/m/d h:i:sa");
                        $mensajeNuevoGanador = DbManager::insertarMsg(1, $pujaMasAlta->getCodPujador(), "Subasta Ganada!!", $mensajeGanador, "NV", $fechaHoyGanador);
                    }

                    //escribimos el mensaje
                    $mensaje = "Ha finalizado la subasta con nombre= " . $ps[2];
                    $fechaHoy = date("Y/m/d h:i:sa");
                    $mensajeNuevo = DbManager::insertarMsg(1, $ps[0], "Subasta Finalizada", $mensaje, "NV", $fechaHoy);

                    //cambiamos el mensaje del producto para que no nos envien mas mensajes
                    $cambiarEstado = DbManager::cambiarEstadoSubasta($ps[1], "finalizadaNVisto");
                }
            }
        }
        $_SESSION['sesion']['codUsuario'] = $resultado->getCodUsuario();
        $_SESSION['sesion']['nombreUsuario'] = $resultado->getNombreUsuario();
        $_SESSION['sesion']['email'] = $resultado->getEmail();
        $_SESSION['sesion']['pass'] = $resultado->getPassword();
        $_SESSION['sesion']['nombre'] = $resultado->getNombre();
        $_SESSION['sesion']['apellidos'] = $resultado->getApellidos();
        header("Location: ../index.php");
    } else {
        /*ya que da error con php porque el header ha sido enviado en la pagina anterior, redirijo con javascript*/
        echo "
            <script type='text/javascript'>
                window.location.href = 'login.php?e=1';
            </script>
        ";
    }
}
?>