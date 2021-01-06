<script type="text/javascript" src="arquivos/js/index.js"></script> <!-- Chama a função do JavaScript LimparCamposEnder -->
<script type="text/javascript" src="arquivos/js/geral.js"></script>

<!-- Modal cadastrar -->
<div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg"> <!-- Adicionar o tamanho do modal aqui -->
		<div class="modal-content">
			<div class="modal-header">
	    		<h5 class="modal-title" id="exampleModalLabel">Cadastro de Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
			</div>

            <form id='form-contato' enctype='multipart/form-data'>
			    <div class="modal-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label id="titulo">Código</label>
                                <input type="text" class="form-control" id="idcadastro" maxlength="7" name="idcadastro" value="" style="text-align: center;" disabled>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for=""></label>
                                <p>
                                    <div class="" id="mensagem" role="alert"></div>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9"> <!-- col-md-2 é o comprimento do campo, se colocar 3 ele aumenta um pouco -->
                            <div class="form-group">
                                <label id="titulo">Nome</label>
                                <input type="text" class="form-control" id="nome" maxlength="70" name="nome" autofocus="true" placeholder="Nome Completo" autocomplete="off" value="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label id="titulo">Data Nasc</label>
                                <input type="date" class="form-control" id="dtnasc" name="dtnasc" pattern="dd-mm-yyyy" value="" >
                            </div>
                        </div>
                    </div>	

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label id="titulo">Pessoa</label>
                                <select class="form-control" id="cboPessoa" onchange="mudarCpfCnpj(this.value)" name='cboPessoa'>
                                    <option id="cboPessoa-item" value=""></option>
                                    <option id="cboPessoa-item" value="PF">PF</option>
                                    <option id="cboPessoa-item" value="PJ">PJ</option>                      
                                </select>                  
                            </div>
                        </div>                        

                        <!-- Adiciona na linha campos Cpf, rg e telefone de contato -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label id="mudarCpfCnpj">CPF</label>
                                <input type="text" class="form-control" id="cpfcnpj" name="cpfcnpj" placeholder="" autocomplete="off" value="">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label id="mudaRGIE">RG</label>
                                <input type="text" class="form-control" id="rgie" name="rgie" placeholder="" autocomplete="off" value="">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label id="titulo">Tel Contato</label>
                                <input type="text" class="form-control" id="telcontato" name="telcontato" autocomplete="off" maxlength="50" value="">
                            </div>
                        </div>
                    </div>

                    <!-- Adicionar campos telefone, celular e e-mail -->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label id="titulo">Tel Residencial</label>
                                <input type="text" class="form-control" id="telres" name="telres" autocomplete="off" maxlength="15" value="">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label id="titulo">Celular</label>
                                <input type="text" class="form-control" id="celular" name="celular" autocomplete="off" maxlength="14" value="">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label id="titulo">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" autocomplete="off" maxlength="170" value="">
                            </div>
                        </div>
                    </div>
                        
                    <!-- Adiciona na linha campos CEP, endereço, numero -->
                    <div class="row">
                        <div class="col-md-2"> <!-- col-md-2 é o comprimento do campo, se colocar 3 ele aumenta um pouco -->
                            <div class="form-group">
                                <label id="titulo">CEP</label>
                                <input type="text" class="form-control" id="cep" maxlength="9" name="cep" autofocus="true" placeholder="CEP" autocomplete="off" value="">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label id="titulo">Endereço</label>                    
                                <input type="text" class="form-control" id="rua" name="rua" placeholder="Informe a Rua, Logradouro, Travessa" autocomplete="off" value="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label id="titulo">Número</label>
                                <input type="text" class="form-control" id="numero" name="numero" placeholder="Número" autocomplete="off" value="">
                            </div>
                        </div>
                    </div>	

                    <!-- Adiciona na linha campos bairro, cidade, uf e complemento  -->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label id="titulo">Bairro</label>
                                <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Informe o Bairro" autocomplete="off" value="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label id="titulo">Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Informe a Cidade" autocomplete="off" value="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label id="titulo">UF</label>
                                <input type="text" class="form-control" id="uf" name="uf" maxlength="2" name="uf" placeholder="UF" value="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label id="titulo">Complemento</label>
                                <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento do Endereço" autocomplete="off" value="">
                            </div>
                        </div>
                    </div>
            
                </div>
                
                <div class="modal-footer">
                    <label id="texto">Danilo Carlos Soares</label>

                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button> <!-- style="color: red;" -->
                    <button type="button" class="btn btn-warning" id="limparcampos" name="Novo">Novo</button>              
                    <button type="submit" class="btn btn-primary" id="cadastrar" name="cadastrar">Cadastrar</button> 
                </div>             
            </form>
        </div>
    </div>
</div>