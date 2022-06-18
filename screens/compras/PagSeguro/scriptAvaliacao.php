<?php
 require_once "../../../connection/connection.php";

 $sqls = array();
if (isset($_POST['star']) && $_POST['star'] != "") {
    $voto = $_POST['star'];
    if ($voto == 1) {
        $sqls =  $sql1 = "SELECT `qtd_votos` FROM `tbl_enquetes` WHERE id_enquete = 1 FOR UPDATE";
        $sqls = $sql2 = "UPDATE `tbl_enquetes` SET `qtd_votos` = qtd_votos + '1' WHERE `id_enquete` = 1";
    } else if ($voto == 2) {
        $sqls =  $sql1 = "SELECT `qtd_votos` FROM `tbl_enquetes` WHERE id_enquete = 2 FOR UPDATE";
        $sqls = $sql2 = "UPDATE `tbl_enquetes` SET `qtd_votos` = qtd_votos + '1' WHERE `id_enquete` = 2";
    } else if ($voto == 3) {
        $sqls =  $sql1 = "SELECT `qtd_votos` FROM `tbl_enquetes` WHERE id_enquete = 3 FOR UPDATE";
        $sqls = $sql2 = "UPDATE `tbl_enquetes` SET `qtd_votos` = qtd_votos + '1' WHERE `id_enquete` = 3";
    } else if ($voto == 4) {
        $sqls =  $sql1 = "SELECT `qtd_votos` FROM `tbl_enquetes` WHERE id_enquete = 4 FOR UPDATE";
        $sqls = $sql2 = "UPDATE `tbl_enquetes` SET `qtd_votos` = qtd_votos + '1' WHERE `id_enquete` = 4";
    } else if ($voto == 5) {
       $sqls =  $sql1 = "SELECT `qtd_votos` FROM `tbl_enquetes` WHERE id_enquete = 5 FOR UPDATE";
       $sqls = $sql2 = "UPDATE `tbl_enquetes` SET `qtd_votos` = qtd_votos + '1' WHERE `id_enquete` = 5";
    }
    if (mysqli_query($conn, $sqls)) {
        header("Location: http://localhost/E-commerce-veiculos/index.php");
    }
}

mysqli_close($conn);

?>