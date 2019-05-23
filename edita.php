<?php
  include('connect.php');
  $cpf=$_POST['cpf'];
  $nomeCidadao=$_POST['nomeCidadao'];
  $nomeCidadaoTemp=$_POST['nomeCidadao'];
  $nomeSocial=$_POST['nomeSocial'];
  $nomeMae=$_POST['nomeMae'];
  $nomeMaeTemp=$_POST['nomeMae'];
  $dataNascimento=$_POST['dataNascimento'];
  $dataNascimentoTemp=$_POST['dataNascimento'];
  $sexoNascimento=$_POST['sexoNascimento'];
  $genero=$_POST['genero'];
  $ufNascimento=$_POST['ufNascimento'];
  $ufNascimentoTemp=$_POST['ufNascimento'];
  $racaCor=$_POST['racaCor'];
  $estadoCivil=$_POST['estadoCivil'];
  $escolaridade=$_POST['escolaridade'];
  $ocupacao=$_POST['ocupacao'];
  $vinculo=$_POST['vinculo'];
  $rendaIndividual=$_POST['rendaIndividual'];
  $rendaFamiliar=$_POST['rendaFamiliar'];
  $tipoBeneficio=$_POST['tipoBeneficio'];
  $valorBeneficio=$_POST['valorBeneficio'];
  $cartaosus=$_POST['cartaosus'];
?>
<!DOCTYPE HTML>  
<html>
<head>
<title>Cadastro de Cidadão</title>
  <meta charset="UTF-8">
  <script type="text/javascript" src="script.js"></script> 
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <script type = "text/javascript"
    src = "https://code.jquery.com/jquery-2.1.1.min.js"></script> 
  <script>
    $(document).ready(function(){
      $('select').formSelect();
    });

    var datepicker_pt_br = {
      today: 'Hoje', clear: 'Limpar', done: 'Ok', nextMonth: 'Próximo mês', previousMonth: 'Mês anterior', weekdaysAbbrev: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'], weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'], weekdays: ['Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sábado'], monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'], months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro']
    }
    var options = {
        container: 'body',
        format: 'dd/mm/yyyy',
        showDaysInNextAndPreviousMonths: true,
        i18n: datepicker_pt_br,
      //outras configurações
    }

    $(document).ready(function(){
      $('.datepicker').datepicker(options);
      
    });
    $(document).ready(function(){
            $('.sidenav').sidenav();
        });
  </script>
</head>
<body style="padding-bottom: 50px;">  

  <ul id="slide-out" class="sidenav">
    <div style="padding: 30px ">
      <img width="100" src="logo.png">
      </div>
    <li><div class="divider"></div></li>
    <li><a class="waves-effect" href="index.php">Voltar ao início</a></li>
    <li><a class="waves-effect" href="#">Editar<i class="material-icons right">location_on</i></a></li>
    <li><a class="waves-effect" href="listaCidadao.php">Listar Cidadãos</a></li>
  </ul>
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons" style="font-size: 50px; padding: 20px">menu</i></a>

