<?php


class Aluguel {
  private $id;
  private $dataAluguel;
  private  $horaAluguel;
  private  $dataPrevistaDevolucao;
  private  $dataOcorreuDevolucao;
  private  $pago;
  private  $valor;
  private  $idUsuario;
  private  $idCliente;
  private  $multa;
  private  $desconto;
  
  function getId() {
      return $this->id;
  }

  function getDataAluguel() {
      return $this->dataAluguel;
  }

  function getHoraAluguel() {
      return $this->horaAluguel;
  }

  function getDataPrevistaDevolucao() {
      return $this->dataPrevistaDevolucao;
  }

  function getDataOcorreuDevolucao() {
      return $this->dataOcorreuDevolucao;
  }

  function getPago() {
      return $this->pago;
  }

  function getValor() {
      return $this->valor;
  }

  function getIdUsuario() {
      return $this->idUsuario;
  }

  function getIdCliente() {
      return $this->idCliente;
  }

  function getMulta() {
      return $this->multa;
  }

  function getDesconto() {
      return $this->desconto;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setDataAluguel($dataAluguel) {
      $this->dataAluguel = $dataAluguel;
  }

  function setHoraAluguel($horaAluguel) {
      $this->horaAluguel = $horaAluguel;
  }

  function setDataPrevistaDevolucao($dataPrevistaDevolucao) {
      $this->dataPrevistaDevolucao = $dataPrevistaDevolucao;
  }

  function setDataOcorreuDevolucao($dataOcorreuDevolucao) {
      $this->dataOcorreuDevolucao = $dataOcorreuDevolucao;
  }

  function setPago($pago) {
      $this->pago = $pago;
  }

  function setValor($valor) {
      $this->valor = $valor;
  }

  function setIdUsuario($idUsuario) {
      $this->idUsuario = $idUsuario;
  }

  function setIdCliente($idCliente) {
      $this->idCliente = $idCliente;
  }

  function setMulta($multa) {
      $this->multa = $multa;
  }

  function setDesconto($desconto) {
      $this->desconto = $desconto;
  }

  function toString (){
      return $this->dataAluguel. " - ".$this->idCliente();
  }
}
