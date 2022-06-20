<?php 
  $sqlqidCliente = "SELECT id_cliente FROM tbl_clientes WHERE fk_id_dados_pessoais =  ".$_SESSION['idLogado']."";
  $sqlIdCliente = mysqli_query($conn,$sqlqidCliente);
  $fetchIdCliente = mysqli_fetch_assoc($sqlIdCliente);
  $idCliente = $fetchIdCliente['id_cliente'];
  
        function InsertPedidos($conn,$preco,$quantidade,$installmentsQty,$total,$idCliente)
        {
        
          $pedidosInsert = "INSERT INTO tbl_pedidos (data_pedido,preco_unit_prod,qtd_prod,qtd_parcelas,total_preco_prod,status_entrega,fk_id_cliente,fk_id_pagto)
          VALUES (
            NOW(),".$preco.",".$quantidade.",".$installmentsQty.",".$total.",2,".$idCliente.",1
            );
        ";
        unset($_SESSION['carrinho']);
        unset($_SESSION['dados']);
          if( mysqli_query($conn,$pedidosInsert))
          {
            echo "sucesso";
          }else{
            echo "erro". mysqli_error($conn);
          }
          return "<script> alert('Ola') </script>";
        }

        function insertVendas($conn,$quantidade,$preco,$id_prod)
        {
          $ultimoID = mysqli_insert_id($conn);
          $vendasInsert = "INSERT INTO tbl_vendas (qtd_comprada,val_pagto_prod,fk_cod_prod,fk_id_pedido)
            VALUES(".$quantidade.",".$preco.",".$id_prod.",".$ultimoID.");
          ";
         if( mysqli_query($conn,$vendasInsert))
         {
          echo "sucesso";
         }else{
          echo "erro". mysqli_error($conn);
         }
        }
        function removeItemEstoque ($conn, $quantidade, $id_prod)
        {
          $sqlEstoque = " UPDATE tbl_produtos SET qtd_estoque = qtd_estoque-'$quantidade' WHERE id_prod='$id_prod'";
          if(mysqli_query($conn,$sqlEstoque))
          {
            echo "sucesso";
          }
          else 
          {
            echo "erro". mysqli_error($conn);
          }
        }
       
?>