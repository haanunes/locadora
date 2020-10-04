<?php
require_once 'protecao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/locadora/vo/FluxoCaixa.php";
$obj = new FluxoCaixa();
if (isset($_GET['id'])) {
    require_once $_SERVER['DOCUMENT_ROOT'] . "/locadora/dao/FluxoCaixaDAO.php";
    $obj = FluxoCaixaDAO::getById($_GET['id']);
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
            <h2 class="nome"><?php echo (isset($_GET['id']) ? "Atualizar" : "Cadastrar"); ?> Fluxo de Caixa</h2>
            <div class="row justify-content-center">
                <div class="col-8">
                    <form action = "controle/controleFluxoCaixa.php" method="post">
                        <input type="hidden" name="id" value="<?php echo (isset($_GET['id']) ? $_GET['id'] : "0"); ?>"/>
                        <div class="form-group">
                            <label for="nome">Descrição:</label>
                            <input type="text" class="form-control" id="descricao"  name="descricao" required="true" value="<?php echo $obj->getDescricao(); ?>">

                        </div>
                        <div class="form-group">
                            <label for="faixaEtaria">Valor:</label>
                            <input type="text" class="form-control" id="numero" name="valor" value="<?php echo $obj->getValor(); ?>" required="true">
                        </div>
                        <div class="form-group">
                            <div>
                                <label>Tipo:</label>
                            </div>
                            <div class="form-check form-check-inline">
                            
                            <input class="form-check-input" type="radio" name="tipo" id="entrada" value="Entrada" <?php echo ($obj->getTipo() == "Entrada" ? "checked" : ""); ?> />
                            <label class="form-check-label" for="entrada" >
                                Entrada
                            </label>
                            </div>
                            <div class="form-check form-check-inline">
                            
                            <input class="form-check-input" type="radio" name="tipo" id="saida" value="Saída"  <?php echo ($obj->getTipo() == "Saída" ? "checked" : ""); ?>>
                            <label class="form-check-label" for="saida">
                                Saída
                            </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <label >Situação:</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="situacao" id="pago"  value="Pago" <?php echo ($obj->getSituacao() == "Pago" ? "checked" : ""); ?> />
                                <label class="form-check-label" for="pago" >
                                    Pago
                                </label>
                            </div>
                            <div class="form-check form-check-inline">

                                <input class="form-check-input" type="radio" name="situacao" id="emAberto" value="Em aberto"  <?php echo ($obj->getSituacao() == "Em aberto" ? "checked" : ""); ?>>

                                <label class="form-check-label" for="emAberto">
                                    Em aberto
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="artista">Data de Vencimento:</label>
                            <input type="date" class="form-control" id="dataPrevistaPagamento" value="<?php echo $obj->getDataPrevistaPagamento(); ?>" name="dataPrevistaPagamento">
                        </div>
                        <div class="form-group">
                            <label for="artista">Data de Pagamento:</label>
                            <input type="date" class="form-control" id="dataPagamento" value="<?php echo $obj->getDataPagamento(); ?>" name="dataPagamento">
                        </div>
                        <button type="submit" class="btn btn-primary"><?php echo (isset($_GET['id']) ? "Atualizar" : "Salvar"); ?></button>
                        <button type="reset" class="btn btn-warning">Limpar</button>
                    </form>
                </div>
            </div>

        </div>
    </body>
</html>
