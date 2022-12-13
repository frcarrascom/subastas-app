<?php
require_once("../clases/dbmanager.php");

session_start();

$sesion_abierta = false;

$codigoUsuario = null;

if (!isset($_SESSION['sesion']['codUsuario'])) {
    $sesion_abierta = false;
} else {
    $sesion_abierta = true;
    $codigoUsuario = $_SESSION['sesion']['codUsuario'];
}

//si se ha enviado el mensaje buscamos al destinatario para enviarle el mensaje
if (isset($_POST['destinatario'])) {

    $destinatario = DbManager::getCodUsr($_POST['destinatario']);
    $fechaHoy = date("Y/m/d h:i:sa");

    if (!is_null($destinatario)) {
        $enviado = DbManager::insertarMsg($codigoUsuario, $destinatario->getCodUsuario(), $_POST['asunto'], $_POST['mensaje'], 'NV', $fechaHoy);

        if ($enviado) {
            $msg = "<p class='alert alert-success'>" . "Mensaje enviado correctamente" . "</p>";
        } else {
            $msg = "<p class='alert alert-danger'>" . "Error al enviar el mensaje, vuelva a intentarlo" . "</p>";
        }
    } else {
        $msg = "<p class='alert alert-danger'>" . "Error al enviar el mensaje, usuario no encontrado" . "</p>";
    }
}

//si se pulsa boton borrar se borra el mensaje
if (isset($_GET['borrar'])) {

    $mensaje = DbManager::deleteMsg($_GET['borrar']);
    if ($mensaje) {
        header("Location: mensajes.php?me=1");
    } else {
        header("Location: mensajes.php?me=2");
    }
}
if (isset($_GET['borrarE'])) {

    $mensaje = DbManager::deleteMsg($_GET['borrarE']);
    if ($mensaje) {
        header("Location: mensajes.php?meB=1");
    } else {
        header("Location: mensajes.php?meB=2");
    }
}
//redirigimos ala misma pantalla
if (isset($_GET['me'])) {
    switch ($_GET['me']) {
        case "1":
            header("Location: mensajes.php?m=1");
            break;
        case "2":
            $msg = "<p class='alert alert-danger'>" . "Error al borrar el mensaje, vuelva a intentarlo" . "</p>";
            break;
        default:
            $msg = "<span style='color:red'> Error desconocido. </span>";
            break;
    }
}
if (isset($_GET['meB'])) {
    switch ($_GET['meB']) {
        case "1":
            header("Location: mensajes.php?m=2");
            break;
        case "2":
            $msg = "<p class='alert alert-danger'>" . "Error al borrar el mensaje, vuelva a intentarlo" . "</p>";
            break;
        default:
            $msg = "<span style='color:red'> Error desconocido. </span>";
            break;
    }
}


