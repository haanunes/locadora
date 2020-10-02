<?php 
require_once 'protecao.php';
require_once $_SERVER['DOCUMENT_ROOT']."/locadora/vo/Disco.php";
$obj = new Disco();
if (isset($_GET['id'])){
    require_once $_SERVER['DOCUMENT_ROOT']."/locadora/dao/DiscoDAO.php";
    $obj= DiscoDAO::getById($_GET['id']);
}
    
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php require 'includeHead.php'; ?>
    </head>
    <body>
        <?php require 'menu.php'; ?>
        <div class="container">
             <h2 class="titulo"><?php echo (isset($_GET['id'])?"Atualizar":"Cadastrar");?> Disco</h2>
            <div class="row justify-content-center">
                 <div class="col-8">
            <form action = "controle/controleDisco.php" method="post">
                <input type="hidden" name="id" value="<?php echo (isset($_GET['id'])?$_GET['id']:"0");   ?>"/>
                <div class="form-group">
                    <label for="titulo">Título:</label>
                    <input type="text" class="form-control" id="titulo"  name="titulo" required="true" value="<?php echo $obj->getTitulo();?>">

                </div>
                <div class="form-group">
                    <label for="faixaEtaria">Faixa Etária:</label>
                    <input type="text" class="form-control" id="faixaEtaria" name="faixaEtaria" value="<?php echo $obj->getFaixaEtaria();?>" required="true">
                </div>
                <div class="form-group">
                    <label for="preco">Preço:</label>
                    <input type="text" class="form-control" id="preco" name="preco" value="<?php echo $obj->getPreco();?>" required="true">
                </div>
                <div class="form-group">
                    <label for="anoLancamento">Ano de Lançamento:</label>
                    <input type="text" class="form-control" id="anoLancamento" value="<?php echo $obj->getAnoLancamento();?>" name="anoLancamento" required="true">
                </div>
                <div class="form-group">
                    <label for="artista">Artista:</label>
                    <input type="text" class="form-control" id="artista" value="<?php echo $obj->getArtista();?>" name="artista">
                </div>
                <button type="submit" class="btn btn-primary"><?php echo (isset($_GET['id'])?"Atualizar":"Salvar");?></button>
                <button type="reset" class="btn btn-warning">Limpar</button>
            </form>
        </div>
            </div>
            
            </div>
    </body>
</html>
