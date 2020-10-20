<!DOCTYPE html>
<?php session_start(); $_SESSION["frutas_existentes"]=array();?>

<html>
    
    <head>
        <meta charset="utf-8">
        <script src="jquery-3.5.1.min.js"></script>
        <script>
            $(document).ready(function(){
               $("#cadastra_fruta").click(function(){
                var fruta=$("input[name='nome_fruta']").val();
                $.get("recebeFrutas.php", {"fruta":fruta}, function(tem_fruta){
                    if(tem_fruta=="Nova Fruta Cadastrada."){
                        $("#frutas").html($("#frutas").html()+"<li>"+fruta+"</li>");
                        $("#ja_registrou").css("color", "green");
                    }else{
                        $("#ja_registrou").css("color", "red");
                    }
                    $("#ja_registrou").html(tem_fruta);
                });
               });
            });
        </script>
    </head>
    <body>
            <input type="text" name="nome_fruta" placeholder="Cadastre uma fruta...">
            <button id="cadastra_fruta">Cadastro Assincrono</button>
            <br><br>
            <span style="font-size: 20px" id="ja_registrou"></span>
            <br><br>
            <div style="font-size: 20px" id="frutas"></div>
    </body>
</html>