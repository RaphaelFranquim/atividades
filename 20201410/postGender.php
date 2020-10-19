<?php
    require_once('connection.php');

    $gender = $_POST['gender'];

    $select = "INSERT INTO GENERO(NOME)
    VALUES('$gender')";

    if(mysqli_query($conn, $select)):
        echo 1;
    else:
        echo 0;
    endif;
?>