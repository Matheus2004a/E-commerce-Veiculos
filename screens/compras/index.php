<!--**
 * @author Cesar Szpak - Celke -   cesar@celke.com.br
 * @pagina desenvolvida usando framework bootstrap,
 * o código é aberto e o uso é free,
 * porém lembre -se de conceder os créditos ao desenvolvedor.
 *-->
<?php include_once("connection.php");
$result_cursos = "SELECT * FROM tbl_produtos";
$resultado_cursos = mysqli_query($conn, $result_cursos);


?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Criar pagina com abas</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="css/estilo.css">
	</head>
	<body>

	<div id="mySidenav" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	  <a href="../../index.php">Home</a>
	  <a href="../dashboard-clientes/Dashboard-Usuario.php">Dashboard</a>
	  <a href="../history/histórico.php">Histórico</a>
	</div>
		<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
		<div class="container theme-showcase" role="main">
			<div class="page-header">
				  
				
			</div>
			<div class="row">
				<?php while($rows_cursos = mysqli_fetch_assoc($resultado_cursos)){ ?>
					<div class="col-sm-6 col-sm-3">
						<div class="thumbnail">
							<?php echo "<img style='height:250px' src='produtos/".$rows_cursos['img']."'>  "; ?>
							<div class="caption text-center">

								<h3 style="font-size: 15px"><?php echo $rows_cursos['nome']; ?></h3>
								<h3>  R$ <?php echo $rows_cursos['preco']; ?></h3>

								<p><a href="#" class="btn btn-primary" role="button">Comprar</a> </p>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>

		<script>
		function openNav() {
		  document.getElementById("mySidenav").style.width = "250px";
		  document.getElementById("main").style.marginLeft = "250px";
		}

		function closeNav() {
		  document.getElementById("mySidenav").style.width = "0";
		  document.getElementById("main").style.marginLeft= "0";
		}
		</script>
	</body>
</html>