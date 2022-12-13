<?php
require_once("../clases/dbmanager.php");
session_start();

$sesion_abierta = false;

if (!isset($_SESSION['sesion']['codUsuario'])) {
    $sesion_abierta = false;
} else {
    $sesion_abierta = true;
}

//traemos el usuario a traves del codigo
$codigoUsuario = $_SESSION['sesion']['codUsuario'];

//traemos las subastas
$subastas = DbManager::getSubastasVendedor($codigoUsuario);

//establecemos el mensaje en nulo
$msg = null;

if (isset($_GET['b'])) {
    switch ($_GET['b']) {
        case "1":
            $msg = "<p class='alert alert-success'>" . "Producto borrado correctamente" . "</p>";
            break;
        case "2":
            $msg = "<p class='alert alert-danger'>" . "Error al borrar el producto" . "</p>";
            break;
        default:
            $msg = "<p class='alert alert-danger'>" . "Error desconocido" . "</p>";
            break;
    }
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
<div class="container-fluid mt-5">
    <div class="row text-center d-block">
        <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>
    </div>
</div>
<div class="container-fluid m-0 mt-5">
        <div class="row mt-3 justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h4 class="text-center">Subastas Activas</h4>
            </div>
            <?php
            //recorremos todas las subastas
            foreach ($subastas as $su) {

                //establecemos la direccion de donde esta la imagen
                $direccion = "../imagenes/" . $su->getCodProductoSubastado() . ".jpg";
                ?>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-3 mt-3">
                        <div class="card h-100" style="width: auto;">
                        <img class="imagenesP" src="<?php echo $direccion ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title" style="height: 150px;">Nombre: <?php echo $su->getNombre() ?></h5>
                            <p>Fecha Final: <?php echo $su->getFechaFin() ?></p>
                        </div>
                        <div class="card-footer">
                            <a value="<?php echo $su->getCodProductoSubastado() ?>"
                               href="eliminarSubasta.php?c=<?php echo $su->getCodProductoSubastado() ?>"
                               class="alert alert-danger btn float-left">Eliminar</a>
                            <a value="<?php echo $su->getCodProductoSubastado() ?>"
                               href="verSubasta.php?c=<?php echo $su->getCodProductoSubastado() ?>"
                               class="alert alert-info btn float-right">Ver Subasta</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    <!--METEMOS LAS SUBASTAS EN LAS QUE HA PUJADO-->
    <div class="container-fluid m-0 mt-5">
        <div class="row mt-3 justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h4 class="text-center">Subastas Pujadas</h4>
            </div>
            <?php
            //traemos los productos en los que se ha pujado
            $productosPujados = DbManager::getSubastasPujadas($codigoUsuario);

            //si no se han hecho pujas se muestra
            if (empty($productosPujados)) {
                ?>
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                         class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img"
                         aria-label="Warning:">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                    <div>
                        No has hecho pujas
                    </div>
                </div>
                <?php
            }
            //recorremos todas las subastas pujadas
            foreach ($productosPujados as $pj) {

                //establecemos la direccion de donde esta la imagen
                $direccion = "../imagenes/" . $pj->getCodProductoSubastado() . ".jpg";

                //si estan activas ponemos boton para pujar, si no lo mostramos
                if ($pj->getEstado() === 'activa') {
                    ?>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-3 mt-3">
                        <div class="card h-150" style="width: auto;">
                            <img class="imagenesP" src="<?php echo $direccion ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title" style="height: 150px;">Nombre: <?php echo $pj->getNombre() ?></h5>
                                <p>Fecha Final: <?php echo $pj->getFechaFin() ?></p>
                            </div>
                            <div class="card-footer">
                                <a value="<?php echo $pj->getCodProductoSubastado() ?>"
                                   href="pujar.php?c=<?php echo $pj->getCodProductoSubastado() ?>"
                                   class="btn btn-primary links">Pujar</a>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-3 mt-3">
                        <div class="card h-100" style="width: auto;">
                            <div class="card-body">
                                <h5 class="card-title" style="height: 150px;">Nombre: <?php echo $pj->getNombre() ?></h5>
                                <p>Fecha Final: <?php echo $pj->getFechaFin() ?></p>
                            </div>
                            <div class="card-footer">
                                <p>Subasta finalizada</p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
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
<script type="text/javascript" src="../js/botonSubir.js"></script>
</body>
</html>