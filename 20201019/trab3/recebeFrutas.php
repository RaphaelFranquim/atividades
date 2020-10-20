<?php
    session_start();

    if(in_array($_GET["fruta"], $_SESSION["frutas_existentes"])){
       echo "Essa fruta já foi cadastrada";
    }else{
       array_push($_SESSION["frutas_existentes"], $_GET["fruta"]);
        echo "Nova Fruta Cadastrada.";
    }

?>