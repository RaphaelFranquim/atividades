<?php
    require_once('./connection.php');

    $music = $_POST['music'] ? $_POST['music'] : exit();
    $desc = $_POST['description'] ? $_POST['description'] : exit();
    $band = $_POST['band'] ? $_POST['band'] : exit();

    $select = "SELECT ID FROM MUSICA WHERE NOME LIKE '$music'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) != 0):
        echo "De novo véi?";
    else:
        $insert = "INSERT INTO MUSICA(
            NOME,
            DESCRICAO,
            ID_BANDA
        )VALUES(
            '$music',
            '$desc',
            '$band'
        )";

        if(mysqli_query($conn, $insert)):
            echo 1;
        else:
            echo 0;
        endif;
    endif;
?>