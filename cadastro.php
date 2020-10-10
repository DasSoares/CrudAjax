<?php
    /* session_start(); */
    include_once('server.php');/* Inicia a conexão com o servidor */   

    $nome;
    $dtnasc;
    $tipopessoa;
    $cpfcnpj;
    $rgie;
    $telcontato;
    $telresidencial;
    $celular;
    $email;
    $cep;
    $endereco;
    $numero;
    $bairro;
    $cidade;
    $uf;
    $complemento;
    
    if (isset($_POST['cadastrar']))
    {
        $nome = $_POST['nome'];
        $dtnasc = $_POST['dtnasc'];
        $tipopessoa = $_POST['cboPessoa'];
        $cpfcnpj = $_POST['cpfcnpj'];
        $rgie = $_POST['rgie'];
        $telcontato = $_POST['telcontato'];
        $telresidencial = $_POST['telres'];
        $celular = $_POST['celular'];
        $email = $_POST['email'];
        $cep = $_POST['cep'];
        $endereco = $_POST['rua'];
        $numero = $_POST['numero'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $uf = $_POST['uf'];
        $complemento = $_POST['complemento'];
        
        $insert = "insert into cadastro (nome,dtnasc,tipopessoa,cpfcnpj,rgie,telcontato,telresidencial,celular,email,cep,endereco,numero,bairro,cidade,uf,complemento) values ('$nome','$dtnasc','$tipopessoa','$cpfcnpj','$rgie','$telcontato','$telresidencial','$celular','$email','$cep','$endereco','$numero','$bairro','$cidade','$uf','$complemento')";
        $result = mysqli_query($conn, $insert);        
 
        echo "<br><br>Status: $result";

        if(mysqli_affected_rows($conn)){

        }
        if($result){
            echo '<scrip> alert("Novo registro inserido com sucesso!"); </script>';
            header('Location: index.html');
        }else{
            echo '<script> alert("Não foi possivel registrar no banco de dados!"); </script>';
        }
    }
        /* if($conn->query($insert) === true){
            $_SESSION['status_cadastro'] = true;
        }else{
            $_SESSION['status_cadastro'] = false;
        }

        echo $result; */
    /* } */
    /* 
    if (isset($_POST['update'])){

    } */
   

    /* header('Location: index.html'); */
    /* exit; */
?>