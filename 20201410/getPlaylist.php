<?php
    require_once('connection.php');

    $select = "SELECT NOME, ID FROM PLAYLIST";

    $result = mysqli_query($conn, $select);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo json_encode($data);
?>

