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

     // Insere máscaras
     /* Funciona tranquilo */
    $("#cep").inputmask({mask: ["#####-###",],keepStatic: true});
    $("#telres").inputmask({mask: '## ####-####',keepStatic: true});    
    $("#celular").inputmask({mask: '## # ####-####',keepStatic: true});

     // Método para consultar o CEP
    $('#cep').on('blur', function(){

        if($.trim($("#cep").val()) != ""){

            $("#mensagem").html('(Aguarde, consultando CEP ...)');
            $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val(), function(){

                  if(resultadoCEP["resultado"]){
                    $("#rua").val(unescape(resultadoCEP["tipo_logradouro"])+" "+unescape(resultadoCEP["logradouro"]));
                    $("#bairro").val(unescape(resultadoCEP["bairro"]));
                    $("#cidade").val(unescape(resultadoCEP["cidade"]));
                    $("#uf").val(unescape(resultadoCEP["uf"]));
                }

                $("#mensagem").html('');
            });				
        }			
    });
});	