<div class="row" style="width: 80%; margin: auto; " >
<h2>Editar Cidadão</h2>
<form method="post" name="cadastro" class="col s12" action="finalizaEdicao.php">

  <label for="cpf">Nome do Cidadão:</label><br> <input type="text" name="cpf" value="<?php 
				echo ''.$cpf[0].$cpf[1].$cpf[2].'.'.$cpf[3].$cpf[4].$cpf[5].'.'.$cpf[6].$cpf[7].$cpf[8].'-'.$cpf[9].$cpf[10];
			?>" disabled>
  <br><br>
  <label for="nomeCidadao">Nome do Cidadão:</label><br> <input type="text" name="nomeCidadao" <?php if($nomeCidadao) echo "value=\"".$nomeCidadao."\"" ?> required>
  <br><br>
  <label for="nomeSocial">Nome Social:</label><br> <input type="text" name="nomeSocial" <?php if($nomeSocial) echo "value=\"".$nomeSocial."\"" ?>>
  <br><br>
  <label for="nomeMae">Nome da Mãe:</label><br> <input type="text" name="nomeMae" <?php if($nomeMae) echo "value=\"".$nomeMae."\"" ?> required>
  <br><br>
  <div class="row">
    <div class="input-field col s6">
      <label for="dataNascimento">Data de Nascimento:</label><br>  <input type="text" placeholder="dd/mm/aaaa" name="dataNascimento" <?php if($dataNascimento) echo "value=\"".$dataNascimento."\"" ?> format='dd mmm yyyy' class="datepicker" required>
    </div>
    <div class="input-field col s6">
      <label for="sexoNascimento">Sexo Nascimento:</label><br>
      <select name="sexoNascimento" required>
        <?php
          if($sexoNascimento=="Masculino"){
            echo "<option selected value=\"Masculino\">Masculino</option>
                  <option value=\"Feminino\">Feminino</option>";
          }else{
            echo "<option value=\"Masculino\">Masculino</option>
                  <option selected value=\"Feminino\">Feminino</option>";
          }
        ?>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s6">
    <label for="genero">Genero Declarado:</label><br>  <input type="text" <?php if($genero) echo "value=\"".$genero."\"" ?> name="genero">
    </div>
    <div class="input-field col s6">
      <label for="ufNascimento">UF Nascimento:</label><br> <select name="ufNascimento" id="ufNascimento" required>
      <option> </option>
      <?php
              while($est=$consultaEstados->fetch_row()){
                  if($est[0]==$ufNascimento)
                    echo "<option selected value=\"".$est[0]."\">".$est[0]."</option>";
                  else
                    echo "<option value=\"".$est[0]."\">".$est[0]."</option>";
              }
      ?>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s6">
      <label for="racaCor">Raça/Cor:</label><br> <select name="racaCor" id="" required>
      <option value=""></option>
        <?php
                while($est=$consultaRacaCor->fetch_row()){
                  if($racaCor==$est[0])
                    echo "<option selected value=\"".$est[0]."\">".$est[1]."</option>";
                  else
                    echo "<option value=\"".$est[0]."\">".$est[1]."</option>";
                }
        ?>
      </select>
    </div>
    <div class="input-field col s6">
      <label for="estadoCivil">Estado Civil:</label><br> <select name="estadoCivil" id="" required>
      <option value=""></option>
        <?php
                while($est=$consultaEstadoCivil->fetch_row()){
                  if($estadoCivil==$est[0])
                    echo "<option selected value=\"".$est[0]."\">".$est[1]."</option>";
                  else
                    echo "<option value=\"".$est[0]."\">".$est[1]."</option>";
                }
        ?>
      </select>
    </div>
  </div>
  <br><br>
  <label for="escolaridade">Escolaridade:</label><br> <select name="escolaridade" id="" required>
  <option value=""></option>
    <?php
            while($est=$consultaEscolaridade->fetch_row()){
              if($escolaridade==$est[0])
                echo "<option selected value=\"".$est[0]."\">".$est[1]."</option>";
              else
                echo "<option value=\"".$est[0]."\">".$est[1]."</option>";
            }
    ?>
  </select>
  <br><br>
  <label for="ocupacao">Ocupação:</label><br> <select name="ocupacao" id="" required>
  <option value=""></option>
    <?php
            while($est=$consultaOcupacao->fetch_row()){
              if($ocupacao==$est[0])
                echo "<option selected value=\"".$est[0]."\">".$est[1]."</option>";
              else
                echo "<option value=\"".$est[0]."\">".$est[1]."</option>";
            }
    ?>
  </select>
  <br><br>
  <label for="vinculo">Vínculo Empregatício:</label><br> <select name="vinculo" id="" required>
  <option value=""></option>
    <?php
            while($est=$consultaVinculo->fetch_row()){
              if($vinculo==$est[0])
                echo "<option selected value=\"".$est[0]."\">".$est[1]."</option>";
              else
                echo "<option value=\"".$est[0]."\">".$est[1]."</option>";
            }
    ?>
  </select>
  <br><br>
  <div class="row">
    <div class="input-field col s6">
    <label for="rendaIndividual">Renda Individual:</label><br> <input type="number" <?php if($rendaIndividual) echo "value=\"".$rendaIndividual."\"" ?> step="0.01" name="rendaIndividual"  required>
    </div>
    <div class="input-field col s6">
    <label for="rendaFamiliar">Renda Familiar:</label><br> <input type="number" step="0.01" <?php if($rendaFamiliar) echo "value=\"".$rendaFamiliar."\"" ?> name="rendaFamiliar"  required>
    </div>
  </div>
  <label for="op">Recebe algum benefício de transferência de renda governamental?</label>
  <br><br>
  <?php
    if($valorBeneficio>0){
      echo "<label><input class=\"with-gap\" id=\"sim\" type=\"radio\" name=\"op\" onclick=\"disableCadastro()\" checked><span>Sim</span></label>
      <label><input class=\"with-gap\" id=\"nao\" type=\"radio\" name=\"op\" onclick=\"disableCadastro()\"><span>Não</span></label>";
    }
    else{
      echo "<label><input class=\"with-gap\" id=\"sim\" type=\"radio\" name=\"op\" onclick=\"disableCadastro()\"><span>Sim</span></label>
      <label><input class=\"with-gap\" id=\"nao\" type=\"radio\" name=\"op\" onclick=\"disableCadastro()\" checked><span>Não</span></label>";
    }
  ?>
  <br><br>
  <div class="row">
    <div class="input-field col s6">
      <label for="tipoBeneficio">Se sim, qual?:</label><br> <input type="text" <?php if($tipoBeneficio) echo "value=\"".$tipoBeneficio."\"" ?> name="tipoBeneficio" id="tipoBeneficio" disabled=true >
    </div>
    <div class="input-field col s6">
      <label for="valorBeneficio">Valor Beneficio:</label><br> <input type="number" <?php if($valorBeneficio>0) echo "value=\"".$valorBeneficio."\"" ?> step="0.01" name="valorBeneficio" id="valorBeneficio" disabled=true >
    </div>
  </div>
  <script>
    disableCadastro();
  </script>
  <label for="cartao">Cartão do SUS:</label><br> <input type="number" <?php if($cartaosus) echo "value=\"".$cartaosus."\"" ?> name="cartaosus" id="cartaosus" required>
  <br><br>

  <input type="hidden" name="cpf" value="<?php echo $cpf ?>" >
  <input type="hidden" name="nomeCidadaoTemp" value="<?php echo $nomeCidadaoTemp ?>" >
  <input type="hidden" name="nomeMaeTemp" value="<?php echo $nomeMaeTemp ?>" >
  <input type="hidden" name="dataNascimentoTemp" value="<?php echo $dataNascimentoTemp ?>" >
  <input type="hidden" name="ufNascimentoTemp" value="<?php echo $ufNascimentoTemp ?>" >


  <button class="btn waves-effect waves-light" type="submit" name="editar"> Editar
  <i class="material-icons right">send</i>
  </button>
</form>
</div>
 <!--JavaScript at end of body for optimized loading-->
 <script type="text/javascript" src="js/materialize.min.js"></script>
 <?php mysqli_close($mysqli); ?>
</body>
</html>