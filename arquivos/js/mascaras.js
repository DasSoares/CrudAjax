

function Mascaras(){
    
    $('#cep').inputmask({mask: ['#####-###',], keepStatic: true});
    $('#telres').inputmask({mask: '## ####-####', keepStatic: true});    
    $('#celular').inputmask({mask: '## # ####-####', keepStatic: true});
    //$('#tdcelular').inputmask({mask: '## # ####-####', keepStatic: true});
}