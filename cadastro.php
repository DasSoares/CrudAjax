<?php
    session_start();

    include_once('server.php');

    $nome = "";
    $dtnasc = "";
    $tipopessoa = "";
    $cpfcnpj = "";
    $rgie = "";
    $telcontato = "";
    $telresidencial = "";
    $celular = "";
    $email = "";
    $cep = "";
    $endereco = "";
    $numero = "";
    $bairro = "";
    $cidade = "";
    $uf = "";
    $complemento = "";
    /* $complemento = mysqli_real_escape_string($coon, $_POST['complemento']); */

    if (isset($_POST['cadastrar'])){
        $nome = mysqli_real_escape_string($conn, $_POST['nome']);
        $dtnasc = mysqli_real_escape_string($conn, $_POST['dtnasc']);
        $tipopessoa = mysqli_real_escape_string($conn, $_POST['cboPessoa']);
        $cpfcnpj = mysqli_real_escape_string($conn, $_POST['cpfcnpj']);
        $rgie = mysqli_real_escape_string($conn, $_POST['rgie']);
        $telcontato = mysqli_real_escape_string($conn, $_POST['telcontato']);
        $telresidencial = mysqli_real_escape_string($conn, $_POST['telres']);
        $celular = mysqli_real_escape_string($conn, $_POST['celular']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $cep = mysqli_real_escape_string($conn, $_POST['cep']);
        $endereco = mysqli_real_escape_string($conn, $_POST['rua']);
        $numero = mysqli_real_escape_string($conn, $_POST['numero']);
        $bairro = mysqli_real_escape_string($conn, $_POST['bairro']);
        $cidade = mysqli_real_escape_string($conn, $_POST['cidade']);
        $uf = mysqli_real_escape_string($conn, $_POST['uf']);
        $complemento = mysqli_real_escape_string($conn, $_POST['complemento']);
        
        $insert = "insert into cadastro (nome,dtnasc,tipopessoa,cpfcnpj,rgie,telcontato,telresidencial,celular,email,cep,endereco,numero,bairro,cidade,uf,complemento) values ('$nome','$dtnasc','$tipopessoa','$cpfcnpj','$rgie','$telcontato','$telresidencial','$celular','$email','$cep','$endereco','$numero','$bairro','$cidade','$uf','$complemento');";
        $result = mysqli_query($conn, $insert);        

        if($conn->query($insert) === true){
            $_SESSION['status_cadastro'] = true;
        }else{
            $_SESSION['status_cadastro'] = false;
        }

        echo $result;
    }
    /* 
    if (isset($_POST['update'])){

    }
 */

    $conn->close(); /* Fecha conexao */

    header('Location: index.php');
    exit;
?>