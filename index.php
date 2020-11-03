<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	  <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
	  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> <!-- Fonte -->
    <!-- JS, Popper.js, and jQuery -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script> <!-- Mascarás -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="index.js"></script> <!-- Chama a função do JavaScript LimparCamposEnder -->
    <script type="text/javascript" src="mascaras.js"></script>

    <!-- SweetAlert2, alerta javascript top -->
    <link rel="stylesheet" href="node_modules/@sweetalert2/theme-bootstrap-4/bootstrap-4.css">
    <script src="node_modules/sweetalert2/dist/sweetalert2.js"></script>

    <link rel="shortcut icon" href="icons8_news.ico" type="image/x-icon"/>
    <title>Cadastro</title>
</head>
<body>

    <div class="container">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="LimparCamposEnder();">
            Novo Cadastro
        </button>
    </div>
  
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg"> <!-- Adicionar o tamanho do modal aqui -->
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Cadastro de Cliente</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
      <form method="POST" action="cadastro.php" id='form-contato' enctype='multipart/form-data'>
			<div class="modal-body">
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                  <label>Código</label>
                  <input type="text" class="form-control" id="idcadastro" maxlength="7" name="idcadastro" disabled>
                </div>
              </div>
              <div class="col-md">
                  <div class="form-group">
                    <label for=""></label>
                    <div class="" id="mensagem" role="alert"></div>
                  </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-9"> <!-- col-md-2 é o comprimento do campo, se colocar 3 ele aumenta um pouco -->
                  <div class="form-group">
                  <label>Nome</label>
                  <input type="text" class="form-control" id="nome" maxlength="70" name="nome" autofocus="true" placeholder="Nome Completo" autocomplete="off">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Data Nasc</label>
                  <input type="date" class="form-control" id="dtnasc" name="dtnasc" pattern="dd-mm-yyyy" style="width: 170px;" required>
                </div>
              </div>
            </div>	

            <div class="row">
              <div class="col-md-2">
                <div class="form-group">
                  <label for="cboPessoa">Pessoa</label>
                    <select class="form-control" id="cboPessoa" onchange="mudarCpfCnpj(this.value)" name='cboPessoa'>
                      <option id="cboPessoa-item" value=""></option>
                      <option id="cboPessoa-item" value="PF">PF</option>
                      <option id="cboPessoa-item" value="PJ">PJ</option>                      
                    </select>                  
                </div>
              </div>

              <script type="text/javascript">
                function mudarCpfCnpj(val){
                  if(val == 'PF' ){
                    document.getElementById('mudarCpfCnpj').innerHTML = "CPF";
                    document.getElementById('mudaRGIE').innerHTML = "RG";

                    $('#cpfcnpj').attr({placeholder: "Insira o CPF", maxlenght: "14"}); /* 000.000.000-00 */
                    $('#rgie').attr({placeholder: "Insira o RG", maxlenght: "13"}); /* Ex: 00.000.000-0 ou -X */
                    
                    $("#cpfcnpj").inputmask({mask: ["###.###.###-##",],keepStatic: true});
                    $("#rgie").inputmask({mask: ["",],keepStatic: true});
                  }else if (val == 'PJ') {
                    document.getElementById('mudarCpfCnpj').innerHTML = "CNPJ";
                    document.getElementById('mudaRGIE').innerHTML = "IE (Inscrição Estadual)";

                    $('#cpfcnpj').attr({placeholder: "Insira o CNPJ", maxlenght: "18"}); /* Ex: 38.388.388/0000-00 */
                    $('#rgie').attr({placeholder: "Insira a Inscrição Estadual", maxlenght: "15"}); /* Ex: 388.108.598.269 */

                    $("#cpfcnpj").inputmask({mask: ["##.###.###/####-##",],keepStatic: true});
                    $("#rgie").inputmask({mask: ["###.###.###.###",],keepStatic: true});
                  }else{
                    $('#cpfcnpj').attr({placeholder: "", maxlenght: "18"});
                    $('#rgie').attr({placeholder: "", maxlenght: "15"}); 

                    $("#cpfcnpj").inputmask({mask: ["",],keepStatic: true});
                    $("#rgie").inputmask({mask: [""],keepStatic: true});
                  }
                }                
              </script>
            
              <div class="col-md-3">
                <div class="form-group">
                  <label id="mudarCpfCnpj">CPF</label>
                    <!-- <optgroup id="mudarCpfCnpj" label="CPF" style="font-weight: 400; font-style: normal;"></optgroup>  -->
                    <input type="text" class="form-control" id="cpfcnpj" name="cpfcnpj" placeholder="" autocomplete="off" style="margin-top: -1px;">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label id="mudaRGIE">RG</label>
                    <!-- <optgroup id="mudaRGIE" label="RG" style="font-weight: 400; font-style: normal;"></optgroup> -->
                  <input type="text" class="form-control" id="rgie" name="rgie" placeholder="" autocomplete="off" style="margin-top: -1px;">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label>Tel Contato</label>
                  <input type="text" class="form-control" id="telcontato" name="telcontato" autocomplete="off" maxlength="50">
                </div>
              </div>
            </div>

            <!-- Adicionar campo telefone -->
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Tel Residencial</label>
                  <input type="text" class="form-control" id="telres" name="telres" autocomplete="off" maxlength="15">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Celular</label>
                  <input type="text" class="form-control" id="celular" name="celular" autocomplete="off" maxlength="14">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>E-mail</label>
                  <input type="email" class="form-control" id="email" name="email" autocomplete="off" maxlength="170">
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-2"> <!-- col-md-2 é o comprimento do campo, se colocar 3 ele aumenta um pouco -->
                  <div class="form-group">
                  <label>CEP</label>
                  <input type="text" class="form-control" id="cep" maxlength="9" name="cep" autofocus="true" placeholder="CEP" autocomplete="off">
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <label>Endereço <span class="obrigatorio">*</span></label>                    
                  <input type="text" class="form-control" id="rua" name="rua" placeholder="Informe a Rua, Logradouro, Travessa" autocomplete="off">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Número</label>
                  <input type="text" class="form-control" id="numero" name="numero" placeholder="Número" autocomplete="off">
                </div>
              </div>
            </div>	

            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Bairro</label>
                  <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Informe o Bairro" autocomplete="off">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Cidade</label>
                  <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Informe a Cidade" autocomplete="off">
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-group">
                  <label>UF</label>
                  <input type="text" class="form-control" style="width: 50px;" id="uf" name="uf" maxlength="2" name="uf" placeholder="UF">
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label>Complemento</label>
                  <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento do Endereço" autocomplete="off">
                </div>
              </div>
            </div>
            
          </div>
          <div class="modal-footer">
            <!-- <span id='mensagem'></span> -->
            <label id="texto">Danilo Carlos Soares</label>
            <!-- <optgroup id="texto" data-toggle="tooltip" title="Clique para copiar" label="Danilo Carlos Soares"></optgroup>-->            
            <style>
			      #texto {
				        transition: opacity 0.9s;
                font-weight: 500; 
                font-style: normal;
				        opacity: 0.9
            }
			  
            #texto:hover {
                transition: opacity 1s;
                opacity: 1;
                /* background-color: #83C0EF; */
                color: #4367A7;                  
                font-weight: 900; 
                cursor: pointer; /* copy */
            }
            </style>       
            <script type="text/javascript">
            /* Função para copiar texto do optgroup */
            $('#texto').click(function(e){ 
              e.preventDefault();

                try
                {
                  var texto = $('#texto').html();

                  document.addEventListener('copy', function(e){
                    e.clipboardData.setData('text/plain', texto);
                    e.preventDefault();
                  }, true);
                  
                  /* var bCopiar = document.execCommand('copy'); */
                  /* alert('texto copiado' + texto); */
                  var bCopiar = navigator.clipboard.writeText(texto);
                  
                  if (bCopiar)
                  {
                    Swal.fire({position: 'top-end', icon: 'success', title: 'Texto copiado para a área de transferência', showConfirmButton: false, timer: 2500});
                  } else {
                    Swal.fire('Atenção','Este navegador não tem suporte para copiar' + e.message,'error');  
                  }
                } catch (e) {
                  Swal.fire('Atenção',e.message,'error');
                } 
               }); 
            </script>

            <button type="button" class="btn btn" data-dismiss="modal" style="color: red;">Cancelar</button>
            <button type="button" class="btn btn-warning" name="Novo" onclick="LimparCamposEnder();">Novo</button>              
            <button type="submit" class="btn btn-primary" id="cadastrar" onclick="return valida_form();" name="cadastrar">Cadastrar</button> 
          </div>             
        </form>
		</div>
		</div>
  </div>

  <br><br>
  <!-- Tabela -->
  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col" style="width: 5%; text-align: left;">Código</th>
        <th scope="col" style="width: 32,5%; text-align: left;">Nome</th>
        <th scope="col" style="width: 32,5%; text-align: left;">Endereço</th>
        <th scope="col" style="width: 20%; text-align: left;">Celular</th>
        <th scope="col" colspan="2" style="width: 10%; text-align: left;">Opções</th>
      </tr>
    </thead>
    <tbody>

      <?php 
        include('cadastro.php');  
        while($row = mysqli_fetch_array($resultado)) { 
      ?>    
          
        <tr>
          <th style="text-align: center;"><?php echo $row['idcadastro']; ?></th>
          <td style="text-align: left;"><?php echo $row['nome']; ?></td>
          <td style="text-align: left;"><?php echo $row['endereco']; ?></td>
          <td style="text-align: left;"><?php echo Mask('(##) #####-####', $row['celular']); ?></td>
          <td>
            <a class="btn btn-warning" href="index.php?edit=<?php echo $row['idcadastro']; ?>">Edit</a>
          </td>
          <td>
            
            <a class="btn btn-danger" href="cadastro.php?del=<?php echo $row['idcadastro']; ?>">Deletar</a>
          </td>
        </tr>
      <?php } ?>

    </tbody>
  </table>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
  <script type="text/javascript" src="cep.js"></script> <!-- Chama a função do JavaScript CEP -->
  <script type="text/javascript" src="index.js"></script> <!-- Chama a função do JavaScript LimparCamposEnder -->
  <script type="text/javascript" src="mascaras.js"></script>
</body>
</html>