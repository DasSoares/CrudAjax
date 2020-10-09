<?php

    $server = "127.0.0.1";
    $user = "danilo";
    $pwd = "123";
    $db = "myapplication";

    //cria a conexão
    $conn = mysqli_connect($server,$user,$pwd,$db) or die('Não foi possivel conectar com o banco de dados!');

    include($conn);
?>