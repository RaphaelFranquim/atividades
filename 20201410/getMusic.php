<?php
    require_once('connection.php');

    $select = "SELECT M.NOME 'MUSIC', M.ID 'ID_MUSIC', B.NOME 'BAND', G.NOME 'GENDER'
    FROM MUSICA M
    INNER JOIN BANDA B
    ON M.ID_BANDA = B.ID
    INNER JOIN GENERO G
    ON B.ID_GENERO = G.ID";

    $result = mysqli_query($conn, $select);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo json_encode($data);
?>