<?php
    
    session_start();
    require_once "../../connection/connection.php";
    require_once "function.php";

    $horarios = array();
    $name = $_POST["nameService"];
    $descricao = $_POST["descriptionService"];
    $valor =  str_replace(',', '.', $_POST["valService"]);

    list($status, $destino) = saveImg($_FILES[ 'arquivo' ]);

    for ($i = 1; $i <= 6;) {
        if (isset($_POST["hora".$i])) {
            $hora = $_POST["hora".$i];
            $hora = substr($hora, 0, 5);
            $horarios[$i] = $hora;
        }
        $i++;
    }

    if($status == 0) {
        $insertTblservicos = "INSERT INTO `bd_veiculos_tcc`.`tbl_servicos` (`nome_servico`, `desc_servico`, `val_servico`, `img_servico`,`fk_id_mecanico`) VALUES ('$name', '$descricao', '$valor', '$destino', '1')";
        
        if (mysqli_query($conn, $insertTblservicos)) {

            $id_service = mysqli_insert_id($conn);

            for ($p = 1; $p <= count($horarios); $p++) {
                $sql = "INSERT INTO `bd_veiculos_tcc`.`tbl_horarios` (`hora_disponivel`, `fk_id_servico`) VALUES (" . "'" . $horarios[$p] . "'" . "," . $id_service . ")";
                mysqli_query($conn, $sql);
            }
            $_SESSION['status_img'] = 1;
            header('Location: http://localhost/E-commerce-Veiculos/screens/CadastrarServicos/');
        } else {
            $_SESSION['status_img'] = 0;
            $_SESSION['msg_error'] = die(mysqli_error($conn));
            header('Location: http://localhost/E-commerce-Veiculos/screens/CadastrarServicos/');
        }
    } else {
        $_SESSION['status_img'] = $status;
        $_SESSION['msg_error'] = $destino;
        header('Location: http://localhost/E-commerce-Veiculos/screens/CadastrarServicos/');
    }

    mysqli_close($conn);
?>