// const { default: Swal } = require("sweetalert2"); 
var imported = document.createElement('script');
imported.src = 'arquivos/js/mascaras.js';
document.head.appendChild(imported); 


window.onload = function(){
    Mascaras();
    mudarCpfCnpj(0);
    loaderSpinners(false, 0);    
};

//#region Evento clique botoẽs

// Aciona o botão clique e grava no banco
$('#cadastrar').click(function (e) { 
    e.preventDefault();
    return valida_form();
});

// Aciona o botão clique e limpa os campos
$('#limparcampos').click(function (e) { 
    e.preventDefault();
    return LimparCamposEnder();
});

// Aciona o botão clique para cadastrar e limpa os campos caso tiver campos preenchidos
$('#novocadastro').click(function (e) {
    e.preventDefault();
    return LimparCamposEnder();
});

//
$('#atualizar').click(function (e) { 
    e.preventDefault();    
    return atualizar();
});

$('#editar').click(function (e) { 
    e.preventDefault();    
    //exibirRegistro(this.value);
});

$('#texto').click(function(e){ 
    e.preventDefault();
    // Função para copiar texto da label

    CopiaTextoLabel(this);
}); 
//#endregion Evento clique botoẽs

//#region Funções
function LimparCamposEnder(){
    document.getElementById('idcadastro').value = ''
    document.getElementById('nome').value = "";
    document.getElementById('dtnasc').value = "";
    document.getElementById('cboPessoa').value = "";
    document.getElementById('cboPessoa').value = 0;
    document.getElementById('cpfcnpj').value = "";
    document.getElementById('rgie').value = "";

    mudarCpfCnpj(0);

    document.getElementById('telres').value = "";
    document.getElementById('telcontato').value = "";
    document.getElementById('celular').value = "";
    document.getElementById('email').value = "";

    document.getElementById('cep').value = "";
    document.getElementById('rua').value = "";
    document.getElementById('numero').value = "";
    document.getElementById('bairro').value = "";
    document.getElementById('cidade').value = "";
    document.getElementById('uf').value = "";
    document.getElementById('complemento').value = "";
    document.getElementById('nome').focus(); 
    $('#cadastrar').html('Cadastrar');
    //console.log($('#cadastrar').html().toLowerCase());
}

function GetBrowserInfo() {
    var isOpera = !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;   
    var isFirefox = typeof InstallTrigger !== 'undefined';   // Firefox 1.0+
    var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
    var isChrome = !!window.chrome && !isOpera;              // Chrome 1+
    var isIE = /*@cc_on!@*/false || !!document.documentMode;   // At least IE6
   
    if (isOpera) {
        return 1;
    }
    else if (isFirefox) {
        return 2;
    }
    else if (isChrome) {
        return 3;
    }
    else if (isSafari) {
        return 4;
    }
    else if (isIE) {
        return 5;
    }
    else {
        return 0;
    }
}

function mudarCpfCnpj(val){
    if(val == 'PF' ){
        document.getElementById('mudarCpfCnpj').innerHTML = "CPF";
        document.getElementById('mudaRGIE').innerHTML = "RG";

        $('#cpfcnpj').attr({placeholder: "Insira o CPF", maxlenght: "14"}); /* 000.000.000-00 */
        $("#cpfcnpj").inputmask({mask: ["###.###.###-##",],keepStatic: true});
        
        $('#rgie').attr({placeholder: "Insira o RG", maxlenght: "13"}); /* Ex: 00.000.000-0 ou -X */
        $("#rgie").inputmask({mask: ["",],keepStatic: true});
    }else if (val == 'PJ') {
        document.getElementById('mudarCpfCnpj').innerHTML = "CNPJ";
        document.getElementById('mudaRGIE').innerHTML = "IE (Inscrição Estadual)";

        $('#cpfcnpj').attr({placeholder: "Insira o CNPJ", maxlenght: "18"}); /* Ex: 38.388.388/0000-00 */
        $("#cpfcnpj").inputmask({mask: ["##.###.###/####-##",],keepStatic: true});

        $('#rgie').attr({placeholder: "Insira a Inscrição Estadual", maxlenght: "15"}); /* Ex: 388.108.598.269 */
        $("#rgie").inputmask({mask: ["###.###.###.###",],keepStatic: true});
    }else{
        $('#cpfcnpj').attr({placeholder: "", maxlenght: "18"});
        $("#cpfcnpj").inputmask({mask: ["",],keepStatic: true});

        $('#rgie').attr({placeholder: "", maxlenght: "15"}); 
        $("#rgie").inputmask({mask: [""],keepStatic: true});
    }
}  

