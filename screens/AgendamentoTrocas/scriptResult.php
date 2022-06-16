
<?php
    session_start();
    require_once "../../connection/connection.php";
    include "./functions.php";

    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $obs = $_POST['observacao'];
    $id_user = $_POST['id_user'];
    $id_service = $_POST['id_service'];

    $sql_id_cliente = "SELECT id_cliente FROM tbl_clientes WHERE fk_id_dados_pessoais = ".$_SESSION['idLogado'];
    $resultado = mysqli_query($conn, $sql_id_cliente);
    $row_id = mysqli_fetch_assoc($resultado);

    $sql = "INSERT INTO `bd_veiculos_tcc`.`tbl_agendamentos_servicos` (`data_agend`, `hora_agend`, `obs_servico`, `fk_id_cliente`, `fk_id_servico`) VALUES ('$data', '$hora', '$obs','".$row_id['id_cliente']."'']', '$id_service')";

    if (mysqli_query($conn, $sql)) {

        $_SESSION['status'] = 1;
        header("Location: http://localhost/E-commerce-Veiculos/screens/AgendamentoTrocas/index.php?id_servico=$id_service");
    } else {
        $_SESSION['status'] = 0;
        $_SESSION['error'] = die(mysqli_error($conn));
        header('Location: http://localhost/E-commerce-Veiculos/screens/AgendamentoTrocas/');
    }


    mysqli_close($conn);

?>
