<?php
session_start();
session_destroy();
setcookie("idUsuario","",time()-10000,"/");
header("location:http://".$_SERVER['HTTP_HOST']."/locadora/login.php");
?>