<?php

class FluxoCaixa {
    private $id;
    private $dataPagamento;
    private $dataPrevistaPagamento;
    private $descricao;
    private $idAluguel;
    private $valor;
    private $tipo;
    private $situacao;
    
    function getId() {
        return $this->id;
    }

    function getDataPagamento() {
        return $this->dataPagamento;
    }

    function getDataPrevistaPagamento() {
        return $this->dataPrevistaPagamento;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getIdAluguel() {
        return $this->idAluguel;
    }

    function getValor() {
        return $this->valor;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getSituacao() {
        return $this->situacao;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDataPagamento($dataPagamento) {
        $this->dataPagamento = $dataPagamento;
    }

    function setDataPrevistaPagamento($dataPrevistaPagamento) {
        $this->dataPrevistaPagamento = $dataPrevistaPagamento;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setIdAluguel($idAluguel) {
        $this->idAluguel = $idAluguel;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    function toString(){
        $this->descricao;
    }
}
