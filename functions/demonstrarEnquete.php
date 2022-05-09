<?php
    include "./connection/connection.php";
$consulta = "SELECT * FROM tbl_enquetes";
$qtd_votos = 0;
//$realiza_consulta = mysqli_prepare($conn, "SELECT * FROM tbl_enquetes");

   $realiza_consulta =  mysqli_query($conn,$consulta);

    $demonstrar_totalVotos = mysqli_fetch_array($realiza_consulta);
    $quantidadeVotos = $demonstrar_totalVotos[2];
    
   // mysqli_stmt_execute($realiza_consulta);
    //mysqli_stmt_bind_result($realiza_consulta, $id_enquete,$avaliacao,$qtd_votos,$id_cliente);
    
       $totalVotos = $quantidadeVotos *4;
       $porcentagem = ($totalVotos - 4) /100;
        echo'
            <p> Total de votos: '.$totalVotos.' </p><br>'; 
        echo'<p> Porcentagem: '.$porcentagem.'%</p>';

        while( $demonstra_consulta = mysqli_fetch_array($realiza_consulta)){
            $qtd_votos = $demonstra_consulta[2];
            $avaliacao= $demonstra_consulta[1];
        echo "
            <div class='demonstrar_avaliacao'>
                <p>".$avaliacao."</p>
                <p> ".$demonstra_consulta[2]."</p>
            </div>
        ";
    }


    ?>