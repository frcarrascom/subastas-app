<?php
if (isset($_GET['e'])) {
    session_start();
    session_destroy();
    header("Location: ./login.php?eliminado");
}elseif(isset($_GET['error'])){
    session_start();
    session_destroy();
    header("Location: ./login.php?ne");
}else{
    session_start();
    session_destroy();
    header("Location: ./login.php");
}
?>