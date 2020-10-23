<?php
    require_once('connection.php');

    $playlist = $_POST['playlist'] ? $_POST['playlist'] : exit();
    $musics = $_POST['musics'] ? $_POST['musics'] : exit();

    $select = "SELECT ID FROM PLAYLIST WHERE NOME LIKE '$playlist'";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) != 0):
        echo "Aí é foda né carai";
    else:
        $insert_playlist = "INSERT INTO PLAYLIST(NOME)
        VALUES('$playlist')";

        if(mysqli_query($conn, $insert_playlist)):
            $last_id = mysqli_insert_id($conn);

            foreach($musics as $key => $music) {
                $insert_playlist_music = "
                    INSERT INTO PLAYLIST_MUSICA(ID_MUSICA, ID_PLAYLIST)
                    VALUES($music[value], $last_id)
                ";

                mysqli_query($conn, $insert_playlist_music);
            }

            echo 1;
        else:
            echo 0;
        endif;
    endif;
?>