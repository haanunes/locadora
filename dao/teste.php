<?php
require_once "../vo/Permissao.php";
require_once "../dao/PermissaoDAO.php";
require_once "../vo/Aluguel.php";
require_once "../dao/AluguelDAO.php";

$a = new Aluguel();
$a->setDataAluguel(date("Y-m-d",time()));
$a->setDataOcorreuDevolucao(mktime (0, 0, 0, date("m")  , date("d")+2, date("Y")));
$a->setDataPrevistaDevolucao(mktime (0, 0, 0, date("m")  , date("d")+2, date("Y")));
$a->setDesconto(0);
$a->setHoraAluguel("18:30:30");
$a->setIdCliente(1);
$a->setIdUsuario(1);
$a->setMulta(0);
$a->setPago(True);
$a->setValor(6);

AluguelDAO::inserir($a);