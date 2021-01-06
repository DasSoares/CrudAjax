<?php
    /* session_start(); */
    require_once ('server.php');/* Inicia a conexão com o servidor */   

    if(!$conn){
        return false;
    }

    $idcadastro=0;
    $nome = '';
    $dtnasc = '';
    $tipopessoa = '';
    $cpfcnpj = '';
    $rgie = '';
    $telcontato = '';
    $telres = '';
    $celular = '';
    $email = '';
    $cep = '';
    $endereco = '';
    $numero = '';
    $bairro = '';
    $cidade = '';
    $uf = '';
    $complemento = '';

    function pegavalor($campo) {
        if(isset($_POST[$campo])){
            return $_POST[$campo];
        } else if (isset($_GET[$campo])){
            return $_GET[$campo];
        }       
        
        return '';
    }
    
    $resultado = $conn->query('select * from cadastro');
    
    $msg_resposta;    

    function onlynumbers($string){
        // Somente números
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
    
    //$acao = isset($_POST['key']) ? $_POST['key'] : '';
    $acao = pegavalor('key');
    
    if ($acao == 'cadastrar') { 
        $id = 0;
        $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $dtnasc = isset($_POST['dtnasc']) ? $_POST['dtnasc'] : '';
        $tipopessoa = isset($_POST['tipopessoa']) ? $_POST['tipopessoa'] : '';
        $cpfcnpj = isset($_POST['cpfcnpj']) ? onlynumbers($_POST['cpfcnpj']) : '';
        $rgie = isset($_POST['rgie']) ? onlynumbers($_POST['rgie']) : '';
        $telcontato = isset($_POST['telcontato']) ? $_POST['telcontato'] : '';
        $telres = isset($_POST['telres']) ? onlynumbers($_POST['telres']) : '';
        $celular = isset($_POST['celular']) ? onlynumbers($_POST['celular']) : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $cep = isset($_POST['cep']) ? onlynumbers($_POST['cep']) : '';
        $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
        $numero = isset($_POST['numero']) ? $_POST['numero'] : '';
        $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
        $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
        $uf = isset($_POST['uf']) ? $_POST['uf'] : '';
        $complemento = isset($_POST['complemento']) ? $_POST['complemento'] : '';
        
        $insert = "insert into cadastro (nome,dtnasc,tipopessoa,cpfcnpj,rgie,telcontato,telresidencial,celular,email,cep,endereco,numero,bairro,cidade,uf,complemento) values ('$nome','$dtnasc','$tipopessoa','$cpfcnpj','$rgie','$telcontato','$telres','$celular','$email','$cep','$endereco','$numero','$bairro','$cidade','$uf','$complemento')";
        $result = mysqli_query($conn, $insert);   

        if($result){
            // Registro cadastrado com sucesso
            echo json_encode(array("statuscode"=>200));
        }else{            
            // Erro no processo de cadastramento. Tente novamente.
            echo json_encode(array("statuscode"=>201));
        }
        
        mysqli_close($conn); //Fecha conexão
    }

    if ($acao == 'editar registro') { 
        $idcadastro = isset($_POST['id']) ? $_POST['id']: 0;
        $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $dtnasc = isset($_POST['dtnasc']) ? $_POST['dtnasc'] : '';
        $tipopessoa = isset($_POST['tipopessoa']) ? $_POST['tipopessoa'] : '';
        $cpfcnpj = isset($_POST['cpfcnpj']) ? onlynumbers($_POST['cpfcnpj']) : '';
        $rgie = isset($_POST['rgie']) ? onlynumbers($_POST['rgie']) : '';
        $telcontato = isset($_POST['telcontato']) ? $_POST['telcontato'] : '';
        $telres = isset($_POST['telres']) ? onlynumbers($_POST['telres']) : '';
        $celular = isset($_POST['celular']) ? onlynumbers($_POST['celular']) : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $cep = isset($_POST['cep']) ? onlynumbers($_POST['cep']) : '';
        $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
        $numero = isset($_POST['numero']) ? $_POST['numero'] : '';
        $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
        $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
        $uf = isset($_POST['uf']) ? $_POST['uf'] : '';
        $complemento = isset($_POST['complemento']) ? $_POST['complemento'] : '';
        
        if($idcadastro > 0){
            $update = "update cadastro set nome='$nome',dtnasc='$dtnasc',tipopessoa='$tipopessoa',cpfcnpj='$cpfcnpj',rgie='$rgie', 
                       telcontato='$telcontato',telresidencial='$telres',celular='$celular',email='$email',cep='$cep',endereco='$endereco', 
                       numero='$numero',bairro='$bairro',cidade='$cidade',uf='$uf',complemento='$complemento'  
                       where idcadastro=$idcadastro";

            $result = mysqli_query($conn, $update);   
    
            if($result){
                // Registro alterado com sucesso
                echo json_encode(array("statuscode"=>200));
            }else{            
                // Erro ao alterar o registro
                echo json_encode(array("statuscode"=>201));
            }
        }
        
        mysqli_close($conn); //Fecha conexão
    }


    if($acao == 'excluir') {
        $idcadastro = isset($_POST['id']) ? $_POST['id'] : '';
        $r = mysqli_query($conn, "delete from cadastro where idcadastro=$idcadastro");

        if($r){
            echo json_encode(array("statuscode"=>200));            
        }else {
            echo json_encode(array("statuscode"=>201));
        }

        mysqli_close($conn);
    }


    if($acao == 'Refresh'){
        $resultado = $conn->query("select idcadastro, nome, endereco, celular from cadastro ");
        
        if($resultado){
            $arr= array();
            
            while ($row = $resultado->fetch_assoc()){
                $d = array(
                    'idcadastro' => $row['idcadastro'],
                    'nome' => $row['nome'],
                    'endereco' => $row['endereco'],
                    'celular' => Mask('## # ####-####', $row['celular'])
                );

                array_push($arr, $d);
            }
            echo json_encode($arr);
        }
    }

    
    if($acao == 'editar'){
        $id = pegavalor('id');

        if ($id > 0){
            $resultado = $conn->query("select * from cadastro where idcadastro=$id ");
            if($resultado){
                $arr = array();

                if ($row = $resultado->fetch_assoc()){
                    $d = array(
                        'idcadastro' => empty($row['idcadastro']) ? 0 : $row['idcadastro'],
                        'nome' => empty($row['nome']) ? '' : $row['nome'],
                        'dtnasc' => empty($row['dtnasc']) ? '' : $row['dtnasc'],
                        'tipopessoa' => empty($row['tipopessoa']) ? '' : $row['tipopessoa'],
                        'cpfcnpj' => empty($row['cpfcnpj']) ? '' : $row['cpfcnpj'],
                        'rgie' => empty($row['rgie']) ? '' : $row['rgie'],
                        'telcontato' => empty($row['telcontato']) ? '' : $row['telcontato'],
                        'telres' => empty($row['telresidencial']) ? '' : $row['telresidencial'],
                        'celular' => empty($row['celular']) ? '' : $row['celular'],
                        'email' => empty($row['email']) ? '' : $row['email'],
                        'cep' => empty($row['cep']) ? '' : $row['cep'],
                        'endereco' => empty($row['endereco']) ? '' : $row['endereco'],
                        'numero' => empty($row['numero']) ? '' : $row['numero'],
                        'bairro' => empty($row['bairro']) ? '' : $row['bairro'],
                        'cidade' => empty($row['cidade']) ? '' : $row['cidade'],
                        'uf' => empty($row['uf']) ? '' : $row['uf'],
                        'complemento' => empty($row['complemento']) ? '' : $row['complemento']
                    );

                    array_push($arr, $d);
                }
                echo json_encode($arr);
            }
        }
    }
?>