
<?php
    include('connect.php');

	$op=$_POST['op'];
    if($op=='op1'){
        $nome=$_POST['nomeCidadao'];
        $nomeMae=$_POST['nomeMae'];
        $data=$_POST['dataNascimento'];
        $uf=$_POST['ufNascimento'];
        //echo $nome." ".$nomeMae." ".$data." ".$uf."\n";

        $result=$mysqli->query("SELECT * FROM Cidadao WHERE nomeCidadao=\"".$nome."\" AND nomeMae=\"".$nomeMae."\" AND dataNascimento=\"".$data."\" AND codigoUF=\"".$uf."\"");
        if($result->num_rows>0) $cidadao=$result->fetch_row();
        else{
			echo "<script>alert('Cidadão não encontrado, redirecionando para cadastro...');</script>";
			echo "<form action=\"cadastro.php\" method=post name=\"completa\">
						<input type=\"hidden\" name=\"nomeCidadao\" value=\"".$nome."\">
						<input type=\"hidden\" name=\"nomeMae\" value=\"".$nomeMae."\">
						<input type=\"hidden\" name=\"dataNascimento\" value=\"".$data."\">
						<input type=\"hidden\" name=\"ufNascimento\" value=\"".$uf."\">
					</form>";
			echo "<script type=\"text/javascript\"> 
					window.onload=function(){
						document.forms['completa'].submit();
					}
					</script>";
			die();
        }

        
    }
    else{
        if($op=='op2'){
            $cpf=$_POST['cpf'];
            //echo $cpf." ";

            $result=$mysqli->query("SELECT * FROM Cidadao WHERE cpfCidadao=\"".$cpf."\"");
            if($result->num_rows>0) $cidadao=$result->fetch_row();
            else{
				echo "<script>alert('Cidadão não encontrado, redirecionando para cadastro...');window.location.href='cadastro.php';</script>";
                die();
            }
        }
    }
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
	</script>
</head>
<body style="padding-bottom: 50px;">  

<!--JavaScript at end of body for optimized loading-->

  <ul id="slide-out" class="sidenav">
  <div style="padding: 30px ">
  	<img width="100" src="logo.png">
      </div>
    <li><div class="divider"></div></li>
    <li><a class="waves-effect" href="index.php">Voltar ao início</a></li>
    <li><a class="waves-effect" href="#">Consulta<i class="material-icons right">location_on</i></a></li>
    <li><a class="waves-effect" href="listaCidadao.php">Listar Cidadãos</a></li>
  </ul>
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons" style="font-size: 50px; padding: 20px">menu</i></a>

<div style="width: 80%; margin: auto; " >
<h2>Dados do Cidadão</h2>

<form action="edita.php" method=post name="finaliza">
    <input type="hidden" name="cpf" value="<?php echo $cidadao[0] ?>">
    <input type="hidden" name="nomeCidadao" value="<?php echo $cidadao[1] ?>">
    <input type="hidden" name="nomeSocial" value="<?php echo $cidadao[2] ?>">
    <input type="hidden" name="nomeMae" value="<?php echo $cidadao[3] ?>">
    <input type="hidden" name="dataNascimento" value="<?php echo $cidadao[4] ?>">
    <input type="hidden" name="sexoNascimento" value="<?php echo $cidadao[5] ?>">
    <input type="hidden" name="genero" value="<?php echo $cidadao[6] ?>">
    <input type="hidden" name="ufNascimento" value="<?php echo $cidadao[7] ?>">
    <input type="hidden" name="racaCor" value="<?php echo $cidadao[8] ?>">
    <input type="hidden" name="estadoCivil" value="<?php echo $cidadao[9] ?>">
    <input type="hidden" name="escolaridade" value="<?php echo $cidadao[10] ?>">
    <input type="hidden" name="ocupacao" value="<?php echo $cidadao[11] ?>">
    <input type="hidden" name="vinculo" value="<?php echo $cidadao[12] ?>">
    <input type="hidden" name="rendaIndividual" value="<?php echo $cidadao[13] ?>">
    <input type="hidden" name="rendaFamiliar" value="<?php echo $cidadao[14] ?>">
    <input type="hidden" name="tipoBeneficio" value="<?php echo $cidadao[15] ?>">
    <input type="hidden" name="valorBeneficio" value="<?php echo $cidadao[16] ?>">
	<input type="hidden" name="cartaosus" value="<?php echo $cidadao[17] ?>">
	<button class="btn waves-effect waves-light" type="submit" name="action">Editar
 	</button>
        
</form>

