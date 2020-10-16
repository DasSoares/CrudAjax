<?php
    /* session_start(); */
    require_once('server.php');/* Inicia a conexão com o servidor */   
    
    $status;
    $msg_resposta;    

    function limpaTexto($string){
        return preg_replace("/[^0-9]/", "", $string);
    }
    
    if (isset($_POST['cadastrar']))
    {
        $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $dtnasc = isset($_POST['dtnasc']) ? $_POST['dtnasc'] : '';
        $tipopessoa = isset($_POST['cboPessoa']) ? $_POST['cboPessoa'] : '';
        $cpfcnpj = isset($_POST['cpfcnpj']) ? $_POST['cpfcnpj'] : '';
        $rgie = isset($_POST['rgie']) ? $_POST['rgie'] : '';
        $telcontato = isset($_POST['telcontato']) ? $_POST['telcontato'] : '';
        $telres = isset($_POST['telres']) ? limpaTexto($_POST['telres']) : '';
        $celular = isset($_POST['celular']) ? limpaTexto($_POST['celular']) : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $cep = isset($_POST['cep']) ? $_POST['cep'] : '';
        $endereco = isset($_POST['rua']) ? $_POST['rua'] : '';
        $numero = isset($_POST['numero']) ? $_POST['numero'] : '';
        $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
        $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
        $uf = isset($_POST['uf']) ? $_POST['uf'] : '';
        $complemento = isset($_POST['complemento']) ? $_POST['complemento'] : '';
        
        $insert = "insert into cadastro (nome,dtnasc,tipopessoa,cpfcnpj,rgie,telcontato,telresidencial,celular,email,cep,endereco,numero,bairro,cidade,uf,complemento) values ('$nome','$dtnasc','$tipopessoa','$cpfcnpj','$rgie','$telcontato','$telres','$celular','$email','$cep','$endereco','$numero','$bairro','$cidade','$uf','$complemento')";
        $result = mysqli_query($conn, $insert);   

        if($result){
            $status = "success";
            $msg_resposta = "Registro cadastrado com sucesso!";
            //echo "Registro cadastrado com sucesso!";
        }else{
            $status = "error";
            $msg_resposta = "Erro no processo de cadastramento. Tente novamente.";
            //echo "Erro ao cadastrar!";
        }
        
        $dados_retorno = array(
            'msg' => $msg_resposta,
            'status' => $status,
        );
        
        header("content-type: application/json");
        
        echo json_encode($dados_retorno);
    }
?>
