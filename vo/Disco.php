<?php

class Disco {
    private $id;
    private $titulo;
    private $faixaEtaria;
    private $preco;
    private $artista;
    private $anoLancamento;

    function getId() {
        return $this->id;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getFaixaEtaria() {
        return $this->faixaEtaria;
    }

    function getPreco() {
        return $this->preco;
    }

    function getArtista() {
        return $this->artista;
    }

    function getAnoLancamento() {
        return $this->anoLancamento;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setFaixaEtaria($faixaEtaria) {
        $this->faixaEtaria = $faixaEtaria;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }

    function setArtista($artista) {
        $this->artista = $artista;
    }

    function setAnoLancamento($anoLancamento) {
        $this->anoLancamento = $anoLancamento;
    }

    function toString (){
        return $this->id." - ".$this->titulo;
    }
}
