<?php
//establecemos el mensaje en nulo
$msg = null;
if(isset($_GET['e'])){
	switch($_GET['e']){
        case "1":
            $msg = "<p class='alert alert-danger mb-0'>" . "Error, No se pudo crear el usuario" . "</p>";
            break;
        case "2":
            $msg = "<p class='alert alert-danger mb-0'>" . "Error, Algún campo no es válido" . "</p>";
            break;
        case "3":
            $msg = "<p class='alert alert-danger mb-0'>" . "Error, la contraseña no coincide" . "</p>";
            break;
        case "4":
            $msg = "<p class='alert alert-danger mb-0'>" . "Error, el usuario ya existe" . "</p>";
            break;
        default:
            $msg = "<p class='alert alert-danger mb-0'>" . "Error desconocido" . "</p>";
            break;
	}
	$msg .= "</span>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
	<div class="container col-sm-12 col-md-6">
	    <img id="imagenLogo" src="../logo/logoSubastas.png" class="img-fluid rounded mx-auto d-block img-thumbnail mb-3 mt-4"
             alt="imagen de logo" style="height: 200px">
		<div class="card">
			<div class="card-header">Registro</div>
			<form action="llamadaFuncionRegistro.php" method="post" id="form" class="card-body">
				<div class="form-row">
					<div class="form-group col-lg-6 col-sm-12 col-xs-12">
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control form-control-lg" name="nombre" id="nombre" placeholder="Nombre" required>
					</div>
					<div class="form-group col-lg-6  col-xs-12">
						<label for="apll">Apellidos</label>
						<input type="text" class="form-control form-control-lg" name="apell" id="apll" placeholder="Apellidos" required>
					</div>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">@</div>
						</div>
						<input type="email" class="form-control form-control-lg" name="mail" id="email" placeholder="algo@ejemplo.com" required>

					</div>
				</div>
				<div class="form-group">
					<label for="usr">Nombre de Usuario</label>
					<input type="text" class="form-control form-control-lg" name="usr" id="usr" placeholder="Usuario" required>
				</div>
				<div class="form-group">
					<label for="pass">Contraseña</label>
					<input type="password" class="form-control form-control-lg" name="pass" id="pass" placeholder="Contraseña..." required>
				</div>
				<div class="form-group">
					<label for="pass2">Repite la contraseña</label>
					<input type="password" class="form-control form-control-lg" name="pass2" id="pass2" placeholder="Contraseña..." required>
				</div>
				<div class="form-group">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" id="gridCheck" required>
						<label class="form-check-label" for="gridCheck">
							Soy mayor de 18 años.
						</label>
					</div>
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-primary btn-lg">Registrarme!</button>
				</div>
			</form>
			<h6 class="text-center	">¿Ya estás registrado? <a href="./login.php">Inicia sesión</a></h6>
		</div>
        <div class="card">
            <?php
            if ($msg != null) {
                ?>
                    <?php echo $msg; ?>
                <?php
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
</html>