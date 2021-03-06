<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/locadora/protecao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/locadora/vo/Disco.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/locadora/dao/DiscoDAO.php';
// faixaetaria anolancamento e preco
if (isset($_POST['titulo']) && isset($_POST['faixaEtaria']) && isset($_POST['anoLancamento']) && isset($_POST['preco'])) {
    $obj = new Disco();
    $obj->setTitulo($_POST['titulo']);
    $obj->setAnoLancamento($_POST['anoLancamento']);
    $obj->setArtista(isset($_POST['artista']) ? $_POST['artista'] : "");
    $obj->setFaixaEtaria($_POST['faixaEtaria']);
    $obj->setPreco($_POST['preco']);
    if ($_POST['id'] == 0) {
        DiscoDAO::inserir($obj);
    }
    else{
         $obj->setId($_POST['id']);
        DiscoDAO::atualizar($obj);
    }
    header("location:http://" . $_SERVER["HTTP_HOST"] . "/locadora/list-disco.php");
} else {
    header("location:http://" . $_SERVER["HTTP_HOST"] . "/locadora/index.php");
}        