<table dir="ltr" border="1" cellspacing="0" cellpadding="0"><colgroup><col width="184" /><col width="100" /><col width="100" /><col width="151" /><col width="100" /><col width="124" /></colgroup>
<tbody>
	<tr style="height: 20px;">
		<td style="height: 20px;" data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;CPF:&quot;}"><b>CPF:</b></td>
		<td style="height: 20px;" colspan="5" rowspan="1">
			<?php 
				$cpf=$cidadao[0];
				echo ''.$cpf[0].$cpf[1].$cpf[2].'.'.$cpf[3].$cpf[4].$cpf[5].'.'.$cpf[6].$cpf[7].$cpf[8].'-'.$cpf[9].$cpf[10];
			?>
		</td>
	</tr>
	<tr style="height: 20px;">
		<td style="height: 20px;" data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;Nome:&quot;}"><b>Nome:</b></td>
		<td style="height: 20px;" colspan="5" rowspan="1"><?php echo $cidadao[1] ?></td>
	</tr>
	<tr style="height: 20px;">
		<td style="height: 20px;" data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;Nome Social:&quot;}"><b>Nome Social:</b></td>
		<td style="height: 20px;" colspan="5" rowspan="1"><?php echo $cidadao[2] ?></td>
	</tr>
	<tr style="height: 20px;">
		<td style="height: 20px;" data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;Nome da m&atilde;e:&quot;}"><b>Nome da m&atilde;e:</b></td>
		<td style="height: 20px;" colspan="5" rowspan="1"><?php echo $cidadao[3] ?></td>
	</tr>
	<tr style="height: 20px;">
		<td style="height: 20px;" data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;Data de nascimento:&quot;}"><b>Data de nascimento:</b></td>
		<td style="height: 20px;" colspan="2" rowspan="1"><?php echo $cidadao[4];?></td>
		<td style="height: 20px;" data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;Idade:&quot;}"><b>Idade:</b></td>
		<td style="height: 20px;" colspan="2" rowspan="1"><?php $data=$cidadao[4]; $data=explode("/", $data); $idade=2018-$data[2]; echo $idade; ?></td>
	</tr>
	<tr style="height: 20px;">
		<td style="height: 20px;" data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;Sexo de Nascimento:&quot;}"><b>Sexo de Nascimento:</b></td>
		<td style="height: 20px;" colspan="2" rowspan="1"><?php echo $cidadao[5] ?></td>
		<td style="height: 20px;" data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;G&ecirc;nero Declarado:&quot;}"><b>G&ecirc;nero Declarado:</b></td>
		<td style="height: 20px;" colspan="2" rowspan="1"><?php echo $cidadao[6] ?></td>
	</tr>
	<tr style="height: 20px;">
		<td style="height: 20px;" data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;UF de Nascimento:&quot;}"><b>UF de Nascimento:</b></td>
		<td style="height: 20px;"><?php echo $cidadao[7] ?></td>
		<td style="height: 20px;" data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;Ra&ccedil;a/cor:&quot;}"><b>Ra&ccedil;a/cor:</b></td>
		<td style="height: 20px;"><?php $query=$mysqli->query("SELECT descricaoRacaCor FROM `Raca_Cor` WHERE codigoRacaCor= ".$cidadao[8]);
        echo $query->fetch_row()[0];?></td>
		<td style="height: 20px;" data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;Estado Civil:&quot;}"><b>Estado Civil:</b></td>
		<td style="height: 20px;"><?php $query=$mysqli->query("SELECT descricaoEstadoCivil FROM `Estado_Civil` WHERE codigoEstadoCivil= ".$cidadao[9]);
        echo $query->fetch_row()[0];?></td>
	</tr>
	<tr style="height: 20px;">
		<td style="height: 20px;" data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;Escolaridade:&quot;}"><b>Escolaridade:</b></td>
		<td style="height: 20px;" colspan="5" rowspan="1"><?php $query=$mysqli->query("SELECT descricaoEscolaridade FROM `Escolaridade` WHERE codigoEscolaridade= ".$cidadao[10]);
        echo $query->fetch_row()[0];?></td>
	</tr>
	<tr style="height: 20px;">
		<td style="height: 20px;" data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;Ocupa&ccedil;&atilde;o:&quot;}"><b>Ocupa&ccedil;&atilde;o:</b></td>
		<td style="height: 20px;" colspan="5" rowspan="1"><?php $query=$mysqli->query("SELECT descricaoOcupacao FROM `Ocupacao` WHERE codigoOcupacao= ".$cidadao[11]);
        echo $query->fetch_row()[0];?></td>
	</tr>
	<tr style="height: 20px;">
		<td style="height: 20px;" data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;Vinculo Empregat&iacute;cio:&quot;}"><b>Vinculo Empregat&iacute;cio:</b></td>
		<td style="height: 20px;" colspan="5" rowspan="1"><?php $query=$mysqli->query("SELECT descricaoVinculo FROM `Vinculo` WHERE codigoVinculo= ".$cidadao[12]);
        echo $query->fetch_row()[0];?></td>
	</tr>
	<tr style="height: 20.8px;">
		<td style="height: 20.8px;" data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;Renda Individual:&quot;}"><b>Renda Individual:</b></td>
		<td style="height: 20.8px;" colspan="2" rowspan="1"><?php echo "R$ ".$cidadao[13] ?></td>
		<td style="height: 20.8px;" data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;Renda Familiar:&quot;}"><b>Renda Familiar:</b></td>
		<td style="height: 20.8px;" colspan="2" rowspan="1"><?php echo "R$ ".$cidadao[14] ?></td>
	</tr>
	<tr style="height: 20px;">
		<td style="height: 20px;" data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;Benef&iacute;cio:&quot;}"><b>Benef&iacute;cio:</b></td>
		<td style="height: 20px;" data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;Qual:&quot;}"><b>Qual:</b></td>
		<td style="height: 20px;" colspan="4" rowspan="1"><?php if($cidadao[15]!=NULL) echo $cidadao[15] ?></td>
	</tr>
	<tr style="height: 20px;">
		<td style="height: 20px;">&nbsp;</td>
		<td style="height: 20px;" data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;Valor:&quot;}"><b>Valor:</b></td>
		<td style="height: 20px;" colspan="4" rowspan="1"><?php if($cidadao[15]!=NULL) echo "R$ ".$cidadao[16] ?></td>
	</tr>
	<tr style="height: 20px;">
		<td style="height: 20px;" data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;Cart&atilde;o Nacional do SUS:&quot;}"><b>Cart&atilde;o Nacional do SUS:</b></td>
		<td style="height: 20px;" colspan="5" rowspan="1"><?php echo $cidadao[17] ?></td>
	</tr>
</tbody>
</table>
</div>



<?php mysqli_close($mysqli); ?>
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>