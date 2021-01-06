
function Mascarras (){

    $("#cep").inputmask({mask: ["#####-###",],keepStatic: true});
    $("#telres").inputmask({mask: '## ####-####',keepStatic: true});    
    $("#celular").inputmask({mask: '## # ####-####',keepStatic: true});
};