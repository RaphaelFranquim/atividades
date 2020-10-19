<?php
    $host = 'localhost';
    $user = 'root';
    $password = 'usbw';
    $dbname = 'PLAYERTAUS';

    try{
        $conn = mysqli_connect($host, $user, $password, $dbname);
    }
    catch(Exception $e){
        echo ($e->getMessage());
    }
?>