<?php
require_once("clases/dbmanager.php");
session_start();

$sesion_abierta = false;

$codigoUsuario = null;

if (!isset($_SESSION['sesion']['codUsuario'])) {
    $sesion_abierta = false;
} else {
    $sesion_abierta = true;
    $codigoUsuario = $_SESSION['sesion']['codUsuario'];
}

//compropbamos si el producto se ha subido correctamente
$msg = null;

if (isset($_GET['b'])) {
    $msg = "<span style='color:blue'> Se ha subido el producto subastado correctamente. </span>";
}
if (isset($_GET['e'])) {
    switch ($_GET['e']) {
        case "1":
            $msg = "<span style='color:red'> Error al subir producto subastado. Intentelo de nuevo </span>";
            break;
        case "2":
            $msg = "<span style='color:red'> Error con la imagen. Intentelo de nuevo </span>";
            break;
        default:
            $msg = "<span style='color:red'> Error desconocido. </span>";
            break;
    }
}
//mostramos el pop up si es la primera vez que se entra
$visited = isset($_SESSION['visited']);
$_SESSION['visited'] = true;

//comprobamos si de verdad ha terminado una puja el mismo dia
$haySubastaFinalizada = false;

if (isset($codigoUsuario)) {
    //traemos todos los productos y comprobamos las fechas
    $subastasPujadas = DbManager::getSubastasCompletasPujadasNoVistas($codigoUsuario);
    foreach ($subastasPujadas as $ps) {
        if ($ps[3] == 'finalizadaNVisto') {
            $haySubastaFinalizada = true;

            //se cambia el estado a visto
            $cambiarEstado = DbManager::cambiarEstadoSubasta($ps[1], "finalizadaVisto");
        }
    }

    //traemos los mensajes del usuario
    $mensajesUsuario = DbManager::getMsgSinLeer($codigoUsuario);
}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
              integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
              crossorigin="anonymous">
        <link rel="icon" href="logo/logoSubastas.png">
        <script src="https://kit.fontawesome.com/096ad391b4.js" crossorigin="anonymous"></script>
        <title>Subastas Sostenibles</title>
        <link rel="stylesheet" href="css/estilo.css">
    </head>
    <body>
    <header class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <?php
                /*AÑADIMOS EL HEADER*/
                include_once("php/header.php");
                ?>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <?php
            if ($msg != null) {
                ?>
                <cuerpo class="col-md-12 alert alert-primary">
                    <?php echo $msg; ?>
                </cuerpo>
                <?php
            }
            ?>
        </div>
        <div class="row justify-content-center">
            <?php
            //obtenemos todas las subastas
            $subastas = DbManager::getAllSubastas();

            //obtenemos la fecha de hoy para comparar
            $fechaHoy = strtotime(date("Y/m/d"));

            //mostramos si no hay pujas
            if (empty($subastas)) {
                ?>
                <p>No hay Subastas</p>
                <?php
            }

            //quitamos las pujas que sean anteriores al dia de hoy
            foreach ($subastas as $actualizar) {
                //vemos que si ha pasado el tiempo las ponemos como inactivas
                if (($actualizar->getEstado() == "activa") && (strtotime($actualizar->getFechaFin()) <= $fechaHoy)) {
                    $estado = "finalizada";
                    $finalizada = DbManager::cambiarEstadoSubasta($actualizar->getCodProductoSubastado(), $estado);
                }
            }

            //si se obtienen datos de resultado mostramos las pujas que hay por pantalla
            foreach ($subastas as $res) {
                //establecemos la direccion de donde esta la imagen
                $direccion = "imagenes/" . $res->getCodProductoSubastado() . ".jpg";

                //vemos si la puja esta activa para ponerle link o no
                if (($res->getEstado() == 'activa') && (strtotime($res->getFechaInicio()) <= $fechaHoy)) {

                    //comprobamos que no sea el creador de la puja
                    if ($res->getCodUsuario() !== $codigoUsuario) {
                        //descripcion recortada
                        $descripcionRecortada = substr($res->getDescripcion(), 0, 150);

                        ?>
                        <div class="card m-2" style="width: 20rem;">
                            <img class="imagenesP" src="<?php echo $direccion ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $res->getNombre() ?></h5>
                                <p class="card-text"><?php echo $descripcionRecortada ?></p>
                            </div>
                            <div class="card-footer ">
                                <p>Precio Inicial: <?php echo number_format($res->getPrecio(), 2, ',', '.') ?>€</p>
                                <p>ODS: <?php echo $res->getCategoria() ?></p>
                                <p>Termina el: <?php echo $res->getFechaFin() ?></p>
                                <a value="<?php echo $res->getCodProductoSubastado() ?>"
                                   href="php/pujar.php?c=<?php echo $res->getCodProductoSubastado() ?>"
                                   class="btn btn-primary links">Pujar</a>
                            </div>
                        </div>
                        <?php
                    } else {
                        //si es el creador pasamos a la siguiente iteracion del bucle
                        continue;
                    }
                }
            }
            ?>
        </div>
    </div>
    <footer class="container-fluid p-0">
        <?php
        /*AÑADIMOS EL FOOTER*/
        include_once("php/footer.php");
        ?>
    </footer>
    <button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>
    <script type="text/javascript" src="js/botonSubir.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>
    </html>
<?php
$contadorMensajes = 0;

if (!$visited && $haySubastaFinalizada) {
    echo '<script type="text/javascript" src="js/sweetAlertIndex.js"></script>';
}else{
    if ($mensajesUsuario) {

        foreach ($mensajesUsuario as $me) {
            if ($me->getEstado() == 'NV') {
                $contadorMensajes++;
            }
        }

        if ($contadorMensajes > 0) {
            echo '<script type="text/javascript" src="js/sweetAlertMensajeNoVisto.js"></script>';
        }
    }
}
?>