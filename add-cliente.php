<?php
require_once 'protecao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/locadora/vo/Cliente.php";
$obj = new Cliente();
if (isset($_GET['id'])) {
    require_once $_SERVER['DOCUMENT_ROOT'] . "/locadora/dao/ClienteDAO.php";
    $obj = ClienteDAO::getById($_GET['id']);
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
            <h2 class="nome"><?php echo (isset($_GET['id']) ? "Atualizar" : "Cadastrar"); ?> Cliente</h2>
            <div class="row justify-content-center">
                <div class="col-8">
                    <form action = "controle/controleCliente.php" method="post">
                        <input type="hidden" name="id" value="<?php echo (isset($_GET['id']) ? $_GET['id'] : "0"); ?>"/>
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome"  name="nome" required="true" value="<?php echo $obj->getNome(); ?>">

                        </div>
                        <div class="form-group">
                            <label for="faixaEtaria">Rua:</label>
                            <input type="text" class="form-control" id="numero" name="rua" value="<?php echo $obj->getRua(); ?>" required="true">
                        </div>
                        <div class="form-group">
                            <label for="preco">Número:</label>
                            <input type="text" class="form-control" id="numero" name="numero" value="<?php echo $obj->getNumero(); ?>" required="true">
                        </div>
                        <div class="form-group">
                            <label for="anoLancamento">Complemento:</label>
                            <input type="text" class="form-control" id="complemento" value="<?php echo $obj->getComplemento(); ?>" name="complemento" required="true">
                        </div>
                        <div class="form-group">
                            <label for="artista">Bairro:</label>
                            <input type="text" class="form-control" id="bairro" value="<?php echo $obj->getBairro(); ?>" name="bairro">
                        </div>
                        <div class="form-group">
                            <label for="artista">Cidade:</label>
                            <input type="text" class="form-control" id="cidade" value="<?php echo $obj->getCidade(); ?>" name="cidade">
                        </div>
                        <div class="form-group">
                            <label for="artista">UF:</label>
                            <select name="uf" class="custom-select">
                                <option value="AC">AC</option>
                                <option value="AL">AL</option>
                                <option value="AM">AM</option>
                                <option value="AP">AP</option>
                                <option value="BA">BA</option>
                                <option value="AP">AP</option>
                                <option value="CE">CE</option>
                                <option value="DF">DF</option>
                                <option value="ES">ES</option>
                                <option value="GO">GO</option>
                                <option value="MA">MA</option>
                                <option value="MG">MG</option>
                                <option value="MS">MS</option>
                                <option value="MT">MT</option>
                                <option value="PA">PA</option>
                                <option value="PB">PB</option>
                                <option value="PE" selected>PE</option>
                                <option value="PI">PI</option>
                                <option value="RJ">RJ</option>
                                <option value="RN">RN</option>
                                <option value="RO">RO</option>
                                <option value="RR">RR</option>
                                <option value="RS">RS</option>
                                <option value="SC">SC</option>
                                <option value="SE">SE</option>
                                <option value="SP">SP</option>
                                <option value="TO">TO</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="artista">Cep:</label>
                            <input type="text" class="form-control" id="cep" value="<?php echo $obj->getCep(); ?>" name="cep">
                        </div>
                        <div class="form-group">
                            <label for="artista">Data de Nascimento:</label>
                            <input type="date" class="form-control" id="dataNascimento" value="<?php echo $obj->getDataNascimento(); ?>" name="dataNascimento">
                        </div>
                        <div class="form-group">
                            <label for="artista">CPF:</label>
                            <input type="text" class="form-control" id="cpf" value="<?php echo $obj->getCpf(); ?>" name="cpf">
                        </div>
                        <button type="submit" class="btn btn-primary"><?php echo (isset($_GET['id']) ? "Atualizar" : "Salvar"); ?></button>
                        <button type="reset" class="btn btn-warning">Limpar</button>
                    </form>
                </div>
            </div>

        </div>
    </body>
</html>
