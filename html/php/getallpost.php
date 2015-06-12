<?php

    require('db.php');
    conn->query('select idPublicacion,  titulo from Publicaciones order by idPublicacion desc');
    //conn->

?>
