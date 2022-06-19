<?php
session_start();
include "../../connection/connection.php";
$sql = "SELECT * FROM tbl_dados_pessoais WHERE id_dados_pessoais = " . $_SESSION['idLogado'] . " ";
$select = mysqli_query($conn, $sql);
$fetch = mysqli_fetch_assoc($select);
//$pedidos = "SELECT * FROM dados_compras";
$teste = "SELECT id_cliente FROM tbl_clientes WHERE fk_id_dados_pessoais = ".$_SESSION['idLogado']." ";
$sqlTeste = mysqli_query($conn,$teste);
$fetchTeste = mysqli_fetch_assoc($sqlTeste);
$idCliente = $fetchTeste['id_cliente'];
//$pedidos = "SELECT a.id_pedido,b.nome_prod,a.qtd_prod,a.total_preco_prod,a.status_entrega FROM tbl_pedidos as a INNER JOIN tbl_produtos as b WHERE a.fk_id_cliente = '$idCliente'";
$pedidos = "SELECT * FROM dados_compras WHERE fk_id_cliente = '$idCliente'";
//$pedidos = "SELECT a.id_venda,b.nome_prod FROM tbl_vendas as a INNER JOIN tbl_produtos as b WHERE a.fk_cod_prod = 2  = b.id_prod;";
$inner = mysqli_query($conn, $pedidos);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../../bootstrap-5.1.3-dist/css/bootstrap.min.css">
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
  <main class="container">
    <div class="row gutters-sm">
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              <?php
              if (isset($_SESSION['image']) && $_SESSION['image'] != null) {
                echo "<img src='/../E-commerce-veiculos/images/users/" . $fetch['foto_perfil'] . "' alt='Admin' width='150'>";
              } else {
                echo '<a href="/../E-commerce-Veiculos/screens/dashboard-usuario/crud.php">
                <i class="bx bxs-user-circle icon-user"></i>
                </a>';
              }
              ?>
              <div class="mt-3">
                <h4><?php echo $fetch['nome'] ?></h4>
                <p class="text-secondary mb-1"><?php echo $fetch['email'] ?></p>
                <p class="text-muted font-size-sm"><?php echo $fetch['telefone'] ?></p>
                <a href="./crud.php"><button class="btn btn-primary">Modificar</button></a>
                <a href="../../index.php"><button class="btn btn-primary">Voltar</button></a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <h4>Suas Compras</h4><br>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nome</th>
              <th scope="col">Quantidade</th>
              <th scope="col">Preço</th>
              <th scope="col">Status</th>
            </tr>
          </thead>

          <tbody>
            <?php
            if (mysqli_num_rows($inner) > 0) {
              while ($row = mysqli_fetch_assoc($inner)) {
                echo '<tr>
                        <th scope="row">' . $row['id_pedido'] . '</th>
                        <td>' . $row['nome_prod'] . '</td>
                        <td>' . $row['qtd_prod'] . '</td>
                        <td>' . $row['val_pagto_prod'] . '</td>
                        <td> ' . $row['status_pagto'] . '</td>
                      </tr>';
              }
            } else {
              echo "<div class=alert alert-warning flex items-center w-full' role='alert'>
                    <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Warning:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                    <div>
                      Nenhum produto encontrado
                    </div>
                </div>";
            }
            ?>
          </tbody>
        </table>
      </div>
      <div class="col-sm-6 mb-3">
      </div>
    </div>
    </div>
</body>

</html>