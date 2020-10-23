<?php
    require_once('connection.php');

    $band = $_POST['band'] ? $_POST['band'] : exit();
    $gender = $_POST['gender'] ? $_POST['gender'] : exit();

    $select = "SELECT ID FROM BANDA WHERE NOME LIKE '$band'";
  
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) != 0):
        echo "Deu ruim carai";
    else:
        $insert = "INSERT INTO BANDA(
            NOME,
            ID_GENERO
        )VALUES(
            '$band',
            '$gender'
        )";

        if(mysqli_query($conn, $insert)):
            echo 1;
        else:
            echo 0;
        endif;
    endif;
?>