<?php
    session_start();
    require_once "../../connection/connection.php";

    $horarios = array();
    $name = $_POST["nameService"];
    $descricao = $_POST["descriptionService"];
    $valor = $_POST["valService"];
    $photo_service = mysqli_real_escape_string($conn, $_POST['file']);


    for ($i = 1; $i <= 6;) {
        if (isset($_POST["hora".$i])) {
            $hora = $_POST["hora".$i];
            $hora = substr($hora, 0, 5);
            $horarios[$i] = $hora;
        }
        $i++;
    }

    $insertTblservicos = "INSERT INTO `bd_veiculos_tcc`.`tbl_servicos` (`nome_servico`, `desc_servico`, `val_servico`, `image_servico`,`fk_id_mecanico`) VALUES ('$name', '$descricao', '$valor', '$photo_service', '1')";

    if (mysqli_query($conn, $insertTblservicos)) {

        $id_service = mysqli_insert_id($conn);

        for ($p = 1; $p <= count($horarios); $p++) {
            $sql = "INSERT INTO `bd_veiculos_tcc`.`tbl_horarios_servicos` (`hora_disponivel`, `fk_id_servico`) VALUES (" . "'" . $horarios[$p] . "'" . "," . $id_service . ")";
            if (mysqli_query($conn, $sql)) {
                echo $horarios[$p], "<br>";
            } else {
                die(mysqli_error($conn));
            }
        }
    }

    mysqli_close($conn);
?>