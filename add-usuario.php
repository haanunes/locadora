<?php
require_once 'protecao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/locadora/vo/Usuario.php";
$obj = new Usuario();
if (isset($_GET['id'])) {
    require_once $_SERVER['DOCUMENT_ROOT'] . "/locadora/dao/UsuarioDAO.php";
    $obj = UsuarioDAO::getById($_GET['id']);
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
        <script>
            function verificarSenha() {
                if (document.getElementById("senha").value == document.getElementById("senha2").value) {
                    document.getElementById("salvar").removeAttribute("disabled");
                    document.getElementById("senhasDiferentes").style = "display:none";
                } else {
                    document.getElementById("salvar").setAttribute("disabled", "disabled");
                    document.getElementById("senhasDiferentes").style = "display:block;color:red";
                }
            }
            
            function adicionarPermissao(){
                var permissaoSelect = document.getElementById("selectPermissao");
                var idOpcao = permissaoSelect.options[permissaoSelect.selectedIndex].value;
                
                /*var inputHidden = document.createElement("input");
                inputHidden.setAttribute("type","hidden");
                inputHidden.setAttribute("name","permissao[]");
                inputHidden.setAttribute("value",idOpcao);
                document.getElementById("permissao-div").appendChild(inputHidden);*/
                
                var tabela = document.getElementById("corpoTabela");
                tabela.innerHTML=tabela.innerHTML+"<tr><td><input type='hidden' name='permissao[]' value='"+idOpcao+"'/> "
                        +permissaoSelect.options[permissaoSelect.selectedIndex].innerHTML+
                        "</td><td><input type=button value='Remover' class='btn btn-danger' onclick='remover(this)'/></td></tr>";
            }
            
            function remover (botao){
                var trParaRemover = botao.parentNode.parentNode;
                var tabela=trParaRemover.parentNode;
                var indiceParaRemover = trParaRemover.rowIndex;
                //alert(indiceParaRemover);
                tabela.deleteRow(indiceParaRemover - 1);
            }
        </script>
    </head>
    <body>
        <?php require 'menu.php'; ?>
        <div class="container">
            <h2 class="titulo"><?php echo (isset($_GET['id']) ? "Atualizar" : "Cadastrar"); ?> Usuário</h2>
            <div class="row justify-content-center">
                <div class="col-8">
                    <form action = "controle/controleUsuario.php" method="post">
                        <input type="hidden" name="id" value="<?php echo (isset($_GET['id']) ? $_GET['id'] : "0"); ?>"/>
                        <div class="form-group ">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome"  name="nome" required="true" value="<?php echo $obj->getNome(); ?>">

                        </div>
                        <div class="form-group">
                            <label for="login">Login:</label>
                            <input type="text" class="form-control" id="login" name="login" value="<?php echo $obj->getLogin(); ?>" required="true">
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha:</label>
                            <input type="password" class="form-control" id="senha" name="senha" onblur="verificarSenha()" required="true">
                        </div>
                        <div class="form-group">
                            <label for="senha2">Repetir Senha:</label>
                            <input type="password" class="form-control" id="senha2" onblur="verificarSenha()" name="senha2" required="true">
                        </div>
                        <div style="color:red;display:none" id="senhasDiferentes">As senhas não são iguais</div>
                        <div class="form-group">
                            <label for="artista">E-mail:</label>
                            <input type="email" class="form-control" id="email" value="<?php echo $obj->getEmail(); ?>" name="email">
                        </div>

                        <hr/>
                        <h4 class="titulo">Permissões</h4>
                        <?php
                        require_once $_SERVER['DOCUMENT_ROOT'] . "/locadora/dao/PermissaoDAO.php";
                        $lista = PermissaoDAO::getList("Order by nome asc", array());
                        ?>
                        <div class="form-group">
                            <label for="permissao">Permissão:</label>
                            <select class="custom-select" id="selectPermissao">
                                <?php
                                foreach ($lista as $permissao) {
                                    echo "<option value='" . $permissao->getId() . "'> " . $permissao->getNome() . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <button type="button" class="btn btn-success" id="add" onclick="adicionarPermissao()"  >Adicionar</button>
                        <div id="permissao-div" >
                           
                        </div>
                        
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody id="corpoTabela">
                            </tbody>
                        </table>

                        <button type="submit" class="btn btn-primary" id="salvar" disabled="disabled"><?php echo (isset($_GET['id']) ? "Atualizar" : "Salvar"); ?></button>
                        <button type="reset" class="btn btn-warning">Limpar</button>
                    </form>
                </div>
            </div>

        </div>
    </body>
</html>
