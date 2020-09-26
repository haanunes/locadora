<?php
session_start();
if (!isset($_SESSION['idUsuario']) && !isset($_COOKIE['idUsuario'])) {
    header("location:http://" . $_SERVER['HTTP_HOST'] . "/locadora/login.php");
}
?>