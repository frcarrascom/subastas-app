<?php
require_once("../clases/dbmanager.php");

if (isset($_POST['nombre'], $_POST['apell'], $_POST["mail"], $_POST['usr'], $_POST['pass'])) {
    $nombre = $_POST['nombre'];
    $apell = $_POST['apell'];
    $mail = $_POST["mail"];
    $usr = $_POST['usr'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];

    //comprobamos que la contraseña sea igual
    if ($pass != $pass2){
        header("Location: ./paginaRegistro.php?e=3");
    }else{
        //compruebo que no exista el nombre de usuario
        $usuarioComprobar= DbManager::getCodUsr($usr = $_POST['usr']);

        if ($usuarioComprobar){
            header("Location: ./paginaRegistro.php?e=4");
        }else{
            /*   LLAMAMOS A BASE DE DATOS PARA INSERTAR USUARIO   */
            $res = DbManager::insertUser($nombre, $apell, $usr, $mail, $pass);

            if ($res) {
                header("Location: ./comprobarLogin.php?usr=" . $usr . "&pass=" . $pass);
            } else {
                //Lanza un error si no se guardan los datos en la base de datos
                header("Location: ./paginaRegistro.php?e=1");
            }
        }
    }
} else {
    /*Lanza un error */
    header("Location: ./paginaRegistro.php?e=1");
}