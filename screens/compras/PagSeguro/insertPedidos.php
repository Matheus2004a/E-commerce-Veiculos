<?php 

        function InsertPedidos($conn,$valItemProd,$itemQuantity1,$installmentsQty,$itemAmount)
        {
          $pedidosInsert = "INSERT INTO tbl_pedidos (data_pedido,preco_unit_prod,qtd_prod,qtd_parcelas,total_preco_prod,status_entrega,fk_id_cliente,fk_id_pagto)
          VALUES (
            NOW(),".$valItemProd.",".$itemQuantity1.",".$installmentsQty.", ".$itemAmount.",2,".$_SESSION['idLogado'].",1
            );
        ";
          $insert = mysqli_query($conn,$pedidosInsert);
          if(mysqli_query($conn,$pedidosInsert)){
            echo "
            <script>
            window.onload = function() {
                  $('#myModal').modal();
              }
            </script>
            ";
          }else{
            echo "Erro";
          }
        }
  
       
       
?>

