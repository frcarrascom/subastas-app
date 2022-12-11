<?php
require_once("../clases/dbmanager.php");

// Recuperamos la información de la sesión
session_start();

//si se han enviado los datos por post los recogemos y enviamos a la base de datos
if (isset($_POST['nProducto'])) {

    //guardamos en variables todos los datos
    $nombreP = $_POST['nProducto'];
    $descripcion = $_POST['descripcion'];
    $estado = "activa";
    $categoria = $_POST['categorias'];
    $fechaI = $_POST['fechaI'];
    $fechaF = $_POST['fechaF'];
    $precioI = $_POST['precioInicial'];
    $nombreImg = $_FILES['imagen'];

    if ($precioI <= 0) {
        header("Location: ../index.php?e=1");
    } else {
        $codUsu = $_SESSION['sesion']['codUsuario'];

        //hacemos calculos para ver cuanto dinero pasa a invertir
        $porcentaje = $_POST['cantidad'];

        if ($nombreImg["name"] !== "") {

            $resultado = DbManager::insertarProductoSubastado($fechaI, $fechaF, $estado, $nombreP, $precioI, $categoria, $descripcion, $porcentaje, $codUsu);

            //recuperamos el objeto para usar el codigo para cambiarle el nombre al archivo que vamos a guardar
            $productoSubastado = DbManager::getCodigoSubastaTodo($fechaI, $nombreP, $precioI, $categoria, $codUsu);

            //guardamos la imagen
            move_uploaded_file(
            // Temp image location
                $nombreImg["tmp_name"],

                // nueva localizacion y nombre de la imagen con el codigo de producto para poder ser traido de vuelta despues
                "../imagenes/" . $productoSubastado->getCodProductoSubastado().".jpg"
            );

            if ($resultado) {
                header("Location: ../index.php?b=1");
            } else {
                header("Location: ../index.php?e=1");
            }
        } else {
            header("Location: ../index.php?e=2");
        }
    }

}
