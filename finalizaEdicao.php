<?php
    include('connect.php');
    $nome=$_POST['nomeCidadao'];
    $nomeMae=$_POST['nomeMae'];
    $data=$_POST['dataNascimento'];
    $uf=$_POST['ufNascimento'];
    $cpf=$_POST['cpf'];
    $nomeCidadaoTemp=$_POST['nomeCidadaoTemp'];
    $nomeMaeTemp=$_POST['nomeMaeTemp'];
    $dataNascimentoTemp=$_POST['dataNascimentoTemp'];
    $ufNascimentoTemp=$_POST['ufNascimentoTemp'];
    $flag=0;
    
    if($nomeCidadaoTemp==$nome and $nomeMaeTemp==$nomeMae and $dataNascimentoTemp==$data and $ufNascimentoTemp==$uf){
        $flag=1;
    }

    //echo $nome." ".$nomeMae." ".$data." ".$uf."\n";

    $result=$mysqli->query("SELECT * FROM Cidadao WHERE nomeCidadao=\"".$nome."\" AND nomeMae=\"".$nomeMae."\" AND dataNascimento=\"".$data."\" AND codigoUF=\"".$uf."\"");
    if($result->num_rows>0 and $flag==0) echo "<script>alert('Dados já existentes, por favor altere...');window.onload=function(){
        document.forms['exibe'].submit();
        }
    </script>";
    else{
        $nomeSocial=$_POST['nomeSocial'];
        $genero=$_POST['genero'];
        $ufNascimento=$_POST['ufNascimento'];
        $sexoNascimento=$_POST['sexoNascimento'];
        $racaCor=$_POST['racaCor'];
        $estadoCivil=$_POST['estadoCivil'];
        $escolaridade=$_POST['escolaridade'];
        $ocupacao=$_POST['ocupacao'];
        $vinculo=$_POST['vinculo'];
        $rendaIndividual=$_POST['rendaIndividual'];
        $rendaFamiliar=$_POST['rendaFamiliar'];
        if (isset($_POST["tipoBeneficio"])) {
            $tipoBeneficio=$_POST['tipoBeneficio'];   
        }else{  
            $tipoBeneficio="";
        }
        if (isset($_POST["valorBeneficio"])) {
            $valorBeneficio=$_POST['valorBeneficio'];   
        }else{  
            $valorBeneficio=0;
        }
        $cartaosus=$_POST['cartaosus'];
        $result=$mysqli->query("UPDATE `Cidadao` SET nomeCidadao = '".$nome."',
         nomeSocial = '".$nomeSocial."', nomeMae = '".$nomeMae."', dataNascimento = '".$data."', sexoNascimento = '".$sexoNascimento."',
        generoDeclarado = '".$genero."', codigoUF = '".$uf."', codigoRacaCor = '".$racaCor."', codigoEstadoCivil = '".$estadoCivil."',
           codigoEscolaridade = '".$escolaridade."', codigoOcupacao = '".$ocupacao."', codigoVinculo = '".$vinculo."', rendaIndividual = '".$rendaIndividual."',
            rendaFamiliar = '".$rendaFamiliar."', tipoBeneficio = '".$tipoBeneficio."', valorBeneficio = '".$valorBeneficio."', cartaoSUS = '".$cartaosus."'
             WHERE Cidadao.cpfCidadao = '".$cpf."'");
        if($result){
            echo "<script>alert('Cidadão editado com sucesso...');</script>";
            echo "<script type=\"text/javascript\"> 
                    window.onload=function(){
                        document.forms['exibe'].submit();
                    }
           </script>";
        }
    }
?>

<form action="consulta.php" method=post name="exibe">
    <input type="hidden" name="op" value="op2">
    <input type="hidden" name="cpf" value="<?php echo $cpf ?>">
</form>