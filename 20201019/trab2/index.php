<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <script src="jquery-3.5.1.min.js"></script>
    
    <script>
         $(document).ready(function(){
          $("#oculta").change(function(){
            if($("#oculta").val() != 0){

            if($("#imagem"+$("#oculta").val()).css("display")=="inline"){
              $("#imagem"+$("#oculta").val()).fadeOut();
              $("#mensagem_erro").html("");
            }else{
              $("#mensagem_erro").html("<h2> Imagem "+$("#oculta").val()+" já está oculta</h2>");
            }
            
            $("#oculta").val(" selecione qual ocultar ");
            }
          })
          $("#aparece").change(function(){
            if($("#aparece").val() != 0){
                
                if($("#imagem"+$("#aparece").val()).css("display")=="none"){
                $("#imagem"+$("#aparece").val()).fadeIn();
                $("#mensagem_erro").html("");
            }else{
                $("#mensagem_erro").html("<h2> Imagem "+$("#aparece").val()+" já está na tela.</h2>");
            }
                
                $("#aparece").val(" selecione qual mostrar ");
            }
            });
         });
    </script>
  </head>
  <body>
    <select id="oculta">
      <option value="0" label="Selecione qual ocultar"></option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
    </select>
    <select id="aparece">
      <option label="Selecione qual mostrar"></option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
    </select>  
    
    <br><br>
    <span id="mensagem_erro" style="color:red"></span>
    <img src="imagem1.png" id="imagem1">     
    <img src="imagem2.png" id="imagem2">
    <img src="imagem3.png" id="imagem3">
    <img src="imagem4.png" id="imagem4">
    <img src="imagem5.png" id="imagem5">
    <img src="imagem6.png" id="imagem6">
    <img src="imagem7.png" id="imagem7">
    <img src="imagem8.png" id="imagem8">
  </body>
</html>