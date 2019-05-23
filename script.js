function disableIndex(){
    if(document.getElementById("op1").checked){
      document.formulario.cpfCidadao.disabled=true;
      document.formulario.nomecidadao.disabled=false;
      document.formulario.nomeMae.disabled=false;
      document.formulario.dataNascimento.disabled=false;
      document.formulario.ufNascimento.disabled=false;
    }else{
      document.formulario.cpfCidadao.disabled=false;
      document.formulario.nomecidadao.disabled=true;
      document.formulario.nomeMae.disabled=true;
      document.formulario.dataNascimento.disabled=true;
      document.formulario.ufNascimento.disabled=true;
    }
  }

function disableCadastro(){
  if(document.getElementById("sim").checked){
    document.cadastro.valorBeneficio.disabled=false;
    document.cadastro.tipoBeneficio.disabled=false;
  }else{
    document.cadastro.valorBeneficio.disabled=true;
    document.cadastro.tipoBeneficio.disabled=true;
  }
}

function gera_random(n) {
  var ranNum = Math.round(Math.random()*n);
  return ranNum;
}

function mod(dividendo,divisor) {
return Math.round(dividendo - (Math.floor(dividendo/divisor)*divisor));
}