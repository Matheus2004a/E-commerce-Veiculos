<?php
  include './connection/connection.php';
  
    function inserirEnquete($conn){
      $radioEnquete = $_POST['radio_avaliacao'];
      if(isset($_POST['responder'])){
        
        if ($radioEnquete == 'Bom') {
      $query =  " update tbl_enquetes  set qtd_votos= qtd_votos+1 where id_enquete=1";
      
      
    }
    if ($radioEnquete == 'Medio') {
      $query = " update tbl_enquetes  set qtd_votos= qtd_votos+1 where id_enquete=2";
      
    }
    if ($radioEnquete == 'Ruim') {
      $query =  " update tbl_enquetes  set qtd_votos= qtd_votos+1 where id_enquete=3";
      
    }
    // $inserao = mysqli_query($conn,$query);
    $insere = mysqli_query($conn,$query);
    setcookie('statusEnquete',1);
    ob_end_flush();
  }
   
  }

  



//$radioEnquete = $_POST['radio_avaliacao'];

/*if ($radioEnquete == 'Bom'){
    if($radioEnquete == 'Bom'){  }
}
if($radioEnquete == 'Medio'){ $sql=('update tbl_enquetes  set qtd_votos= qtd_votos+1 where id=2'); }

if($radioEnquete == 'Ruim'){ $sql=('update  tbl_enquetes  set Ruim=Ruim+? where id=?'); }
if($radioEnquete == 'Pessimo'){ $sql=('update tbl_enquetes set Pessimo=Pessimo+? where id=?'); }


$update = mysqli_query($conn,$sql);*/
/*function inserirDados($conn){
    
    if(isset($_POST['responder'])){

        $radioEnquete = $_POST['radio_avaliacao'];

        if($radioEnquete == 'Bom'){
            $query = mysqli_prepare($conn, "update tbl_enquetes  set qtd_votos= qtd_votos+1 where id_enquete=1 ");
            mysqli_stmt_execute($query);
        }
        if($radioEnquete == 'Medio'){
            $query = mysqli_prepare($conn, " update tbl_enquetes  set qtd_votos= qtd_votos+1 where id_enquete=2");
            mysqli_stmt_execute($query);


         
        }
        if($radioEnquete == 'Ruim'){
            $query = mysqli_prepare($conn, " update tbl_enquetes  set qtd_votos= qtd_votos+1 where id_enquete=3");
            mysqli_stmt_execute($query);


          
      }
        $inserao = mysqli_query($conn,$query);

    
    }
}*/

    //$demonstra_consulta = mysqli_fetch_assoc($realiza_consulta);

    



