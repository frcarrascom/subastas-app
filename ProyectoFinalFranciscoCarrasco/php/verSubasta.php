<?php
require_once("../clases/dbmanager.php");

// Recuperamos la información de la sesión
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
    <link rel="stylesheet" href="../css/estilo.css">
    <script src="https://kit.fontawesome.com/096ad391b4.js" crossorigin="anonymous"></script>
    <title>Subastas Sostenibles</title>
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
<?php
//si esta establecido el codigo de subasta la traemos junto a todos sus datos
if (isset($_GET['c'])) {

    $codigoSubasta = $_GET['c'];

    //traemos la subasta
    $subasta = DbManager::getSubastaCod($codigoSubasta);

    //traemos las pujas
    $pujas = DbManager::getPujas($subasta->getCodProductoSubastado());

    //establecemos la direccion de donde esta la imagen
    $direccion = "../imagenes/" . $subasta->getCodProductoSubastado() . ".jpg";

    if (empty($pujas)){
        ?>
            <div class="container col-sm-12 col-md-6 mt-5">
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-center">No hay pujas para el producto: <?php echo $subasta->getNombre() ?></h5>
                    </div>
                </div>
            </div>
        <?php
    }else{
        ?>
        <div class="container-fluid">
            <div class="row justify-content-center">
                    <div class="col-12">
                        <h5 class="text-center mt-5"><?php echo $subasta->getNombre() ?></h5>
                        <img class="imagenesP" src="<?php echo $direccion ?>" alt="Card image cap">
                    </div>
        <?php
        foreach ($pujas as $puja) {
            ?>
            <div class="card m-2 mt-5" style="width: 15rem;">
                <div class="card-body">
                    <h5 class="card-title">Puja</h5>
                </div>
                <div class="card-footer">
                    <p>Cantidad: <?php echo $puja->getCantidad() ?></p>
                    <p>Fecha de puja: <?php echo $puja->getFecha() ?></p>
                </div>
            </div>
            <?php
        }
        ?>
            </div>
            <div class="row justify-content-center mt-5">
                <a value="<?php echo $subasta->getCodProductoSubastado() ?>"
                   href="eliminarSubasta.php?c=<?php echo $subasta->getCodProductoSubastado() ?>"
                   class="alert alert-danger btn float-left mr-2">Eliminar Producto</a>
                <a href="mostrarSubastasUsuario.php" class="alert alert-info btn float-right ml-2">Volver a subastas</a>
            </div>
            </div>
<?php
    }
}
?>
<footer class="container-fluid p-0">
    <?php
    /*AÑADIMOS EL FOOTER*/
    include_once("footer.php");
    ?>
</footer>

<button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
    <i class="fas fa-arrow-up"></i>
</button>
<script type="text/javascript" src="../js/botonSubir.js"></script>
</body>
</html>