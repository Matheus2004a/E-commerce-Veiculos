<?php
    include "./connection/connection.php";
    function demonstrarEnquete($conn){
$consulta = "SELECT * FROM tbl_enquetes";
$qtd_votos = 0;
$totalVotos =0;
//$realiza_consulta = mysqli_prepare($conn, "SELECT * FROM tbl_enquetes");

   $realiza_consulta =  mysqli_query($conn,$consulta);
    $select_votos = "SELECT qtd_votos FROM tbl_enquetes ";
    $select_voto = mysqli_query($conn,$select_votos);
    while($row = mysqli_fetch_array($select_voto)){
       $totalVotos +=  $row['qtd_votos'];

    }
   
    
   
    
   // mysqli_stmt_execute($realiza_consulta);
    //mysqli_stmt_bind_result($realiza_consulta, $id_enquete,$avaliacao,$qtd_votos,$id_cliente);
    
      

       
        echo'
            <p> Total de votos: '.$totalVotos.' </p><br>'; 
        

        /*while( $demonstra_consulta = mysqli_fetch_array($realiza_consulta)){
            $qtd_votos = $demonstra_consulta['qtd_votos'];
            $avaliacao= $demonstra_consulta['avaliacao'];
        echo "
            <div class='demonstrar_avaliacao'>
                <p>".$avaliacao."</p>
                <p> ".$qtd_votos."</p>
            </div>
        ";
    }*/
    while($demonstra_consulta = mysqli_fetch_array($realiza_consulta)){
        $porcentagem = ($demonstra_consulta['qtd_votos'] *100) / $totalVotos;
       echo "$demonstra_consulta[qtd_votos] $demonstra_consulta[avaliacao], ".number_format($porcentagem,2)."% <br>";
    
    }
    }
    ?>