<?php
require_once("../clases/dbmanager.php");
session_start();

$sesion_abierta = false;

if (!isset($_SESSION['sesion']['codUsuario'])) {
    $sesion_abierta = false;
} else {
    $sesion_abierta = true;
}

if (isset($_GET['c'])) {

    $codigoSubasta = $_GET['c'];

    $eliminar = DbManager::deleteSubasta($codigoSubasta);

    if ($eliminar){
        header("Location: mostrarSubastasUsuario.php?b=1");

    }else{
        header("Location: mostrarSubastasUsuario.php?b=2");
    }
}




