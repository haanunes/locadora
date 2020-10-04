<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/locadora/protecao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/locadora/dao/DiscoDAO.php';

DiscoDAO::remover($_GET['id']);

header("location:http://" . $_SERVER["HTTP_HOST"] . "/locadora/list-disco.php");
