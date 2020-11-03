/* Não habilite isso porque o SweetAlert2 para de funcionar */
/* const { default: Swal } = require("sweetalert2"); */ 

function LimparCamposEnder(){
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
}

window.onload = function(){
/* 
Esta função abaixo, ele é ótimo somente com o google chrome, porque nos outros navegadores
ele mostra uma caixa de mensagem e aparece um checkbox para impedir dele ficar exibindo
*/

var cadastrar = document.getElementById('cadastrar');


};   

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

function valida_form(){    
    var bPodecadastrar = true;

    if (document.getElementById('nome').value.length < 1) 
    {
        document.getElementById('nome').focus();
        Swal.fire('Atenção','O campo nome não pode ficar vázio!', 'warning');
        bPodecadastrar = false;
        return false;
    }
    else if(document.getElementById('cboPessoa').value < 1)
    {
        document.getElementById('cboPessoa').focus();
        Swal.fire('Atenção','Por favor, selecione o tipo pessoa!','warning');
        bPodecadastrar = false;
        return false;
    }
    else if(document.getElementById('cep').value.length < 1)
    {
        var msg = 'Por favor, insira o cep!';
        document.getElementById('cep').focus();
        Swal.fire('Atenção',msg, 'info');
        bPodecadastrar = false;
        return false;
    }

    /* if(!bPodecadastrar){
        return false;
    } */
    
    if (bPodecadastrar){
        NovoRegistro();        
    }

}

function NovoRegistro(){
    var dados = {
        'nome': document.getElementById('nome').value,
        'dtnasc': document.getElementById('dtnasc').value,
        'tipopessoa': document.getElementById('cboPessoa').value,
        'cpfcnpj': document.getElementById('cpfcnpj').value,
        'rgie': document.getElementById('rgie').value,
        'telcontato': document.getElementById('telcontato').value,
        'telres': document.getElementById('telres').value,
        'celular': document.getElementById('celular').value,
        'email': document.getElementById('email').value,
        'cep': document.getElementById('cep').value,
        'endereco': document.getElementById('rua').value,
        'numero': document.getElementById('numero').value,
        'bairro': document.getElementById('bairro').value,
        'cidade': document.getElementById('cidade').value,
        'uf': document.getElementById('uf').value,
        'complemento': document.getElementById('complemento').value
        };
        
        $.ajax({
            url: 'cadastro.php',
            method: 'POST',
            dataType: 'json',
            data: dados,
            key: document.getElementById('cadastrar'),
            beforeSend: function(){
                /* exibe msg carregando antes de gravar */
                $('#alertmsg').HTMLElement("carregando...");
            },
            success: function(response){
                alert(response);
                /* Swal.fire('Cadastro',msg,status); */
            },
            error: function(response){
                alert(response);
                /* Swal.fire('Cadastro',msg,status); */
            }
        });
}