//si se pulsa boton mensaje leido se marca como tal
if (isset($_GET['leido'])) {

    //recuperamos el mensaje
    $mensajeCambiarEstado = DbManager::getMsgCodigo($_GET['leido']);

    //cambiamos el estado del mensaje
    if ($mensajeCambiarEstado->getEstado() == 'VI') {
        $mensaje = DbManager::changeState($_GET['leido'], "NV");
        header("Location: mensajes.php?m=1");

    } elseif ($mensajeCambiarEstado->getEstado() == 'NV') {
        $mensaje = DbManager::changeState($_GET['leido'], "VI");
        header("Location: mensajes.php?m=1");

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
    <div class="row justify-content-around">
        <a href="mensajes.php?m=1" class="col-md-3 col-lg-3 col-sm-1 text-center mt-3 btn btn-primary"
           style="padding-bottom: 20px; padding-top: 20px;">Mensajes Recibidos</a>
        <a href="mensajes.php?m=2" class="col-md-3 col-lg-3 col-sm-1 text-center mt-3 btn btn-primary"
           style="padding-bottom: 20px; padding-top: 20px;">Mensajes Enviados</a>
        <a href="mensajes.php?m=3" class="col-md-3 col-lg-3 col-sm-1 text-center mt-3 btn btn-primary"
           style="padding-bottom: 20px; padding-top: 20px;">Enviar Mensaje</a>
    </div>
</div>
<div class="container-fluid m-0 p-0 mt-5 row justify-content-center">
    <?php
    if (isset($_GET['m'])) {
        switch ($_GET['m']) {
            //mensajes recibidos
            case "1":
                $mensajesRecibidos = DbManager::getMsgByReceptor($codigoUsuario);

                if (empty($mensajesRecibidos)) {
                    ?>
                    <div class="col-md-4 col-lg-4 col-sm-1 text-center">
                        <h4>No hay mensajes recibidos</h4>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="col-md-4 col-lg-4 col-sm-1 text-center">
                        <h4>Mensajes recibidos</h4>
                    </div>
                    <?php
                    foreach ($mensajesRecibidos as $meR) {

                        //recuperamos el nombre del usuario
                        $usuarioEmisor = DbManager::getUser($meR->getCodEmisor());

                        //si no estan visto los mensajes les ponemos el borde de otro color
                        if ($meR->getEstado() !== 'VI') {
                            ?>
                            <div class="card m-2 border-primary" style="width: 90%;">
                                <div class="card-body text-primary row">
                                    <p class="card-title col-sm-12 col-md-2 col-lg-2 mt-3">Enviado
                                        por: <?php echo $usuarioEmisor->getNombreUsuario() ?></p>
                                    <p class="card-text col-sm-12 col-md-2 col-lg-2 mt-3">
                                        Asunto: <?php echo $meR->getAsunto() ?></p>
                                    <p class="card-text col-sm-12 col-md-2 col-lg-2 mt-3">
                                        Enviado: <?php echo $meR->getFecha() ?></p>
                                    <p class="card-text col-sm-12 col-md-2 col-lg-3 mt-3">
                                        Mensaje: <?php echo $meR->getMensaje() ?></p>
                                    <button class='btn btn-outline-danger col-sm-12 col-md-2 col-lg-1 mt-2 ml-auto mr-1'
                                            onclick="javascript:window.location='mensajes.php?borrar=<?php echo $meR->getCodMensaje() ?>';">
                                        <i class="fa fa-trash" aria-hidden="true"></i></button>
                                    <button class='btn btn-outline-success col-sm-12 col-md-2 col-lg-1 mt-2 mr-2 ml-1'
                                            onclick="javascript:window.location='mensajes.php?leido=<?php echo $meR->getCodMensaje() ?>';">
                                        <i class="fa-solid fa-envelope-open" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="card m-2" style="width: 90%;">
                                <div class="card-body row">
                                    <p class="card-title col-sm-12 col-md-2 col-lg-2 mt-3">Enviado
                                        por: <?php echo $usuarioEmisor->getNombreUsuario() ?></p>
                                    <p class="card-text col-sm-12 col-md-2 col-lg-2 mt-3">
                                        Asunto: <?php echo $meR->getAsunto() ?></p>
                                    <p class="card-text col-sm-12 col-md-2 col-lg-2 mt-3">
                                        Enviado: <?php echo $meR->getFecha() ?></p>
                                    <p class="card-text col-sm-12 col-md-2 col-lg-3 mt-3">
                                        Mensaje: <?php echo $meR->getMensaje() ?></p>
                                    <button class='btn btn-outline-danger col-sm-12 col-md-2 col-lg-1 mt-2 ml-auto mr-1'
                                            onclick="javascript:window.location='mensajes.php?borrar=<?php echo $meR->getCodMensaje() ?>';">
                                        <i class="fa fa-trash" aria-hidden="true"></i></button>
                                    <button class='btn btn-outline-success col-sm-12 col-md-2 col-lg-1 mt-2 mr-2 ml-1'
                                            onclick="javascript:window.location='mensajes.php?leido=<?php echo $meR->getCodMensaje() ?>';">
                                        <i class="fa-solid fa-envelope" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
                break;
            //mensajes enviados
            case "2":
                $mensajesEnviados = DbManager::getMsgByEmisor($codigoUsuario);
                if (empty($mensajesEnviados)) {
                    ?>
                    <div class="col-md-4 col-lg-4 col-sm-1 text-center">
                        <h4>No hay mensajes enviados</h4>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="col-md-4 col-lg-4 col-sm-1 text-center">
                        <h4>Mensajes enviados</h4>
                    </div>
                    <?php
                    foreach ($mensajesEnviados as $me) {
                        //recuperamos el nombre del usuario
                        $usuarioReceptor = DbManager::getUser($me->getCodReceptor());
                        ?>
                        <div class="card m-2" style="width: 90%;">
                            <div class="card-body row ">
                                <p class="card-title col-sm-12 col-md-2 col-lg-2 mt-3">Mensaje enviado
                                    a <?php echo $usuarioReceptor->getNombreUsuario() ?></p>
                                <p class="card-text col-sm-12 col-md-2 col-lg-2 mt-3">
                                    Asunto: <?php echo $me->getAsunto() ?></p>
                                <p class="card-text col-sm-12 col-md-2 col-lg-2 mt-3">
                                    Enviado: <?php echo $me->getFecha() ?></p>
                                <p class="card-text col-sm-12 col-md-2 col-lg-3 mt-3">
                                    Mensaje: <?php echo $me->getMensaje() ?></p>
                                <button class='btn btn-outline-danger col-sm-12 col-md-1 col-lg-1 mt-2 ml-auto mr-2'
                                        onclick="javascript:window.location='mensajes.php?borrarE=<?php echo $me->getCodMensaje() ?>';">
                                    <i class="fa fa-trash" aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <?php
                    }
                }
                break;
            //enviar mensaje
            case "3":
                ?>
                <div class="container mb-5">
                    <form id="formMsg" action="mensajes.php" method="post">
                        <div class="form-group">
                            <label for="destinatario">Para usuario: </label>
                            <input type="text" class="form-control" id="destinatario" name="destinatario"
                                   autocomplete="off" required/>
                        </div>
                        <div id="suggestions"></div>
                        <div class="form-group">
                            <label for="asunto">Asunto: </label>
                            <input type="text" class="form-control" id="asunto" name="asunto" autocomplete="off"
                                   required/>
                        </div>
                        <div class="form-group">
                            <label for="mensaje">Mensaje: </label>
                            <textarea class="form-control" id="mensaje" rows="3" name="mensaje" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-outline-primary" id="newMsg">Enviar</button>
                    </form>
                </div>
                <?php
                break;
            default:
                var_dump("error al pulsar un boton");
                break;
        }
    }
    ?>
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
<?php
