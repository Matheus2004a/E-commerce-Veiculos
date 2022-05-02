<?php
    include "./connection/connection.php";
$consulta = "SELECT * FROM tbl_enquetes";

//$realiza_consulta = mysqli_prepare($conn, "SELECT * FROM tbl_enquetes");

   $realiza_consulta =  mysqli_query($conn,$consulta);

    
   // mysqli_stmt_execute($realiza_consulta);
    //mysqli_stmt_bind_result($realiza_consulta, $id_enquete,$avaliacao,$qtd_votos,$id_cliente);

    while($demonstra_consulta = mysqli_fetch_assoc($realiza_consulta)){
        echo "
            <div class='demonstrar_avaliacao'> 
                <p>".$demonstra_consulta['avaliacao']."</p>
                <p> ".$demonstra_consulta['qtd_votos']."</p>
            </div>
        ";
    }

    ?>