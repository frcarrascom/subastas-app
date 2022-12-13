<?php
session_start();
if (isset($_SESSION['usr'])) {
    header("Location: ../index.php");
}
$msg = null;
if (isset($_GET['e'])) {
    switch ($_GET['e']) {
        case "1":
            $msg = "<p class='alert alert-danger mb-0'>" . "Error, datos introducidos incorrectos." . "</p>";
            break;
        case "2":
            $msg = "<p class='alert alert-danger mb-0'>" . "Error, faltan datos" . "</p>";
            break;
        default:
            $msg = "<p class='alert alert-danger mb-0'>" . "Error desconocido." . "</p>";
            break;
    }
}
if (isset($_GET['eliminado'])) {
    $msg = "<p class='alert alert-success mb-0'>" . "Cuenta eliminada correctamente" . "</p>";
}
if (isset($_GET['ne'])) {
    $msg = "<p class='alert alert-danger mb-0'>" . "No se ha podido eliminar la cuenta" . "</p>";
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
<div class="container col-xs-12 col-sm-8 col-md-6 col-lg-4 mt-5 mb-5">
    <img id="imagenODS" src="../logo/logoSubastas.png" class="img-fluid rounded mx-auto d-block img-thumbnail mb-4"
             alt="imagen de logo" style="height: 200px">
    <div class="card">
        <div class="card-header">Inicia sesión
        </div>
        <form action="comprobarLogin.php" id="form" method="post" class="card-body">
            <div class="form-group">
                <label for="usr">Nombre de Usuario</label>
                <input type="text" class="form-control form-control-lg check" name="usr" id="usr" placeholder="Usuario">
            </div>
            <div class="form-group">
                <label for="pass">Contraseña</label>
                <input type="password" class="form-control form-control-lg check" name="pass" id="pass"
                       placeholder="Contraseña...">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-outline-primary btn-lg">Acceder</button>
            </div>
        </form>
        <a href="../index.php" class="btn btn-outline-warning">Acceder sin usuario</a>
        <br/>
        <h6 class="text-center">¿Aún no estás registrado? <a href="paginaRegistro.php">Regístrate</a></h6>
    </div>
    <div class="card mt-3">
        <?php
        if ($msg != null) {
            ?>
            <?php echo $msg; ?>
            <?php
        }
        ?>
    </div>
</div>
<footer class="container-fluid p-0 pt-5">
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
