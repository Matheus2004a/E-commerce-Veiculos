<?php 
    session_start();
    require_once "../../connection/connection.php";

    $horarios = array();
    $name = $_POST["nameService"];
    $descricao = mysqli_real_escape_string($conn,$_POST["descriptionService"]);
    $valor = $_POST["valService"];

    for ($i=1; $i <= 6; $i++) { 
        $hora = $_POST["hora$i"];
        if ($hora !== "") {
            $hora = substr($hora, 0, 5);
            $horarios[$i-1] = $hora;
        }
        
    }
    $insertTblservicos = "INSERT INTO `bd_veiculos_tcc`.`tbl_servicos` (`nome_servico`, `desc_servico`, `val_servico`, `fk_id_mecanico`) VALUES ('$name', '$descricao', '$valor', '2')"; 

    if(mysqli_query($conn,$insertTblservicos)){
        echo"Sucesso";
    }
    
    for ($i=0; $i < count($horarios); $i++) { 
        $sql = "INSERT INTO tbl_horarios (hora_disponivel, fk_id_servico) VALUES ('$horarios[$i]', '2')";
        if (mysqli_query($conn, $sql)) {
            echo "sucesso!!!";
        } else {
            die(mysqli_error($conn));
        }
    }

    mysqli_close($conn);
?>