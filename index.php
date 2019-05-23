<?php include('connect.php') ?>
<!DOCTYPE HTML>  
<html>
<head>
    <title>Consulta de Cidadão</title>
    <meta charset="UTF-8">
    <script type="text/javascript" src="script.js"></script> 
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <script type = "text/javascript"
    src = "https://code.jquery.com/jquery-2.1.1.min.js"></script> 
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script type="text/javascript">
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
<body  style="padding-bottom: 50px;">  

  <ul id="slide-out" class="sidenav">
  <div style="padding: 30px ">
      <img width="100" src="logo.png">
      </div>
    <li><div class="divider"></div></li>
    <li><a class="waves-effect" href="#">Início<i class="material-icons right">location_on</i></a></li>
    <li><a class="waves-effect" href="listaCidadao.php">Listar Cidadãos</a></li>
  </ul>
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons" style="font-size: 50px; padding: 20px">menu</i></a>

<div style="width: 80%; margin: auto; " >
<h2>Consulta de Cidadão</h2>
<form method="post" name="formulario" action="consulta.php">
  <label><input class="with-gap" id="op1" type="radio" value="op1" name="op" onclick="disableIndex()" checked><span>Por Nome</span></label>
  <br><br>
  <label for="nomeCidadao">Nome do Cidadão:</label><br> <input type="text" name="nomeCidadao" id="nomecidadao" required>
  <br><br>
  <label for="nomeMae">Nome da Mãe:</label><br> <input type="text" name="nomeMae" id="nomeMae" required>
  <br><br>
  <label for="dataNascimento">Data de Nascimento:</label><br>  <input type="text" placeholder="dd/mm/aaaa" name="dataNascimento" format='dd mmm yyyy' class="datepicker" required>
  <br><br>
  <label for="ufNascimento">UF Nascimento:</label><br>
  <select name="ufNascimento" id="ufNascimento" required>
    <option value=""></option>
    <?php
        while($est=$consultaEstados->fetch_row()){
            echo "<option value=\"".$est[0]."\">".$est[0]."</option>";
        }
        mysqli_close($mysqli);
    ?>
</select>
  <br><br><br>
  <label><input class="with-gap" id="op2" type="radio" value="op2" name="op" onclick="disableIndex()"><span>Por CPF</span></label>
  <br><br>
  <label for="cpf">CPF do Cidadão:</label><br> <input type="text" placeholder="Somente dígitos" pattern="[0-9]{11}" name="cpf" id="cpfCidadao" disabled=true required>
  <br><br>
  <button class="btn waves-effect waves-light" type="submit" name="consultar"> Consultar
  <i class="material-icons right">send</i>
  </button>
</form>
</div>

<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>