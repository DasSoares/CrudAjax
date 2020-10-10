<?php

    $server = "127.0.0.1";
    $user = "danilo";
    $pwd = "123";
    $db = "myapplication";

    //cria a conexão
    $conn = mysqli_connect($server,$user,$pwd,$db) or die('Não foi possivel conectar com o banco de dados!');    

    if (!$conn){
        echo "Erro: Não foi possivel conectar com o mysql".PHP_EOL;
        echo "Errno ao debugar: ".mysqli_connect_errno().PHP_EOL;
        echo "Erro ao debugar: ".mysqli_connect_erro().PHP_EOL;
    }

    echo "Sucesso ao conectar com o Mysql".PHP_EOL;
    echo "Informação do Host: ".mysqli_get_host_info($conn).PHP_EOL;

    mysqli_close($conn);
?>