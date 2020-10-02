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
        <script type="text/javascript">
            function redirecionar(){
                alert('vou redirecionar');
                //window.location='http://qacademico.ifpe.edu.br';
                
                document.getElementById("exemplo").value="Mudei";
                var valor = document.getElementById("exemplo").value;
            }
        </script>
    </head>
    <body>
        <input type="text" id="exemplo" value=""/>
        <button  onclick="redirecionar()">Clique aqui</button> 
    </body>
</html>
