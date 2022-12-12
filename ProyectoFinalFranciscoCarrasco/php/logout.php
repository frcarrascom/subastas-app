<?php
if (isset($_GET['e'])) {
    session_start();
    session_destroy();
    header("Location: ./login.php?eliminado");
}else{
    session_start();
    session_destroy();
    header("Location: ./login.php");
}
?>