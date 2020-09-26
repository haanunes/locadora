<?php
session_start();
if(isset($_SESSION['idUsuario'])){
    header("location:http://".$_SERVER['HTTP_HOST']."/locadora/index.php?session=1");
}
if (isset($_COOKIE['idUsuario'])){
    header("location:http://".$_SERVER['HTTP_HOST']."/locadora/index.php?coockie=1");
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sistema de Locadora</title>
      <?php require_once 'includeHead.php'; ?>
        <style type="text/css">
            .negrito {
                font-weight: bold;
            }
            .div-form{
                margin: 50px auto;
                width: 400px;
            }
            .div-form form{
                box-shadow: 0px 2px 2px #000000;
                background-color: white;
                padding: 30px;
            }
            body {
                background-color: #ededed   ;
            }
            h2{
                text-align: center;
                margin-bottom: 50px;
            }
            .campo{
                margin-bottom: 20px;
            }
        </style>
            
    </head>
    <body>
        <div class="div-form">
            <form action="controle/controleLogin.php" method="post">
                <h2>Login</h2>
                <?php if (isset($_GET['erro']))
                    echo "<p style='color:red'>Login ou senha incorretos.</p>"; ?>
                <div class="campo">
                    <input type="text" class="form-control" placeholder="Login" name="login"/>
                </div>
                
                <div class="campo">
                    <input type="password" class="form-control " placeholder="Senha" name="senha"/>
                </div>
                <div class="campo text-center">
                 <input type="submit" value="Entrar" class="btn btn-primary negrito"/>
                <div>
                <div class="text-right" style="margin-top:20px">
                    <input type="checkbox" value="sim" name="lembrar"/> Lembrar de mim
                </div>
            </form>
        </div>
    </body>
</html>
