<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/locadora/protecao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/locadora/vo/FluxoCaixa.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/locadora/dao/FluxoCaixaDAO.php';
// faixaetaria anolancamento e preco
if (isset($_POST['descricao']) && isset($_POST['dataPrevistaPagamento']) && isset($_POST['valor'])) {
    $obj = new FluxoCaixa();
    $obj->setDataPagamento(isset($_POST['dataPagamento']) ? $_POST['dataPagamento'] : "");
    $obj->setDataPrevistaPagamento(isset($_POST['dataPrevistaPagamento']) ? $_POST['dataPrevistaPagamento'] : "");
    $obj->setDescricao(isset($_POST['descricao']) ? $_POST['descricao'] : "");
    $obj->setValor(isset($_POST['valor']) ? $_POST['valor'] : "");
    $obj->setTipo(isset($_POST['tipo']) ? $_POST['tipo'] : "");
    $obj->setSituacao(isset($_POST['situacao']) ? $_POST['situacao'] : "");
    if ($_POST['id'] == 0) {
        echo FluxoCaixaDAO::inserir($obj);
    } else {
        $obj->setId($_POST['id']);
        FluxoCaixaDAO::atualizar($obj);
    }
    //header("location:http://" . $_SERVER["HTTP_HOST"] . "/locadora/list-fluxoCaixa.php");
} else {
    header("location:http://" . $_SERVER["HTTP_HOST"] . "/locadora/index.php");
}        