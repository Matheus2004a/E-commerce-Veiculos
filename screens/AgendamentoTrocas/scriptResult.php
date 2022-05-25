<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleConfirm.css">
    <title>Document</title>
</head>

<body>

    <div class="container">
        <?php

        include "../../connection/connection.php";
        include "./functions.php";

        $data = $_POST['data'];
        $hora = $_POST['hora'];
        $obs = $_POST['observacao'];
        $id_user = $_POST['id_user'];
        $id_service = $_POST['id_service'];

        $sql = "INSERT INTO `bd_veiculos_tcc`.`tbl_agendamentos_servicos` (`data_agend`, `hora_agend`, `fk_id_cliente`, `fk_id_servico`) VALUES ('$data', '$hora', '$id_user', '$id_service')";
        if (mysqli_query($conn, $sql)) {
            success($data, $hora);
        } else {
            die(mysqli_error($conn));
        }


        mysqli_close($conn);

        ?>
        <a href="index.php">Voltar</a>
    </div>
</body>

</html>