<?php 

        function InsertPedidos($conn,$preco,$quantidade,$installmentsQty,$total)
        {
          $pedidosInsert = "INSERT INTO tbl_pedidos (data_pedido,preco_unit_prod,qtd_prod,qtd_parcelas,total_preco_prod,status_entrega,fk_id_cliente,fk_id_pagto)
          VALUES (
            NOW(),".$preco.",".$quantidade.",".$installmentsQty.", ".$total.",2,".$_SESSION['idLogado'].",1
            );
        ";
        unset($_SESSION['carrinho']);
        unset($_SESSION['dados']);
          $insert = mysqli_query($conn,$pedidosInsert);
          
        }
       
?>

