<?php

    $servidorBD = "localhost";
    $usuarioBD  = "root";
    $senhaBD    = "root";
    $database   = "bestgames";

    $link = mysqli_connect($servidorBD, $usuarioBD, $senhaBD, $database);

    if(!$link){
        echo "<p>Erro ao tentar conectar à Base de Dados <b>$database</b></p>";
    }
?>