<?php

    $host = "localhost";
    $usuario = "root";
    $senha = "usbw";
    $bd = "escola";

    $conexao = mysqli_connect($host,$usuario,$senha,$bd);

    if(!$conexao){
        die("Conexão com o Banco de Dados falhou.");
    }

?>