<?php
    include "../../connection/connection.php";

    $status = $_POST['status'];
    $id_servico = $_POST['id_servico'];

    if($status == 0) {
        $sql = "UPDATE `bd_veiculos_tcc`.`tbl_servicos` SET `status_servico` = '0' WHERE (`id_servico` = $id_servico)";
    } else {
        $sql = "UPDATE `bd_veiculos_tcc`.`tbl_servicos` SET `status_servico` = '1' WHERE (`id_servico` = $id_servico)";
    }

    mysqli_query($conn, $sql);
    header("Location: http://localhost/E-commerce-veiculos/screens/meusServicos/index.php");
?>