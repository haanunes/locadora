<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/locadora/dao/UsuarioDAO.php';
if (isset($_POST['login']) && isset($_POST['senha'])){
    $sqlWhere=" where login = ? and senha = ? ";
    
    $lista = UsuarioDAO::getList($sqlWhere, array($_POST['login'],$_POST['senha']));
    if (sizeof($lista)>0){
        session_start();
        $_SESSION['idUsuario']=$lista[0]->getId();
        if(isset($_POST['lembrar'])){
            setcookie("idUsuario", $lista[0]->getId(), time()+(1000*60*60*24*5), "/");
        }
        
        header("location:http://".$_SERVER['HTTP_HOST']."/locadora/index.php");
    }
    else{
        header("location:http://".$_SERVER['HTTP_HOST']."/locadora/login.php?erro=1");
    }
}
