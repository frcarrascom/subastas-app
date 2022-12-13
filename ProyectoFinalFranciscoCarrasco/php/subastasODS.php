<?php
require_once("../clases/dbmanager.php");

session_start();

$sesion_abierta = false;
$codigoUsuario = null;
$precioPujaMasAlta=0;

if (!isset($_SESSION['sesion']['codUsuario'])) {
    $sesion_abierta = false;
} else {
    $sesion_abierta = true;
    $codigoUsuario = $_SESSION['sesion']['codUsuario'];
}

if (isset($_GET['c'])) {

    $categoria = $_GET['c'];
    //accedemos a todos los productos que hay con esa categoria
    $resultado = DbManager::getSubastasCategoria($categoria);

    //accedemos a la categoria
    $categoriaRecibida = DbManager::getCategoriasCodigo($categoria);
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
<div class="container-fluid row align-items-center pr-0 pt-5">
    <div class="col-sm "><img id="imagenODS" src="" class="img-fluid rounded mx-auto d-block img-thumbnail mb-4"
                              alt="imagen de ODS"></div>
    <div class="col-sm">
        <p id="textoODS">
            <?php
            /*AÑADIMOS LA DESCRIPCION DE CATEGORIA*/
            echo $categoriaRecibida->getdescripcion();
            ?>
        </p>
    </div>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <?php
        //mostramos si no hay pujas
        if (empty($resultado)) {
            ?>
            <h4>No hay subastas</h4>
            <?php
        }

        //sacamos variable para mostrar el dinero total despues
        $dineroTotal = 0;
        //obtenemos la fecha de hoy para comparar
        $fechaHoy = strtotime(date("Y/m/d"));

        //si se obtienen datos de resultado mostramos las subastas que hay por pantalla
        foreach ($resultado as $re) {

            //establecemos el dinero a invertir
            $dineroInvertir=0;

            //obtenemos la puja mas alta
            $pujaMasAlta = DbManager::getPujaMasAlta($re->getCodProductoSubastado());

            //calculamos el dinero a invertir
            if (is_null($pujaMasAlta)){
                $dineroInvertir = ($re->getPrecio() * $re->getDineroInvertir());
                $precioPujaMasAlta = $re->getPrecio();
            }else{
                $dineroInvertir = ($pujaMasAlta->getCantidad()* $re->getDineroInvertir());
                $precioPujaMasAlta = $pujaMasAlta->getCantidad();
            }

            //establecemos la direccion de donde esta la imagen
            $direccion = "../imagenes/" . $re->getCodProductoSubastado() . ".jpg";

            //vemos si la puja esta activa para ponerle link o no
            if (($re->getEstado() == 'activa') && (strtotime($re->getFechaInicio()) <= $fechaHoy)) {

                //comprobamos que no sea el creador de la puja
                if ($re->getCodUsuario() !== $codigoUsuario) {

                    //descripcion recortada
                    $descripcionRecortada = substr($re->getDescripcion(), 0, 150);
                    ?>
                    <div class="card m-2" style="width: 18rem;">
                        <img class="imagenesP" src="<?php echo $direccion ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $re->getNombre() ?></h5>
                            <p class="card-text"><?php echo $descripcionRecortada ?></p>
                        </div>
                        <div class="card-footer">
                            <p>Precio Final: <?php echo number_format($pujaMasAlta->getCantidad(), 2, ',', '.') ?>€</p>
                            <p>Dinero Invertido en Categoria: <?php echo number_format($dineroInvertir, 2, ',', '.') ?>€</p>
                            <a value="<?php echo $re->getCodProductoSubastado() ?>"
                               href="pujar.php?c=<?php echo $re->getCodProductoSubastado() ?>"
                               class="btn btn-primary links">Pujar</a>
                        </div>
                    </div>
                    <?php
                    $dineroTotal += $dineroInvertir;
                } else {
                    //si es el creador quitamos la opcion de pujar
                    //descripcion recortada
                    $descripcionRecortada = substr($re->getDescripcion(), 0, 150);
                    ?>
                    <div class="card m-2" style="width: 18rem;">
                        <img class="imagenesP" src="<?php echo $direccion ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $re->getNombre() ?></h5>
                            <p class="card-text"><?php echo $descripcionRecortada ?></p>
                        </div>
                        <div class="card-footer">
                            <p>Precio Final: <?php echo number_format($pujaMasAlta->getCantidad(), 2, ',', '.') ?>€</p>
                            <p>Dinero Invertido en Categoria: <?php echo number_format($dineroInvertir, 2, ',', '.') ?>€</p>
                            <p>No puedes pujar</p>
                        </div>
                    </div>
                    <?php
                    $dineroTotal += $dineroInvertir;
                }
            } else {
                //comprobamos que no sea el creador de la puja y quitamos las que empiecen al dia siguiente
                if (($re->getCodUsuario() !== $codigoUsuario) && (strtotime($re->getFechaInicio()) <= $fechaHoy)) {
                    //descripcion recortada
                    $descripcionRecortada = substr($re->getDescripcion(), 0, 150);
                    ?>
                    <div class="card m-2" style="width: 18rem;">
                        <img class="imagenesP" src="<?php echo $direccion ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $re->getNombre() ?></h5>
                            <p class="card-text"><?php echo $descripcionRecortada ?></p>
                            <p>Precio Final: <?php echo number_format($precioPujaMasAlta, 2, ',', '.') ?>€</p>
                            <p>Dinero Invertido en Categoria: <?php echo number_format($dineroInvertir, 2, ',', '.') ?>€</p>
                        </div>
                        <div class="card-footer">
                            <h5>Subasta finalizada</h5>
                        </div>
                    </div>
                    <?php
                    $dineroTotal += $dineroInvertir;
                } else {
                    //si es el creador pasamos a la siguiente iteracion del bucle
                    continue;
                }
            }
        }
        ?>
    </div>
    <div class="container-fluid text-center mt-5 mb-5">
        <h2>Dinero Total invertido: <?php echo number_format($dineroTotal, 2, ',', '.') ?>€</h2>
    </div>
</div>
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="card m-2" style="width: 10rem;">
            <img class="card-img-top imagen" src="../ods%20img/1.jpg" alt="Card image cap"
                 onclick="javascript:window.location='subastasODS.php?c=1';">
        </div>
        <div class="card m-2" style="width: 10rem;">
            <img class="card-img-top imagen" src="../ods%20img/2.jpg" alt="Card image cap"
                 onclick="javascript:window.location='subastasODS.php?c=2';">
        </div>
        <div class="card m-2" style="width: 10rem;">
            <img class="card-img-top imagen" src="../ods%20img/3.jpg" alt="Card image cap"
                 onclick="javascript:window.location='subastasODS.php?c=3';">
        </div>
        <div class="card m-2" style="width: 10rem;">
            <img class="card-img-top imagen" src="../ods%20img/4.jpg" alt="Card image cap"
                 onclick="javascript:window.location='subastasODS.php?c=4';">
        </div>
        <div class="card m-2" style="width: 10rem;">
            <img class="card-img-top imagen" src="../ods%20img/5.jpg" alt="Card image cap"
                 onclick="javascript:window.location='subastasODS.php?c=5';">
        </div>
        <div class="card m-2" style="width: 10rem;">
            <img class="card-img-top imagen" src="../ods%20img/6.jpg" alt="Card image cap"
                 onclick="javascript:window.location='subastasODS.php?c=6';">
        </div>
        <div class="card m-2" style="width: 10rem;">
            <img class="card-img-top imagen" src="../ods%20img/7.jpg" alt="Card image cap"
                 onclick="javascript:window.location='subastasODS.php?c=7';">
        </div>
        <div class="card m-2" style="width: 10rem;">
            <img class="card-img-top imagen" src="../ods%20img/8.jpg" alt="Card image cap"
                 onclick="javascript:window.location='subastasODS.php?c=8';">
        </div>
        <div class="card m-2" style="width: 10rem;">
            <img class="card-img-top imagen" src="../ods%20img/9.jpg" alt="Card image cap"
                 onclick="javascript:window.location='subastasODS.php?c=9';">
        </div>
        <div class="card m-2" style="width: 10rem;">
            <img class="card-img-top imagen" src="../ods%20img/10.jpg" alt="Card image cap"
                 onclick="javascript:window.location='subastasODS.php?c=10';">
        </div>
        <div class="card m-2" style="width: 10rem;">
            <img class="card-img-top imagen" src="../ods%20img/11.jpg" alt="Card image cap"
                 onclick="javascript:window.location='subastasODS.php?c=11';">
        </div>
        <div class="card m-2" style="width: 10rem;">
            <img class="card-img-top imagen" src="../ods%20img/12.jpg" alt="Card image cap"
                 onclick="javascript:window.location='subastasODS.php?c=12';">
        </div>
        <div class="card m-2" style="width: 10rem;">
            <img class="card-img-top imagen" src="../ods%20img/13.jpg" alt="Card image cap"
                 onclick="javascript:window.location='subastasODS.php?c=13';">
        </div>
        <div class="card m-2" style="width: 10rem;">
            <img class="card-img-top imagen" src="../ods%20img/14.jpg" alt="Card image cap"
                 onclick="javascript:window.location='subastasODS.php?c=14';">
        </div>
        <div class="card m-2" style="width: 10rem;">
            <img class="card-img-top imagen" src="../ods%20img/15.jpg" alt="Card image cap"
                 onclick="javascript:window.location='subastasODS.php?c=15';">
        </div>
        <div class="card m-2" style="width: 10rem;">
            <img class="card-img-top imagen" src="../ods%20img/16.jpg" alt="Card image cap"
                 onclick="javascript:window.location='subastasODS.php?c=16';">
        </div>
        <div class="card m-2" style="width: 10rem;">
            <img class="card-img-top imagen" src="../ods%20img/17.jpg" alt="Card image cap"
                 onclick="javascript:window.location='subastasODS.php?c=17';">
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

    //generamos la ruta hacia la imagen de ODS
    var rutaImagen = "<?php echo "$categoria"?>";
    var ruta = "../ods%20img/" + rutaImagen;
    ruta += ".jpg";

    //le pasamos la ruta a la imagen que tenemos establecida para mostrarla
    document.getElementById("imagenODS").src = ruta;

    //añadimos un evento a los link para que rediriga a la pagina de cada producto
    for (var i = 0; i < document.getElementsByClassName('links').length; i++) {
        document.getElementsByClassName('links')[i].addEventListener("click", myFunction, false);
    }

    function myFunction() {
    }

</script>
<script type="text/javascript" src="../js/botonSubir.js"></script>
</body>
    <?php
}

