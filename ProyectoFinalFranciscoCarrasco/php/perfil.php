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
$usuario = DbManager::getUser($codigoUsuario);

//establecemos el mensaje en nulo
$msg = null;

//borramos cuenta
if (isset($_GET['borrar'])) {
    $eliminarUsuario = DbManager::deleteUser($usuario->getCodUsuario());

    var_dump($eliminarUsuario);
    header("Location: logout.php?e=1");
}

//hacemos cambio en el perfil
if (isset($_POST['nombreUsuario'])) {

    //guardamos todas las varaibles
    $nuevoNombre = $_POST['nombre'];
    $nuevaContra = $_POST['pass'];
    $nuevoNombreUsu = $_POST['nombreUsuario'];
    $nuevosApellidos = $_POST['ap'];
    $nuevoEmail = $_POST['correo'];

    //comprobamos que el email tenga forma correcta
    if (filter_var($nuevoEmail, FILTER_VALIDATE_EMAIL)) {
        //ejecutamos la actualizacion
        $actualizarDatos = DbManager::updateUsr($codigoUsuario, $nuevoNombre, $nuevosApellidos, $nuevoNombreUsu, $nuevoEmail, $nuevaContra);

        if ($actualizarDatos) {
            header("Location: perfil.php?actualizar=1");
        } else {
            header("Location: perfil.php?actualizar=2");
        }
    } else {
        header("Location: perfil.php?actualizar=2");
    }
}

//si se ha actualizado el perfil
if (isset($_GET['actualizar'])) {
    switch ($_GET['actualizar']) {
        case "1":
            $msg = "<p class='alert alert-success'>" . "Perfil actualizado correctamente" . "</p>";
            break;
        case "2":
            $msg = "<p class='alert alert-danger'>" . "Error al actualizar el perfil" . "</p>";
            break;
        default:
            $msg = "<p class='alert alert-danger'>" . "Error al actualizar el perfil" . "</p>";
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
    <div class="row ">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="row justify-content-center mt-3">
                <div class="card m-2" style="width: 50rem;">
                    <div class='card-header'><h3> Perfil de <span
                                    class='text-success'><?php echo $usuario->getNombreUsuario() ?></span></h3>
                    </div>
                    <div class='card-body'>
                        <form id="updateUsr" action="perfil.php" method="post">
                            <div class='form-group'><label for='nombreUsuario'>Nombre usuario</label>
                                <input type='text' class='form-control'
                                       value='<?php echo $usuario->getNombreUsuario() ?>'
                                       id='nombreUsuario' name='nombreUsuario'/>
                            </div>
                            <div class='form-group'>
                                <label for='#pass'>Password</label>
                                <div class='input-group'>

                                    <input type='password' class='form-control'
                                           value='<?php echo $usuario->getPassword() ?>'
                                           id='pass'
                                           name='pass'/>
                                    <i class="fa fa-eye" id="togglePassword" style="margin-left: 15px; cursor: pointer; margin-top: 10px"></i>

                                </div>
                            </div>
                            <div class='form-group'><label for='nombre'>Nombre</label>
                                <input type='text' class='form-control disabled'
                                       value='<?php echo $usuario->getNombre() ?>'
                                       id='nombre' name='nombre'/></div>
                            <div class='form-group'><label for='ap'>Apellidos</label>
                                <input type='text' class='form-control disabled'
                                       value='<?php echo $usuario->getApellidos() ?>'
                                       id='ap' name='ap'/></div>
                            <div class='form-group'><label for='correo'>e-mail</label>
                                <input type='email' class='form-control' value='<?php echo $usuario->getEmail() ?>'
                                       id='correo'
                                       name='correo'/>
                            </div>
                            <input type='hidden' value='<?php echo $usuario->getNombreUsuario() ?>' id='cod'
                                   name='cod'/>
                            <button type="button" id="delete" class='btn btn-outline-danger'>Borrar cuenta</button>
                            <input type='submit' value='Guardar Cambios' class='btn btn-outline-primary float-right'/>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <a href="../index.php" class="btn btn-primary pl-5 pr-5">Volver</a>
            </div>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="../js/sweetAlert.js"></script>
<script type="text/javascript">
    //mostrar contraseña
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#pass');

    togglePassword.addEventListener('click', function () {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        if (this.classList.contains('fa-eye')) {
            this.classList.remove('fa-eye');
            this.classList.add('fa-eye-slash');
        } else {
            this.classList.remove('fa-eye-slash');
            this.classList.add('fa-eye');
        }
    });
</script>
</body>
</html>