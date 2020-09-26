<?php require_once 'protecao.php';
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
             <h2 class="titulo">Cadastrar Disco</h2>
            <div class="row justify-content-center">
                 <div class="col-8">
            <form action = "controle/controleDisco.php" method="post">
                <div class="form-group">
                    <label for="titulo">Título:</label>
                    <input type="text" class="form-control" id="titulo"  name="titulo" required="true">

                </div>
                <div class="form-group">
                    <label for="faixaEtaria">Faixa Etária:</label>
                    <input type="text" class="form-control" id="faixaEtaria" name="faixaEtaria" required="true">
                </div>
                <div class="form-group">
                    <label for="preco">Preço:</label>
                    <input type="text" class="form-control" id="preco" name="preco" required="true">
                </div>
                <div class="form-group">
                    <label for="anoLancamento">Ano de Lançamento:</label>
                    <input type="text" class="form-control" id="anoLancamento" name="anoLancamento" required="true">
                </div>
                <div class="form-group">
                    <label for="artista">Artista:</label>
                    <input type="text" class="form-control" id="artista" name="artista">
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
                <button type="reset" class="btn btn-warning">Limpar</button>
            </form>
        </div>
            </div>
            
            </div>
    </body>
</html>
