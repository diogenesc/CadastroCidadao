
<?php
    include('connect.php');

	$lista=$mysqli->query("SELECT * FROM Cidadao");
?>
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
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<script type = "text/javascript"
    src = "https://code.jquery.com/jquery-2.1.1.min.js"></script> 
	<script type="text/javascript">
		$(document).ready(function(){
			$('select').formSelect();
		});
		
		$(document).ready(function(){
            $('.sidenav').sidenav();
        });
    
    function exibe(cpf){
        var str="<form action='consulta.php' method=post name='exibe'><input type='hidden' name='cpf' value=";
        str=str.concat(cpf);
        str=str.concat("><input type=\"hidden\" name=\"op\" value=\"op2\"></form>");
        document.getElementById("exibe").innerHTML =str;
        document.forms['exibe'].submit();
    }

	</script>
</head>
<body style="padding-bottom: 50px;">  

<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="js/materialize.min.js"></script>
  <ul id="slide-out" class="sidenav">
  <div style="padding: 30px ">
  	<img width="100" src="logo.png">
      </div>
    <li><div class="divider"></div></li>
    <li><a class="waves-effect" href="index.php">Voltar ao início</a></li>
    <li><a class="waves-effect" href="listaCidadao.php"><i class="material-icons right">location_on</i>Listar Cidadãos</a></li>
  </ul>
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons" style="font-size: 50px; padding: 20px">menu</i></a>

<div style="width: 80%; margin: auto; " >
<h2>Lista de Cidadãos   </h2>

<table>
        <thead>
          <tr>
              <th>CPF</th>
              <th>Nome</th>
              <th>Ação</th>
          </tr>
        </thead>

        <tbody>
            <?php
                if($lista->num_rows>0){
                    while($linha=$lista->fetch_row()){
                        $cpf=$linha[0];
                        echo " <tr>
                            <td>".$cpf[0].$cpf[1].$cpf[2].'.'.$cpf[3].$cpf[4].$cpf[5].'.'.$cpf[6].$cpf[7].$cpf[8].'-'.$cpf[9].$cpf[10]."</td>
                            <td>".$linha[1]."</td>
                            <td><button class=\"btn waves-effect waves-light\" onclick=\"exibe(".$cpf.")\" name=\"consultar\">Consultar
                            <i class=\"material-icons right\">send</i></td>
                        </tr>";
                    }
                }
            ?>
        </tbody>
      </table>
            

</div>

<p id="exibe"></p>


<?php mysqli_close($mysqli); ?>

</body>
</html>