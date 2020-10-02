<?php 
require_once 'protecao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/locadora/dao/DiscoDAO.php';
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
            <h2 class="titulo">Listar Disco</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Títutlo</th>
                        <th scope="col">Faixa Etária</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Artista</th>
                        <th scope="col">Ano Lançamento</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $lista = DiscoDAO::getListAll();
                    foreach ($lista as $obj){
                        echo "<tr>
                        <td>".$obj->getId()."</td>
                        <td>".$obj->getTitulo()."</td>
                        <td>".$obj->getFaixaEtaria()."</td>
                        <td>".$obj->getPreco()."</td>
                        <td>".$obj->getArtista()."</td>
                        <td>".$obj->getAnoLancamento()."</td>
                        <td>
                            <button type='button' class='btn btn-outline-warning' onclick=\"window.location='http://".$_SERVER['HTTP_HOST']."/locadora/add-disco.php?id=".$obj->getId()."'\">Editar</button>
                            <button type='button' class='btn btn-outline-danger'>Remover</button>
                            
                        </td>
                    </tr>";
                    }
                    ?>
                   
                </tbody>
            </table>
        </div>
    </body>
</html>
