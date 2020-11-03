<?php
    /* session_start(); */
    require_once('server.php');/* Inicia a conexão com o servidor */   

    $resultado = $conn->query('select * from cadastro');
        
    $msg_resposta;    

    function limpaTexto($string){
        return preg_replace("/[^0-9]/", "", $string);
    }

    function Mask($mask, $str){
        /* Adiciona a Mascara para o campo desejado */
        if(strlen($str) > 0){            
            $str = str_replace(" ","",$str);
            
            for($i=0;$i<strlen($str);$i++){
                $mask[strpos($mask,"#")] = $str[$i];
            }
            
            return $mask;
        }
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
            $msg_resposta = "Registro cadastrado com sucesso!";
        }else{            
            $msg_resposta = "Erro no processo de cadastramento. Tente novamente.";
        }
        
        /* $dados_retorno = array(
            'status' => $status
        ); */
        
        /* header("content-type: application/json"); */
        
       /*  echo json_encode($dados_retorno); */
       echo "<script>
                alert(".$msg_resposta.");
            </script>";
    }

    if(isset($_GET['del']))
    {   
        $idcadastro = $_GET['del'];
             
        mysqli_query($conn, "delete from cadastro where idcadastro=$idcadastro");
        //$_SESSION['msg'] = "Registro deletado com sucesso!";
        echo "<script type='text/javascript'> alert('Registro deletado com sucesso!') </script>";
        /* header('location: index.php'); */
    }
    
?>
