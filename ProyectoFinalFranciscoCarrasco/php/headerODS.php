<?php
require_once("../clases/dbmanager.php");
//comprobamos si hay correo
if (isset($_SESSION['sesion']['codUsuario'])) {
    $mensajesNoLeidos = DbManager::getMsgSinLeer($_SESSION['sesion']['codUsuario']);

    $numeroMensajes = count($mensajesNoLeidos);
}
?>

<nav class="navbar navbar-dark bg-dark">

    <div class="menu-icon"><span class="fas fa-bars"></span></div>

    <a href="../index.php" class="navbar-brand logo"><img src="../logo/logoSubastas.png" width="30px"/> Subastas
        Sostenibles</a>

    <div class="search-icon"><span class="fas fa-search"></span></div>

    <div class="cancel-icon"><span class="fas fa-times"></span></div>

    <form action="buscar.php" class="form-inline col-md-6 col-lg-4 m-1" method="post">
        <div class="input-group col-12">
            <input class="form-control" type="search" placeholder="Buscar por Producto, Categoría..."
                   id="busqueda" aria-label="Search" name="busqueda" required/>
            <button type="submit" class="fas fa-search"></button>
        </div>

    </form>
    <div class="nav-items">
        <a href="ods.php" title="ODS" id="ods" class="btn btn-outline-primary m-1"
           class="far fa-user active">ODS</a>
        <?php
        /*Si la sesion esta abierta mostramos los botones de usuario*/
        if ($sesion_abierta) {
            ?>
            <a href="crearSubasta.php" title="crear subasta" id="upload"
               class="btn btn-outline-light m-1"><i
                        class="fa fa-upload"></i></a>

            <a href="mostrarSubastasUsuario.php" title="mostrar subasta" id="upload"
               class="btn btn-outline-warning m-1"><i
                        class="fas fa-gavel"></i></a>

            <a href="perfil.php" title="Mi Perfil" id="profile" class="btn btn-outline-success m-1"><span
                        id="profNick"><?= $_SESSION['sesion']['nombreUsuario'] ?></span> <i class="far fa-user"></i></a>

            <a title="Mi Correo" id="mail" href="mensajes.php?m=1"
               class="btn btn-outline-info check_mail m-1">
                <span id="numMsg">15    </span><i class="far fa-envelope"></i></a>


            <a href="logout.php" title="Desconéctate" class="btn btn-outline-danger m-1"><i
                        class="fas fa-sign-out-alt"></i></a><?php
        } else {
            ?>
            <a href="login.php" title="Inicia Sesión" id="profile" class="btn btn-outline-success m-1">Iniciar
                Sesión
                <i class="far fa-user"></i></a>
            <?php
        }
        ?>
    </div>
</nav>
<script>
    const menuBtn = document.querySelector(".menu-icon span");
    const searchBtn = document.querySelector(".search-icon");
    const cancelBtn = document.querySelector(".cancel-icon");
    const items = document.querySelector(".nav-items");
    const form = document.querySelector("form");
    menuBtn.onclick = () => {
        items.classList.add("active");
        menuBtn.classList.add("hide");
        searchBtn.classList.add("hide");
        cancelBtn.classList.add("show");
    }
    cancelBtn.onclick = () => {
        items.classList.remove("active");
        menuBtn.classList.remove("hide");
        searchBtn.classList.remove("hide");
        cancelBtn.classList.remove("show");
        form.classList.remove("active");
        cancelBtn.style.color = "#ff3d00";
    }
    searchBtn.onclick = () => {
        form.classList.add("active");
        searchBtn.classList.add("hide");
        cancelBtn.classList.add("show");
    }

    //ponemos el numero de mensajes
    var mensaje = "<?php echo $numeroMensajes?> ";
    document.getElementById("numMsg").innerHTML = mensaje;
</script>
