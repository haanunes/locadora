<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/locadora/protecao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/locadora/vo/Cliente.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/locadora/dao/ClienteDAO.php';
// faixaetaria anolancamento e preco
if (isset($_POST['nome']) && isset($_POST['cpf']) && isset($_POST['dataNascimento'])) {
    $obj = new Cliente();
    $obj->setNome($_POST['nome']);
    $obj->setRua(isset($_POST['rua']) ? $_POST['rua'] : "");
    $obj->setNumero(isset($_POST['numero']) ? $_POST['numero'] : "");
    $obj->setComplemento(isset($_POST['complemento']) ? $_POST['complemento'] : "");
    $obj->setBairro(isset($_POST['bairro']) ? $_POST['bairro'] : "");
    $obj->setCidade(isset($_POST['cidade']) ? $_POST['cidade'] : "");
    $obj->setUf(isset($_POST['uf']) ? $_POST['uf'] : "");
    $obj->setCep(isset($_POST['cep']) ? $_POST['cep'] : "");
    $obj->setCpf(isset($_POST['cpf']) ? $_POST['cpf'] : "");
    $obj->setDataNascimento(isset($_POST['dataNascimento']) ? $_POST['dataNascimento'] : "");
    if ($_POST['id'] == 0) {
        ClienteDAO::inserir($obj);
    } else {
        $obj->setId($_POST['id']);
        ClienteDAO::atualizar($obj);
    }
    header("location:http://" . $_SERVER["HTTP_HOST"] . "/locadora/list-cliente.php");
} else {
    header("location:http://" . $_SERVER["HTTP_HOST"] . "/locadora/index.php");
}        