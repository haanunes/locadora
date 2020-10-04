<?php
require_once 'protecao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/locadora/dao/FluxoCaixaDAO.php';
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
        <script type="text/javascript">
        function prepararModal(titulo,id){
            document.getElementById("corpoModal").innerHTML="Realmente deseja remover o fluxoCaixa com a descrição <b>"+titulo+"</b>";
            document.getElementById("idParaDeletar").value=id;
        }
        function redirecionarParaRemocao(){
            window.location='http://<?php echo $_SERVER['HTTP_HOST'] ?>/locadora/controle/delFluxoCaixa.php?id='+document.getElementById("idParaDeletar").value;
        }
        </script>
    </head>
    <body>
        <?php require 'menu.php'; ?>
        <div class="container">
            <h2 class="titulo">Listar FluxoCaixa</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Data de Vencimento</th>
                        <th scope="col">Data de Pagamento</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Aluguel</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Situação</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $lista = FluxoCaixaDAO::getListAll();
                    foreach ($lista as $obj) {
                        echo "<tr>
                        <td>" . $obj->getDataPrevistaPagamento() . "</td>
                        <td>" . $obj->getDataPagamento() . "</td>
                        <td>" . $obj->getDescricao() . "</td>
                        <td>" . $obj->getIdAluguel() . "</td>
                        <td>" . $obj->getValor() . "</td>
                        <td>" . $obj->getTipo() . "</td>
                        <td>" . $obj->getSituacao() . "</td>
                        <td>
                            <button type='button' class='btn btn-outline-warning' onclick=\"window.location='http://" . $_SERVER['HTTP_HOST'] . "/locadora/add-fluxoCaixa.php?id=" . $obj->getId() . "'\">Editar</button>
                            <button type='button' class='btn btn-outline-danger' data-toggle='modal' data-target='#exampleModal' onclick=\"prepararModal('".$obj->getDescricao()."'," . $obj->getId() . ")\">Remover</button>
                            
                        </td>
                    </tr>";
                    }
                    ?>

                </tbody>
            </table>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirmação de Remoção</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <input type="hidden" value="0" id="idParaDeletar" />
                        <div class="modal-body" id="corpoModal">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-danger" onclick="redirecionarParaRemocao()">Remover</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
