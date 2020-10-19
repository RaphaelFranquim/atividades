<!DOCTYPE html>
<html>
    <head>
        <meta charset "utf-8" />
    </head>
    <body>
        <div id = "filtro">
        <b>Filtrar alunos por:</b> <br />
        <form method="post" action="alunos.php">
            Sexo:
            <input type="radio" name="sexo" value="m" />Masc.
            <input type="radio" name="sexo" value="f" />Fem. <br /> <br />
            <input type="text" name="nome" placeholder="Procurar por nome..." /> <br />
            Data de nascimento a partir de:<input type="date" name="data_nascimento" />
            
            <hr /><button>Filtrar</button>
            <hr /><hr />
        </form>
        </div>

        

    </body>
</html>

<?php

    include "conexao.php";

    $select = "SELECT * FROM aluno";

    if(!empty($_POST)){
        $select .= " WHERE (1=1) ";
        if(isset($_POST["sexo"])){
            $sexo = $_POST["sexo"];
            $select .= " AND sexo = '$sexo'";
        }
        if($_POST["nome"]!=""){
            $nome = $_POST["nome"];
            $select .= " AND nome like '%$nome%'";
        }
        if($_POST["data_nascimento"]!=""){
            $data = $_POST["data_nascimento"];
            $select .= " AND data_nascimento >= '$data'";
        }
    }
    
    $select .= " ORDER BY nome";

    $resultado = mysqli_query($conexao,$select);

    while($linha=mysqli_fetch_assoc($resultado)){
        echo "<b>Prontuário</b>:".$linha["prontuario"]."<br />";
        echo "<b>Nome</b>:".$linha["nome"]."<br />";
        echo "<b>Email</b>:".$linha["email"]."<br />";
        echo "<b>Data Nascimento</b>:".$linha["data_nascimento"]."<br />";
        echo "<b>Sexo</b>:".$linha["sexo"]."<br />";
    }

?>