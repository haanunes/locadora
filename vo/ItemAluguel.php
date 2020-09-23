<?php

class ItemAluguel {
    private $id;
    private $idDisco;
    private $idAluguel;
    
    function getId() {
        return $this->id;
    }

    function getIdDisco() {
        return $this->idDisco;
    }

    function getIdAluguel() {
        return $this->idAluguel;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdDisco($idDisco) {
        $this->idDisco = $idDisco;
    }

    function setIdAluguel($idAluguel) {
        $this->idAluguel = $idAluguel;
    }

    function toString (){
        return $this->idAluguel." - ".$this->idDisco;
    }
}
