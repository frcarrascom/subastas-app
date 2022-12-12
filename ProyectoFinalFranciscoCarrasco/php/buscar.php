<?php
require_once("../clases/dbmanager.php");

session_start();

$sesion_abierta = false;

$codigoUsuario = null;

$resultados = [];

if (!isset($_SESSION['sesion']['codUsuario'])) {
    $sesion_abierta = false;
} else {
    $sesion_abierta = true;
    $codigoUsuario = $_SESSION['sesion']['codUsuario'];
}

//buscamos
if ($_POST['busqueda']){
    $buscar = $_POST['busqueda'];

    $resultado = DbManager::getSubastasNombre($buscar);

    if ($resultado){
        $resultados = $resultado;
    }else{
        $msg = "<p class='alert alert-danger'>" . "No hay ningun producto, vuelva a intentarlo" . "</p>";
    }

}else{
    $msg = "<p class='alert alert-danger'>" . "No hay ningun producto, vuelva a intentarlo" . "</p>";
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
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <?php
        if (!empty($resultados)){
            foreach ($resultados as $p){
                //establecemos el dinero a invertir
                $dineroInvertir=0;

                //obtenemos la puja mas alta
                $pujaMasAlta = DbManager::getPujaMasAlta($p->getCodProductoSubastado());

                //calculamos el dinero a invertir
                if (is_null($pujaMasAlta)){
                    $dineroInvertir = ($p->getPrecio() * $p->getDineroInvertir());
                }else{
                    $dineroInvertir = ($pujaMasAlta->getCantidad()* $p->getDineroInvertir());
                }

                //establecemos la direccion de donde esta la imagen
                $direccion = "../imagenes/" . $p->getCodProductoSubastado() . ".jpg";

                //vemos si la puja esta activa para ponerle link o no
                if ($p->getEstado() == 'activa') {

                    //comprobamos que no sea el creador de la puja
                    if ($p->getCodUsuario() !== $codigoUsuario) {

                        //descripcion recortada
                        $descripcionRecortada = substr($p->getDescripcion(), 0, 150);
                        ?>
                        <div class="card m-2" style="width: 18rem;">
                            <img class="imagenesP" src="<?php echo $direccion ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $p->getNombre() ?></h5>
                                <p class="card-text"><?php echo $descripcionRecortada ?></p>
                            </div>
                            <div class="card-footer">
                                <p>Dinero Invertido en Categoria: <?php echo number_format($dineroInvertir, 2, ',', '.') ?>€</p>
                                <a value="<?php echo $p->getCodProductoSubastado() ?>"
                                   href="pujar.php?c=<?php echo $p->getCodProductoSubastado() ?>"
                                   class="btn btn-primary links">Pujar</a>
                            </div>
                        </div>
                        <?php
                    } else {
                        //si es el creador quitamos la opcion de pujar
                        //descripcion recortada
                        $descripcionRecortada = substr($p->getDescripcion(), 0, 150);
                        ?>
                        <div class="card m-2" style="width: 18rem;">
                            <img class="imagenesP" src="<?php echo $direccion ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $p->getNombre() ?></h5>
                                <p class="card-text"><?php echo $descripcionRecortada ?></p>
                            </div>
                            <div class="card-footer">
                                <h5>No puedes pujar</h5>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    //comprobamos que no sea el creador de la puja
                    if ($p->getCodUsuario() !== $codigoUsuario) {
                        //descripcion recortada
                        $descripcionRecortada = substr($p->getDescripcion(), 0, 150);
                        ?>
                        <div class="card m-2" style="width: 18rem;">
                            <img class="imagenesP" src="<?php echo $direccion ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $p->getNombre() ?></h5>
                                <p class="card-text"><?php echo $descripcionRecortada ?></p>
                            </div>
                            <div class="card-footer">
                                <p>Dinero Invertido en Categoria: <?php echo number_format($dineroInvertir, 2, ',', '.') ?>€</p>
                                <h5>Subasta finalizada</h5>
                            </div>
                        </div>
                        <?php
                    } else {
                        //si es el creador pasamos a la siguiente iteracion del bucle
                        continue;
                    }
                }
            }
        }
        ?>
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


