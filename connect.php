<?php
    $conectado=0;

    $mysqli=new mysqli("localhost","root","","CadastroCidadao");
    if($mysqli->connect_errno){
        echo "Erro de conexão: " . $mysqli->connect_errno . "\n";
    }
    else{
        $mysqli->set_charset("utf8");
        $consultaEstados=$mysqli->query("SELECT * FROM UF ORDER BY UF.codigoUF ASC");
        $consultaRacaCor=$mysqli->query("SELECT * FROM `Raca_Cor` ORDER BY `Raca_Cor`.`codigoRacaCor` ASC");
        $consultaEstadoCivil=$mysqli->query("SELECT * FROM `Estado_Civil` ORDER BY `Estado_Civil`.`codigoEstadoCivil` ASC");
        $consultaEscolaridade=$mysqli->query("SELECT * FROM `Escolaridade` ORDER BY `Escolaridade`.`codigoEscolaridade` ASC");
        $consultaOcupacao=$mysqli->query("SELECT * FROM `Ocupacao` ORDER BY `Ocupacao`.`codigoOcupacao` ASC");
        $consultaVinculo=$mysqli->query("SELECT * FROM `Vinculo` ORDER BY `Vinculo`.`codigoVinculo` ASC");
    }

?>