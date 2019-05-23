<?php 
    include('connect.php'); 
    $nomeCidadao=$_POST['nomeCidadao'];
    $nomeSocial=$_POST['nomeSocial'];
    $nomeMae=$_POST['nomeMae'];
    $dataNascimento=$_POST['dataNascimento'];
    $sexoNascimento=$_POST['sexoNascimento'];
    $genero=$_POST['genero'];
    $ufNascimento=$_POST['ufNascimento'];
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

    
    function mod($dividendo, $divisor) {
        return round($dividendo - (floor($dividendo / $divisor) * $divisor));
    }

    function cpfRandom() {
        $n1 = rand(0, 9);
        $n2 = rand(0, 9);
        $n3 = rand(0, 9);
        $n4 = rand(0, 9);
        $n5 = rand(0, 9);
        $n6 = rand(0, 9);
        $n7 = rand(0, 9);
        $n8 = rand(0, 9);
        $n9 = rand(0, 9);
        $d1 = $n9 * 2 + $n8 * 3 + $n7 * 4 + $n6 * 5 + $n5 * 6 + $n4 * 7 + $n3 * 8 + $n2 * 9 + $n1 * 10;
        $d1 = 11 - (mod($d1, 11) );
        if ($d1 >= 10) {
            $d1 = 0;
        }
        $d2 = $d1 * 2 + $n9 * 3 + $n8 * 4 + $n7 * 5 + $n6 * 6 + $n5 * 7 + $n4 * 8 + $n3 * 9 + $n2 * 10 + $n1 * 11;
        $d2 = 11 - (mod($d2, 11) );
        if ($d2 >= 10) {
            $d2 = 0;
        }
        $retorno = '' . $n1 . $n2 . $n3 . $n4 . $n5 . $n6 . $n7 . $n8 . $n9 . $d1 . $d2;
        return $retorno;
    }

    $result=$mysqli->query("SELECT * FROM Cidadao WHERE nomeCidadao=\"".$nomeCidadao."\" AND nomeMae=\"".$nomeMae."\" AND dataNascimento=\"".$dataNascimento."\" AND codigoUF=\"".$ufNascimento."\"");
    if($result->num_rows>0) echo "<script>alert('Dados já existentes, por favor altere...');window.location='cadastro.php';
    </script>";

    else{
        $cpfGerado=cpfRandom();
        $res=$mysqli->query("SELECT * FROM Cidadao WHERE cpf=".$cpfGerado);
        //echo $cpfGerado;
        while(@$res->num_rows>0){
            $cpfGerado=cpfRandom();
            $res=$mysqli->query("SELECT * FROM Cidadao WHERE cpf=".$cpfGerado);
        }
        $sql="INSERT INTO Cidadao (cpfCidadao, nomeCidadao, nomeSocial, NomeMae, dataNascimento, sexoNascimento, generoDeclarado, 
            codigoUF, codigoRacaCor, codigoEstadoCivil, codigoEscolaridade, codigoOcupacao, codigoVinculo, rendaIndividual, 
            rendaFamiliar, tipoBeneficio, valorBeneficio, cartaoSUS)
            VALUES ('".$cpfGerado."','".$nomeCidadao."','".$nomeSocial."','".$nomeMae."','".$dataNascimento."','".$sexoNascimento."','".$genero
            ."','".$ufNascimento."','".$racaCor."','".$estadoCivil."','".$escolaridade."','".$ocupacao."','".$vinculo."','".$rendaIndividual
            ."','".$rendaFamiliar."','".$tipoBeneficio."','".$valorBeneficio."','".$cartaosus."')";

        if($mysqli->query($sql)){
            echo "<script>alert('Cidadão cadastrado com sucesso...');</script>";
        }
        else{
            echo "Erro de requisição: " . $mysqli->error. "\n";
            echo "<script>alert('Erro no cadastro...');</script>";
        }
        
        $mysqli->close();
        echo "<script type=\"text/javascript\"> 
                        window.onload=function(){
                            document.forms['finaliza'].submit();
                        }
            </script>";
    }
?>

<form action="consulta.php" method=post name="finaliza">
    <input type="hidden" name="op" value="op2">
    <input type="hidden" name="cpf" value="<?php echo $cpfGerado ?>">
</form>