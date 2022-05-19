<?php
session_start();
include "../../connection/connection.php";
$sql = "SELECT * FROM tbl_dados_pessoais WHERE id_dados_pessoais = " . $_SESSION['idLogado'] . " ";
$select = mysqli_query($conn, $sql);
$fetch = mysqli_fetch_assoc($select);

$pedidos = "SELECT a.id_pedido,b.nome_prod,a.qtd_prod,a.total_preco_prod,a.status_entrega FROM tbl_pedidos   as a   INNER JOIN tbl_produtos as b WHERE a.fk_id_cliente = '$_SESSION[idLogado]' LIMIT 9";
$inner = mysqli_query($conn, $pedidos);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <div class="main-body">
    <div class="container">

      <!-- /Breadcrumb -->
     
      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="../../images/Usuarios/<?php echo $fetch['foto_perfil'] ?>" alt="Admin" width="150">
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
          <h4 style="text-align:center ;color:#666; margin-top:5px; ">Suas Compras</h4><br>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Preço</th>
                <th scope="col">Status</th>
                <?php 
                if (mysqli_num_rows($inner) > 0) {
                while ($row = mysqli_fetch_assoc($inner)) {
                  echo '
                  <tbody>
                  <tr>
                    <th scope="row">'.$row['id_pedido'].'</th>
                    <td>'.$row['nome_prod'].'</td>
                    <td>'.$row['qtd_prod'].'</td>
                    <td>'.$row['total_preco_prod'].'</td>
                    <td> '.$row['status_entrega'].'</td>
                  </tr>
                  
                </tbody>
                    ';
                }
              }else{
                echo"
                <div class=alert alert-warning flex items-center w-full' role='alert'>
									<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Warning:'><use xlink:href='#exclamation-triangle-fill'/></svg>
									<div>
									  Nenhum produto encontrado
									</div>
								  </div>

                ";
              }
                ?>
              </tr>
            </thead>

          </table>
        </div>




        <div class="col-sm-6 mb-3">
        </div>
      </div>
    </div>
  </div>



  </div>
  </div>

  </div>
  </div>
</body>

</html>