function valida_form(){    
    var bPodecadastrar = true;

    if (document.getElementById('nome').value.length < 1) {
        document.getElementById('nome').focus();
        Swal.fire('Atenção','O campo nome não pode ficar vázio!', 'warning');
        bPodecadastrar = false;
        return false;
    } else if(document.getElementById('cboPessoa').value < 1) {
        document.getElementById('cboPessoa').focus();
        Swal.fire('Atenção','Por favor, selecione o tipo pessoa!','warning');
        bPodecadastrar = false;
        return false;
    } else if(document.getElementById('cep').value.length < 1) {
        var msg = 'Por favor, insira o cep!';
        document.getElementById('cep').focus();
        Swal.fire('Atenção',msg, 'info');
        bPodecadastrar = false;
        return false;
    }

    if(!bPodecadastrar){
        return false;
    }
    
    NovoRegistro();
}

function NovoRegistro(){ //Mudar nome para Salvar
    var dados = {
        key: $('#cadastrar').html().toLowerCase(), //pega o text do botão cadastrar ou editar
        id: $('#idcadastro').val(),
        nome: document.getElementById('nome').value,
        dtnasc: document.getElementById('dtnasc').value,
        tipopessoa: document.getElementById('cboPessoa').value,
        cpfcnpj: document.getElementById('cpfcnpj').value,
        rgie: document.getElementById('rgie').value,
        telcontato: document.getElementById('telcontato').value,
        telres: document.getElementById('telres').value,
        celular: document.getElementById('celular').value,
        email: document.getElementById('email').value,
        cep: document.getElementById('cep').value,
        endereco: document.getElementById('rua').value,
        numero: document.getElementById('numero').value,
        bairro: document.getElementById('bairro').value,
        cidade: document.getElementById('cidade').value,
        uf: document.getElementById('uf').value,
        complemento: document.getElementById('complemento').value
        };
                
        $.ajax({
            type: "POST",
            url: "arquivos/php/class/cadastro.php",
            data: dados,
            cache: false,
            dataType: "json",
            beforeSend: function(){
                //$('#dados').html("carregando...");
                //loaderSpinners(true, 1000);
            },
            success: function (response) {
                if (response.statuscode == 200) {
                    var msg = ($('#idcadastro').val() > 0 ? 'Registro alterado com sucesso!':'Registro cadastrado com sucesso!');
                    LimparCamposEnder();
                    //loaderSpinners(false, 5000);
                    atualizar();
                    Swal.fire('Cadastro', msg, 'success');                    
                }
            },
            error: function(response){           
                var erro = ($('#idcadastro').val() > 0 ? 'Erro ao tentar alterar o registro!':'Erro ao tentar cadastrar');
                if (response.statuscode == 201) {
                    Swal.fire('Cadastro', erro, 'error');
                }
            },
        });
}

function exibirRegistro(id){
    LimparCamposEnder();

    if (id < 1 || id == ''){
        return false;
    }

    var dados = {
        key: 'editar',
        id: id
    }

    var x = '';

    $.ajax({
        type: "POST",
        url: "arquivos/php/class/cadastro.php",
        data: dados,
        //dataType: "json",
        success: function (response) {
            var obj = JSON.parse(response);
            
            for(var i in obj){
              x = obj[i];

                $('#idcadastro').val(x.idcadastro);
                $('#nome').val(x.nome);
                $('#dtnasc').val(x.dtnasc);
                $('#cboPessoa').val(x.tipopessoa); 
                $('#cpfcnpj').val(x.cpfcnpj);

                mudarCpfCnpj(x.tipopessoa);

                $('#rgie').val(x.rgie);
                $('#telcontato').val(x.telcontato);
                $('#telres').val(x.telres);
                $('#celular').val(x.celular);
                $('#email').val(x.email);
                $('#cep').val(x.cep);
                $('#rua').val(x.endereco);
                $('#numero').val(x.numero);
                $('#bairro').val(x.bairro);
                $('#cidade').val(x.cidade);
                $('#uf').val(x.uf);
                $('#complemento').val(x.complemento);
                $('#cadastrar').html('Editar Registro');
            }
        },
        error: function(response){
            var obj = JSON.parse(response);

            console.log(response);

            for(var i in obj){
              x = obj[i];

              Swal.fire('Atenção','Erro ao tentar exibir o registro! \nMore informations: ' + response,'error');
            }
        }
    });
}

