<?php
    require_once('connection.php');

    $gender = $_POST['gender'] ? $_POST['gender'] : exit();
    
    // if($_POST['gender'] != ''):
    //     $gender = $_POST['gender'];
    // else:
    //     exit();
    // endif;

    $select = "SELECT ID FROM GENERO WHERE NOME LIKE '$gender'";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) != 0):
        echo "O gênero digitado já foi inserido";
    else:
        $insert = "INSERT INTO GENERO(NOME)
        VALUES('$gender')";
    
        if(mysqli_query($conn, $insert)):
            echo 1;
        else:
            echo 0;
        endif;
    endif;
?>

