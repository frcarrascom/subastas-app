<?php
session_start();

$sesion_abierta = false;

if (!isset($_SESSION['sesion']['codUsuario'])) {
    $sesion_abierta = false;
} else {
    $sesion_abierta = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="../logo/logoSubastas.png">
    <script src="https://kit.fontawesome.com/096ad391b4.js" crossorigin="anonymous"></script>
    <title>Subastas Sostenibles</title>
    <link rel="stylesheet" href="../css/estilo.css">

</head>
<body>
<header class="container-fluid">
    <div class="row">
        <div class="col-md-12 p-0">

            <?php
            /*AÑADIMOS EL HEADER*/
            include_once("headerODS.php");
            ?>
        </div>
    </div>
</header>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="card m-2" style="width: 17rem;">
            <img class="card-img-top imagen" src="../ods%20img/1.jpg" alt="Card image cap"
                                   onclick="javascript:window.location='subastasODS.php?c=1';">
        </div>
        <div class="card m-2" style="width: 17rem;">
            <img class="card-img-top imagen" src="../ods%20img/2.jpg" alt="Card image cap" onclick="javascript:window.location='subastasODS.php?c=2';">
        </div>
        <div class="card m-2" style="width: 17rem;">
            <img class="card-img-top imagen" src="../ods%20img/3.jpg" alt="Card image cap" onclick="javascript:window.location='subastasODS.php?c=3';">
        </div>
        <div class="card m-2" style="width: 17rem;">
            <img class="card-img-top imagen" src="../ods%20img/4.jpg" alt="Card image cap" onclick="javascript:window.location='subastasODS.php?c=4';">
        </div>
        <div class="card m-2" style="width: 17rem;">
            <img class="card-img-top imagen" src="../ods%20img/5.jpg" alt="Card image cap" onclick="javascript:window.location='subastasODS.php?c=5';">
        </div>
        <div class="card m-2" style="width: 17rem;">
            <img class="card-img-top imagen" src="../ods%20img/6.jpg" alt="Card image cap" onclick="javascript:window.location='subastasODS.php?c=6';">
        </div>
        <div class="card m-2" style="width: 17rem;">
            <img class="card-img-top imagen" src="../ods%20img/7.jpg" alt="Card image cap" onclick="javascript:window.location='subastasODS.php?c=7';">
        </div>
        <div class="card m-2" style="width: 17rem;">
            <img class="card-img-top imagen" src="../ods%20img/8.jpg" alt="Card image cap" onclick="javascript:window.location='subastasODS.php?c=8';">
        </div>
        <div class="card m-2" style="width: 17rem;">
            <img class="card-img-top imagen" src="../ods%20img/9.jpg" alt="Card image cap" onclick="javascript:window.location='subastasODS.php?c=9';">
        </div>
        <div class="card m-2" style="width: 17rem;">
            <img class="card-img-top imagen" src="../ods%20img/10.jpg" alt="Card image cap" onclick="javascript:window.location='subastasODS.php?c=10';">
        </div>
        <div class="card m-2" style="width: 17rem;">
            <img class="card-img-top imagen" src="../ods%20img/11.jpg" alt="Card image cap" onclick="javascript:window.location='subastasODS.php?c=11';">
        </div>
        <div class="card m-2" style="width: 17rem;">
            <img class="card-img-top imagen" src="../ods%20img/12.jpg" alt="Card image cap" onclick="javascript:window.location='subastasODS.php?c=12';">
        </div>
        <div class="card m-2" style="width: 17rem;">
            <img class="card-img-top imagen" src="../ods%20img/13.jpg" alt="Card image cap" onclick="javascript:window.location='subastasODS.php?c=13';">
        </div>
        <div class="card m-2" style="width: 17rem;">
            <img class="card-img-top imagen" src="../ods%20img/14.jpg" alt="Card image cap" onclick="javascript:window.location='subastasODS.php?c=14';">
        </div>
        <div class="card m-2" style="width: 17rem;">
            <img class="card-img-top imagen" src="../ods%20img/15.jpg" alt="Card image cap" onclick="javascript:window.location='subastasODS.php?c=15';">
        </div>
        <div class="card m-2" style="width: 17rem;">
            <img class="card-img-top imagen" src="../ods%20img/16.jpg" alt="Card image cap" onclick="javascript:window.location='subastasODS.php?c=16';">
        </div>
        <div class="card m-2" style="width: 17rem;">
            <img class="card-img-top imagen" src="../ods%20img/17.jpg" alt="Card image cap" onclick="javascript:window.location='subastasODS.php?c=17';">
        </div>

    </div>
</div>
<footer class="container-fluid p-0">

    <?php
    /*AÑADIMOS EL FOOTER*/
    include_once("footer.php");
    ?>

</footer>
<button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
    <i class="fas fa-arrow-up"></i>
</button>

<script type="text/javascript">
    //aqui hacemos la funcion para que cuando se haga click en una imagen rediriga a las pujas de ese ODS


    //añadimos un evento a los link
    /*for (var i = 0 ; i < document.getElementsByTagName('a').length; i++) {
        document.getElementsByTagName('a')[i].addEventListener("click", myFunction, false);
    }*/


    /*function myFunction() {
        //alert(this.id);

        if (this.id ==1){
            //window.location.href = 'http://localhost:81/ProyectoFinalFranciscoCarrasco/php/subastasODS.phpc?1';
            window.location.href = "subastasODS.php";
        }
        //window.location.replace("http://localhost:81/ProyectoFinalFranciscoCarrasco/php/subastasODS.php");
        //window.location.href = 'http://localhost:81/ProyectoFinalFranciscoCarrasco/php/subastasODS.php';
    }*/


</script>
<script type="text/javascript" src="../js/botonSubir.js"></script>
</body>

