$(document).ready(function () {
    // Método para pular campos teclando ENTER
    $('.pula').on('keypress', function(e){
        var tecla = (e.keyCode?e.keyCode:e.which);

        if(tecla == 13){
            campo = $('.pula');
            indice = campo.index(this);

            if(campo[indice+1] != null){
                proximo = campo[indice + 1];
                proximo.focus();
                e.preventDefault(e);
            }

        }
    });    

     // Método para consultar o CEP
     $('#cep').on('blur', function(){        
        //Limpamos os campos quando mudar o CEP
        document.getElementById('rua').value = "";
        document.getElementById('numero').value = "";
        document.getElementById('bairro').value = "";
        document.getElementById('cidade').value = "";
        document.getElementById('uf').value = "";
        document.getElementById('complemento').value = "";
        
        if($.trim($("#cep").val()) != ""){
            
            $('#mensagem').addClass('alert alert-primary');            
            $('#mensagem').fadeIn().html('Aguarde, consultando CEP ...');

            $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val(), function()
            {
                if(resultadoCEP["resultado"] == '1')
                {
                    $('#mensagem').removeClass('alert alert-danger'); /* Removemos a classe anterior  */
                    $('#mensagem').addClass('alert alert-primary'); /* Depois adicionamos a nova classe */       
                    $("#rua").val(unescape(resultadoCEP["tipo_logradouro"])+" "+unescape(resultadoCEP["logradouro"]));
                    $("#bairro").val(unescape(resultadoCEP["bairro"]));
                    $("#cidade").val(unescape(resultadoCEP["cidade"]));
                    $("#uf").val(unescape(resultadoCEP["uf"]));
                    $('#numero').focus();
                } 
                else if (resultadoCEP["resultado"] == '0') 
                {
                    $('#mensagem').removeClass('alert alert-primary');  /* Removemos a classe anterior  */
                    $('#mensagem').addClass('alert alert-danger'); /* Depois adicionamos a nova classe */
                    $("#mensagem").html('O endereço do CEP não foi encontrado');
                }                

                if(resultadoCEP['resultado'] == '1')
                {
                    setTimeout(function(){
                        $('#mensagem').fadeOut('Slow');
                    },100);                    
                } 
                else if (resultadoCEP['resultado'] == '0') 
                {
                    setTimeout(function(){
                        $('#mensagem').fadeOut('Slow');
                    },5000); 
                }
            });

            /* $('#mensagem').addClass('alert alert-primary'); */
        }			
    });
});	