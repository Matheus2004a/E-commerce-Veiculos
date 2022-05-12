<?php 

    require_once "../../connection/connection.php";

    $horarios = array();
    $name = $_POST["nameService"];
    $descricao = $_POST["descriptionService"];
    $valor = $_POST["valService"];

    for ($i=1; $i <= 6; $i++) { 
        $hora = $_POST["hora$i"];
        if ($hora !== "") {
            $hora = substr($hora, 0, 5);
            $horarios[$i-1] = $hora;
        }
        
    }

    for ($i=0; $i < count($horarios); $i++) { 
        $sql = "INSERT INTO tbl_horarios (hora_disponivel, fk_id_servico) VALUES (".$horarios[$i].", 2)";
        if (mysqli_query($conn, $sql)) {
            echo "sucesso!!!";
        } else {
            die(mysqli_error($conn));
        }
    }

    mysqli_close($conn);
?>