<?php include('connect.php') ?>
<?php
  if (!isset($_POST['nomeCidadao']))
  {
    echo "<script>alert('Dados imcompletos, volte à consulta...');</script>";
    echo '<script type="text/javascript">
           window.location = "index.php"
      </script>';
    die();
  }
  else{
    $nome=$_POST['nomeCidadao'];
    $nomeMae=$_POST['nomeMae'];
    $data=$_POST['dataNascimento'];
    $uf=$_POST['ufNascimento'];
  }
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
    <li><a class="waves-effect" href="#">Cadastro<i class="material-icons right">location_on</i></a></li>
    <li><a class="waves-effect" href="listaCidadao.php">Listar Cidadãos</a></li>
  </ul>
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons" style="font-size: 50px; padding: 20px">menu</i></a>

<div class="row" style="width: 80%; margin: auto; " >
<h2>Cadastro de Cidadão</h2>
<form method="post" name="cadastro" class="col s12" action="finalizaCadastro.php">
  <label for="nomeCidadao">Nome do Cidadão:</label><br> <input type="text" name="nomeCidadao" <?php if($nome) echo "value=\"".$nome."\"" ?> >

  <br><br>
  <label for="nomeSocial">Nome Social:</label><br> <input type="text" name="nomeSocial">
  <br><br>
  <label for="nomeMae">Nome da Mãe:</label><br> <input type="text" name="nomeMae" <?php if($nomeMae) echo "value=\"".$nomeMae."\"" ?> >
  <br><br>
  <div class="row">
    <div class="input-field col s6">
      <label for="dataNascimento">Data de Nascimento:</label><br>  <input type="text" placeholder="dd/mm/aaaa" name="dataNascimento" <?php if($nomeMae) echo "value=\"".$data."\"" ?> format='dd mmm yyyy' class="datepicker" >
    </div>
    <div class="input-field col s6">
      <label for="sexoNascimento">Sexo Nascimento:</label><br> <select name="sexoNascimento" required><option value=""></option><option value="Masculino">Masculino</option><option value="Feminino">Feminino</option></select>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s6">
    <label for="genero">Genero Declarado:</label><br>  <input type="text" name="genero">
    </div>
    <div class="input-field col s6">
      <label for="ufNascimento">UF Nascimento:</label><br> <select name="ufNascimento" id="" >
      <option> </option>
      <?php
              while($est=$consultaEstados->fetch_row()){
                  if($est[0]==$uf)
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
                echo "<option value=\"".$est[0]."\">".$est[1]."</option>";
            }
    ?>
  </select>
  <br><br>
  <label for="ocupacao">Ocupação:</label><br> <select name="ocupacao" id="" required>
  <option value=""></option>
    <?php
            while($est=$consultaOcupacao->fetch_row()){
                echo "<option value=\"".$est[0]."\">".$est[1]."</option>";
            }
    ?>
  </select>
  <br><br>
  <label for="vinculo">Vínculo Empregatício:</label><br> <select name="vinculo" id="" required>
  <option value=""></option>
    <?php
            while($est=$consultaVinculo->fetch_row()){
                echo "<option value=\"".$est[0]."\">".$est[1]."</option>";
            }
    ?>
  </select>
  <br><br>
  <div class="row">
    <div class="input-field col s6">
    <label for="rendaIndividual">Renda Individual:</label><br> <input type="number" step="0.01" name="rendaIndividual"  required>
    </div>
    <div class="input-field col s6">
    <label for="rendaFamiliar">Renda Familiar:</label><br> <input type="number" step="0.01" name="rendaFamiliar"  required>
    </div>
  </div>
  <label for="op">Recebe algum benefício de transferência de renda governamental?</label>
  <br><br>
  <label><input class="with-gap" id="sim" type="radio" name="op" onclick="disableCadastro()"><span>Sim</span></label>
  <label><input class="with-gap" id="nao" type="radio" name="op" onclick="disableCadastro()" checked><span>Não</span></label>
  <br><br>
  <div class="row">
    <div class="input-field col s6">
      <label for="tipoBeneficio">Se sim, qual?:</label><br> <input type="text" name="tipoBeneficio" id="tipoBeneficio" disabled=true >
    </div>
    <div class="input-field col s6">
      <label for="valorBeneficio">Valor Beneficio:</label><br> <input type="number" step="0.01" name="valorBeneficio" id="valorBeneficio" disabled=true >
    </div>
  </div>
  <label for="cartao">Cartão do SUS:</label><br> <input type="number" name="cartaosus" id="cartaosus" required>
  <br><br>
  <button class="btn waves-effect waves-light" type="submit" name="cadastrar"> Cadastrar
  <i class="material-icons right">send</i>
  </button>
</form>
</div>
 <!--JavaScript at end of body for optimized loading-->
 <script type="text/javascript" src="js/materialize.min.js"></script>
 <?php mysqli_close($mysqli); ?>
</body>
</html>