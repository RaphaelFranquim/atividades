<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="jquery-3.5.1.min.js"></script>
        <link href="bootstrap-4.4.1-dist/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
        <script>
            $(document).ready(function(){
                $("#cep").blur(function(){
                    var cep=$("input[name='cep']").val();
                    $.getJSON("https://viacep.com.br/ws/"+cep+"/json/", function(valores){
                        if(!("erro" in valores)){
                            $("#endereco").val(valores.logradouro);
                            $("#complemento").val(valores.complemento);
                            $("#bairro").val(valores.bairro);
                            $("#cidade").val(valores.localidade);
                            $("#estado").val(valores.uf);
                            $("#numero").focus();
                        }else{
                            alert("Endereço não encontrado!");
                            $("#cep").val("");
                        }
                        
                    });
                });
            });
        </script>
    </head>
    <body>
        
        <input type="number" id="cep" name="cep" placeholder="CEP..." minlenght="8" maxlength="8"></input>
        <br><br>
        <input readonly type="text" id="endereco" placeholder="Endereço..." title="Endereço"></input>
        <input readonly type="text" id="complemento" placeholder="Complemento..." title="Complemento"></input>
        <input readonly type="text" id="bairro" placeholder="Bairro..." title="Bairro"></input>
        <br><br>
        <input readonly type="text" id="cidade" placeholder="Cidade..." title="Cidade"></input>
        <input readonly type="text" id="estado" placeholder="Estado..." title="Estado"></input>
        <input type="number" id="numero" placeholder="Numero..." title="Numero"></input>
    </body>
</html>