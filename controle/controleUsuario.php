<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/locadora/protecao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/locadora/vo/Usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/locadora/vo/UsuarioPermissao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/locadora/dao/UsuarioDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/locadora/dao/UsuarioPermissaoDAO.php';

print_r($_POST);

if (isset($_POST['nome']) && isset($_POST['login']) && isset($_POST['senha'])&& isset($_POST['email'])) {
    $obj = new Usuario();
    $obj->setNome($_POST['nome']);
    $obj->setLogin(isset($_POST['login']) ? $_POST['login'] : "");
    $obj->setSenha(isset($_POST['senha']) ? $_POST['senha'] : "");
    $obj->setEmail(isset($_POST['email']) ? $_POST['email'] : "");
    
    if ($_POST['id'] == 0) {
        $obj->setId(UsuarioDAO::inserir($obj));
    } else {
        $obj->setId($_POST['id']);
        UsuarioDAO::atualizar($obj);
        
        //apagando todas as permissoes antigas
        $lista = UsuarioPermissaoDAO::getList(" where idUsuario = ?", array($obj->getId()));
        foreach ($lista as $up){
            UsuarioPermissaoDAO::remover($up->getId());
        }
    }
    //adicionar todas as novas permissoes
    foreach ( $_POST['permissao'] as $p){
        $up = new UsuarioPermissao();
        $up->setIdPermissao($p);
        $up->setIdUsuario($obj->getId());
        
        UsuarioPermissaoDAO::inserir($up);
    }
   // header("location:http://" . $_SERVER["HTTP_HOST"] . "/locadora/list-cliente.php");
} else {
   // header("location:http://" . $_SERVER["HTTP_HOST"] . "/locadora/index.php");
}      