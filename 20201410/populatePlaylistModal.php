<?php
    require_once('./connection.php');

    $id = $_POST['id'];

    $select = "
        SELECT M.DESCRICAO 'LINK', P.NOME 'PLAYLIST', M.NOME 'MUSICA'
        FROM PLAYLIST P
        INNER JOIN PLAYLIST_MUSICA PM ON P.ID = PM.ID_PLAYLIST
        INNER JOIN MUSICA M ON M.ID = PM.ID_MUSICA
        WHERE P.ID = $id;
    ";

    $result = mysqli_query($conn, $select);

    while($row = mysqli_fetch_assoc($result)):
       echo "
        <iframe height='480' src='https://www.youtube.com/embed/$row[LINK]' 
            frameborder='0' allow='accelerometer'; autoplay; clipboard-white; encrypted-media; gyroscope; 
            picture-in-picture; allowfullscreen></iframe>
        ";
    endwhile;
?>