<?php
    include_once('server.php');

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

    $insert = "insert into cadastro (nome,dtnasc,tipopessoa,cpfcnpj,rgie,telcontato,telresidencial,celular,email,cep, endereco,numero,bairro,cidade,uf,complemento) 
    values ($nome,$dtnasc,$tipopessoa,$cpfcnpj,$rgie,$telcontato,$telresidencial,$celular,$email,$cep,$endereco,$numero,$bairro,$cidade,$uf,$complemento);";
    $result = mysqli_query($coon, $result);

    /* if ($result == true)
    {
        echo "
            <script type='text/javascript'
        ";
    }
    else
    {

    } */
?>