<?php 
  require_once('arquivos/php/header.php'); 
  
  /* Modal */
  require_once('arquivos/php/cadastro/ModalCadastro.php');
  require_once('arquivos/php/class/cadastro.php');
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Cadastro</title>
</head>
<body>
  
  
  <div class="container">
      <!-- Button trigger modal -->
      <p>
        <button type="button" id="atualizar" class="btn btn-info">
            Atualizar
        </button>

        <button type="button" id="novocadastro" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Novo Cadastro
        </button>

        <!-- <p> -->
          <button id="carregando" class="btn btn-light" >
            Carregando
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
          </button>
        <!-- </p> -->
      </p>
  </div>

  <!-- Tabela -->
  <table class="table table-striped"> <!-- tirar o striped e colocar o sm, a tabela fica pequena -->
    <thead class="thead-dark">
      <tr>
        <th scope="col" style="width: 5%; text-align: left;">Código</th>
        <th scope="col" style="text-align: left;">Nome</th>
        <th scope="col" style="text-align: left;">Endereço</th>
        <th scope="col" style="width: 20%; text-align: left;">Celular</th>
        <th scope="col" colspan="2" style="width: 10%; text-align: left;">Opções</th>
      </tr>
    </thead>
    <tbody id='dados'>
      <?php        
        if(!$resultado){
          echo "<p><div class='alert alert-danger' role='alert'>Tabela não existe ou não foi encontrada!</div></p>";
          return false;
        }
        while($row = mysqli_fetch_array($resultado)) { 
      ?>
        <tr>
          <td id="tdidcadastro" style="text-align: center;"><?php echo $row['idcadastro']; ?></td>
          <td id="tdnome" style="text-align: left;"><?php echo $row['nome']; ?></td>
          <td id="tdendereco" style="text-align: left;"><?php echo $row['endereco']; ?></td>
          <td id="tdcelular" style="text-align: left;"><?php echo Mask('## # ####-####', $row['celular']); ?></td>
          <td>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <button class="fa fa-pencil-square-o btn btn-warning active" type="submit" id="editar" data-toggle="modal" data-target="#exampleModal" data-id="<?php echo $row['idcadastro']; ?>" onclick="return exibirRegistro(<?php echo $row['idcadastro']; ?>)" name="editar"></button>
                <button class="fa fa-trash btn btn-danger" type="submit" id="excluir" onclick="return excluirRegistro(<?php echo $row['idcadastro']; ?>)" name="excluir"></button> 
            </div>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
  <script type="text/javascript" src="arquivos/js/cep.js"></script> <!-- Chama a função do JavaScript CEP -->
  <script type="text/javascript" src="arquivos/js/index.js"></script> <!-- Chama a função do JavaScript LimparCamposEnder -->
  <script type="text/javascript" src="arquivos/js/geral.js"></script>  
</body>
</html>