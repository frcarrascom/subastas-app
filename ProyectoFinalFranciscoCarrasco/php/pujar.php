<?php
require_once("../clases/dbmanager.php");
session_start();

$sesion_abierta = false;
if (!isset($_SESSION['sesion']['codUsuario'])) {
    $sesion_abierta = false;
} else {
    $sesion_abierta = true;
}

//si se ha enviado informacion del codigo de la puja se muestran los datos por pantalla
if (isset($_GET['c']) || isset($_SESSION['sesion']['codigoSubasta'])) {
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
    <?php
    //si no esta conectado no mostramos nada
    if (!$sesion_abierta) {
        ?>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <h3 class="pt-5 pl-2">No puedes pujar sin registrarte o estar conectado</h3>
            </div>
            <div class="row justify-content-center">
                <a href="login.php" title="Inicia Sesión" id="profile" class="btn btn-outline-success mt-5">Iniciar
                    Sesión
                    <i class="far fa-user"></i></a>
            </div>
        </div>
    <?php
    } else {
    //recogemos el codigo de subasta ya sea por get o por sesion
    if (isset($_GET['c'])) {
        $codigoSubasta = $_GET['c'];

    } else {
        //limpiamos codigo subasta y volvemos a meter
        $codigoSubasta = $_SESSION['sesion']['codigoSubasta'];
    }

    $_SESSION['sesion']['codigoSubasta'] = 0;
    $_SESSION['sesion']['codigoSubasta'] = intval($codigoSubasta);


    //llamamos al producto con el codigo que tiene
    $resultado = DbManager::getSubastaCod($codigoSubasta);

    //establecemos cantidad si no hay puja y cantidad inicial
    define("cantidadInicial", $resultado->getPrecio());
    $cantidad = $resultado->getPrecio();

    //guardamos la categoria
    $categoria = $resultado->getCategoria();
    $nombreCategoria = DbManager::getCategoriasCodigo($categoria);

    //recogemos puja mas alta
    $pujaAlta = DbManager::getPujaMasAlta(intval($codigoSubasta));

    //si se ha enviado la puja se guarda en base de datos y muestran los datos
    if (isset($_POST['puja'])) {

    //guardamos los datos para crear la puja
    $codPujador = $_SESSION['sesion']['codUsuario'];
    $cantidad = $_POST['nProducto'];
    $fecha = date("Y-m-d H:i:s");

    if ($cantidad < constant("cantidadInicial")) {
        $cantidad = constant("cantidadInicial");
    }

    //comprobamos si la puja es inferior o no
    if (isset($pujaAlta)){
    //comprobamos que la cantidad sea mayor para insertar nueva puja
    if ($cantidad > $pujaAlta->getCantidad()) {
        $subirPuja = DbManager::insertarPuja($codigoSubasta, $codPujador, $cantidad, $fecha);

        //si se sube la puja cambiamos el precio a subasta
        if ($subirPuja) {
            $precioNuevo = $pujaAlta->getCantidad();
        }
    }else{
    ?>
        <div class="alert alert-warning text-center mb-5" role="alert">
            <h3>El precio de la puja tiene que ser superior</h3>
        </div>
        <?php
    }
    }elseif (is_null($pujaAlta)) {
    if ($cantidad <= constant("cantidadInicial")) {
        ?>
        <div class="alert alert-warning text-center mb-5" role="alert">
            <h3>El precio de la puja tiene que ser superior</h3>
        </div>
    <?php
    } else {
        $subirPuja = DbManager::insertarPuja($codigoSubasta, $codPujador, $cantidad, $fecha);
    }
    }
    }

    //sacamos todas las ultimas pujas
    $todasPujas = DbManager::getPujas($codigoSubasta);
    //si hay pujas sacamos la cantidad
    if (isset($todasPujas)) {
        //nos quedamos con las 5 ultimas para mostrar
        $cincoUltimasPujas = array_slice($todasPujas, -5);

        //sacamos ultima puja para mostrar la cantidad
        $ultimaPuja = array_slice($todasPujas, -1);

        foreach ($ultimaPuja as $ult) {
            $cantidad = $ult->getCantidad();
        }

        //establecemos la direccion de donde esta la imagen
        $direccion = "../imagenes/" . $resultado->getCodProductoSubastado() . ".jpg";
    }
    //calculamos el dinero invertido en la categoría
    $dineroInvertir = ($cantidad * $resultado->getDineroInvertir());
    ?>
        <div class="container-fluid justify-content-center m-0 ">
            <div class="card m-2" style="width: auto;">
                <div class="card-body">
                    <img class="imagenesP mb-3" src="<?php echo $direccion ?>" alt="Card image cap">
                    <h5 class="card-title">Nombre: <?php echo $resultado->getNombre() ?></h5>
                    <p class="card-text">Descripción: <?php echo $resultado->getDescripcion() ?></p>
                    <p class="card-text">Categoría: <?php echo $nombreCategoria->getNombre() ?></p>
                    <p>Dinero a Invertir en Categoria: <?php echo number_format($dineroInvertir, 2, ',', ' ') ?></p>
                    <p>Fecha Inicio: <?php echo $resultado->getFechaInicio() ?></p>
                    <p>Fecha Final: <?php echo $resultado->getFechaFin() ?></p>
                </div>
                <div class="card-footer">
                    <p>Precio Ultima Puja: <?php echo number_format($cantidad, 2, ',', ' ') ?>€</p>
                </div>
            </div>
        </div>
        <div class="container-fluid row justify-content-center m-0">
            <div class="center-block">
                <div class="card m-2" style="width: 23rem;">
                    <div class="card-body">
                        <h5 class="card-title">5 últimas pujas</h5>
                        <?php
                        //mostramos 5 ultimas pujas
                        foreach ($cincoUltimasPujas as $pu) {
                            ?>
                            <p><?php echo "Precio: " . number_format($pu->getCantidad(), 2, ',', ' ') . "€" . " Fecha: " . $pu->getFecha(); ?> </p><?php

                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="center-block">
                <div class="card m-2" style="width: 20rem;">
                    <div class="card-body">
                        <form action="pujar.php" method="post" id="form">
                            <div class="form-group">
                                <label for="nProducto">¿Quieres pujar?</label>
                                <input type="number" class="form-control form-control-lg" name="nProducto"
                                       id="nProducto"
                                       placeholder="00€"
                                       step=".01"
                                       required>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="puja" class="btn btn-primary btn-lg">Pujar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="center-block">
                <div class="card m-2" style="width: 25rem;">
                    <div class="card-body">
                        <h5 class="card-title">Tiempo restante</h5>
                        <span id="dias"></span>
                        <span id="horas"></span>
                        <span id="minutos"></span>
                        <span id="segundos"></span>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <!--PASAMOS LAS FECHAS A JAVASCRIPT-->
            <input type="hidden" id="fechaF" name="fechaF" value="<?php echo $resultado->getFechaFin() ?>">
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
        <!--        <script type="text/javascript">
            //generamos la ruta hacia la imagen de ODS
            var rutaImagen = "<?php /*echo "$categoria"*/ ?>";
            var ruta = "../ods%20img/" + rutaImagen;
            ruta += ".jpg";

            //le pasamos la ruta a la imagen que tenemos establecida para mostrarla
            document.getElementById("imagenODS").src = ruta;
        </script>-->
        <script type="text/javascript" src="../js/temporizador.js">
            //pasamos la variable de fecha final para hacer el contador
            var fechaF = document.getElementById("fechaF");
        </script>
        <script type="text/javascript" src="../js/botonSubir.js"></script>
        </body>
        </html>
        <?php
    }
}