function atualizar(){
    var dados = {
        key: 'Refresh'
    }   

    $.ajax({
        type: "POST",
        url: "arquivos/php/class/cadastro.php",
        data: dados,
        //dataType: "json",
        beforeSend: function(){
            /* loaderSpinners(true, 1000); */
        },
        success: function (response) {
            document.getElementById('dados').innerHTML = "";
                
            var s = '';
            var a = '';
            const obj = JSON.parse(response);
            //console.log(response);
            
            for (var i in obj){
                x = obj[i];
                
                s += '<tr>';
                s += '<td style="text-align: center;" id="tdidcadastro">' + x.idcadastro + '</td>';
                s += '<td style="text-align: left;" id="tdnome">' + x.nome + '</td>';
                s += '<td style="text-align: left;" id="tdendereco">' + x.endereco + '</td>';
                s += '<td style="text-align: left;" id="tdcelular">' + x.celular + '</td>';  
                
                s += '<td><div class="btn-group btn-group-toggle" data-toggle="buttons">';
                s += '<button class="fa fa-pencil-square-o btn btn-warning active" type="submit" id="editar" data-toggle="modal" data-target="#exampleModal" data-id="' + x.idcadastro +'" onclick="return exibirRegistro(' + x.idcadastro + ')" name="editar"></button>';
                s += '<button class="fa fa-trash btn btn-danger" type="submit" id="excluir" onclick="return excluirRegistro(' + x.idcadastro + ')" name="excluir"></button>';
                s += '</div>';
                s += '</td></tr>';
            }
            
            document.getElementById('dados').innerHTML = s;
            loaderSpinners(false, 100000);
        },
        error: function(response){            
            console.log('Erro: ' + response);
        }
    });    
}

// Função excluir Registro
function excluirRegistro(id){
    // Exclui o registro do db
    if (id < 1 || id == ''){
        return false;
    }

    Swal.fire({
        title: 'EXCLUIR CADASTRO 🤔️',
        text: "Quer realmente excluir este registro?",
        icon: 'question',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        //cancelButtonTextColor: '#d33',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Deletar'
      }).then((result) => {
        if (result.isConfirmed) {

            var dados = {
                key: 'excluir',
                id: id
            }
            $.ajax({
                type: "POST",
                url: "arquivos/php/class/cadastro.php",
                data: dados,
                dataType: "json",
                success: function (response) {
                    if (response.statuscode == 200) {
                        atualizar();
                        Swal.fire('Cadastro','Registro deletado com sucesso','success');  
                    }
                },
                error: function(response){
                    if (response.statuscode == 201) {
                        Swal.fire('Cadastro','Não foi possivel excluir este registro','error');  
                    }
                }
            });
        }
      })
}

function loaderSpinners(carregou, timing){
    var campoID = '#'+'carregando';
    var b = new Boolean(carregou);

    $(campoID).hide();
    
    if(b == true){
        $(campoID).show();
        $(campoID).fadeIn('Slow');
        /* setTimeout(function(){
            
        },timing);  */
        
    } else {
        setTimeout(function(){
            $(campoID).fadeOut('Slow');
        },timing); 

        $(campoID).hide();
    }
}

function CopiaTextoLabel(idLabel){
    try {
        var texto = $(idLabel).html();

        document.addEventListener('copy', function(e){
            e.clipboardData.setData('text/plain', texto);
            e.preventDefault();
        }, true);
        
        /* var bCopiar = document.execCommand('copy'); */
        var bCopiar = navigator.clipboard.writeText(texto);
        
        if (bCopiar) {
            //Swal.fire({position: 'top-end', icon: 'success', title: 'Texto copiado para a área de transferência', showConfirmButton: false, timer: 2500});
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',           
                showConfirmButton: false, 
                timer: 2500,
                timerProgressBar: false,
                didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer),
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
              });
              
              Toast.fire({
                icon: 'success', 
                title: 'Texto copiado para a área de transferência'
              });
        } else {
            Swal.fire('Atenção','Este navegador não tem suporte para copiar' + e.message,'error');  
        }
    } catch (e) {
        Swal.fire('Atenção',e.message,'error');
    } 
}
//#endregion Funções