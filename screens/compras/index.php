<?php
require __DIR__ . "/../../connection/connection.php";
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Página de compras</title>
	<link rel="stylesheet" href="../../bootstrap-5.1.3-dist/css/bootstrap.min.css">
	<script src="https://cdn.tailwindcss.com"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../home/css/style.css">
	<link rel="stylesheet" href="../../components/styles/button_top_page.css">
</head>

<body>
	<?php
	require __DIR__ . "/../../components/messages-alerts/icons.php";

	$filter = $_POST['search'] ?? '';

	$sql = "SELECT `id_prod`, `nome_prod`, `categoria_prod`, `preco_custo_prod` AS preco, `foto_prod`, `qtd_estoque` FROM `tbl_produtos` WHERE nome_prod LIKE '%$filter%' ORDER BY nome_prod";

	$filter_selected = $_POST['select-filter'] ?? '';

	if ($filter_selected == "maior") {
		$sql = "SELECT `id_prod`, `nome_prod`, `categoria_prod`, MAX(`preco_custo_prod`) AS preco, `foto_prod`, `qtd_estoque` FROM `tbl_produtos`";
	} elseif ($filter_selected == "menor") {
		$sql = "SELECT `id_prod`, `nome_prod`, `categoria_prod`, MIN(`preco_custo_prod`) AS preco, `foto_prod`, `qtd_estoque` FROM `tbl_produtos`";
	} else {
		$sql = "SELECT `id_prod`, `nome_prod`, `categoria_prod`, `preco_custo_prod` AS preco, `foto_prod`, `qtd_estoque` FROM `tbl_produtos` WHERE nome_prod LIKE '%$filter%' ORDER BY nome_prod";
	}
	$result_query = mysqli_query($conn, $sql);

	
	
	?>

	<a name="top-page"></a>
	<?php
	require "../../components/header.php";
	?>

	<main>
		<div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
			<div class="flex items-center justify-between mb-8">
				<form class="w-1/3" action="" method="POST">
					<input class="form-control" type="search" placeholder="Pesquise aqui o que você procura..." aria-label="Search" name="search">
				</form>

				<form class="flex gap-2 w-1/4" action="" method="post">
					<select class="form-select" name="select-filter" aria-label="select">
						<option selected>Filtrar por</option>
						<option value="maior">Maior preço</option>
						<option value="menor">Menor preço</option>
						<option value="a-z">De A à Z</option>
					</select>
					<button class="bg-blue-600 btn btn-primary" type="submit">Filtrar</button>
				</form>
			</div>

			<h2 class="mb-4 text-2xl font-bold">Produtos</h2>
			<article class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
				<?php
				
						
				
				if (mysqli_num_rows($result_query) > 0) {
					while ($row = mysqli_fetch_assoc($result_query)) {
						if ($row['qtd_estoque'] > 0) {
							$_SESSION['status_estoq'] = "";
						} else {
							$_SESSION['status_estoq'] = "<span class='text-xs text-red-600 bg-red-100 p-1 rounded'>Indisponível</span>";
						}
						
						
						echo "<div class='group shadow-md rounded-lg'>
						<a href='desc-product.php?id=" . $row['id_prod'] . "'>
								<div class='w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-t-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8'>
									<figure>
										<img src=' " . $row['foto_prod'] . "' id='ImageProd' value='".$row['foto_prod']."' alt='' class='w-full h-60 object-center object-cover group-hover:opacity-75'>
									</figure>
								</div>
								<div class='p-3'>
									<h3 class='text-base text-gray-700 truncate' id='nomeProduto' value='11'>" . $row['nome_prod'] . "</h3>
									<p class='flex items-center justify-between mt-1 text-lg font-medium text-gray-900' value='".$row['preco']."' id='precoProduto'>R$ " . $row['preco'] . "" . $_SESSION['status_estoq'] . "</p>

										<button type='button' class='bg-slate-500 w-100 mt-2 btn btn-secondary' onclick='saveData()' ><a href='./cart/template_store/cart.php?add=carrinho&id_prod=".$row['id_prod']."'> Adicionar ao carrinho </a> </button>
									</a>
								</div>
							</a>
							</div>";
							
							
					}
				} else {
					echo "<div class='alert alert-warning flex items-center w-full' role='alert'>
									<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Warning:'><use xlink:href='#exclamation-triangle-fill'/></svg>
									<div>
									  Nenhum produto encontrado
									</div>
								  </div>";
				}
				
				mysqli_close($conn);
				?>
			</article>
		</div>

		<?php
			require "../../components/button_top_page.php"
		?>
	</main>

	<?php require_once "../../components/footer.php"; ?>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/51dc1929bd.js" crossorigin="anonymous"></script>
	<script src="../home/js/main.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	<script>
		function saveData(){
			if(typeof(Storage)!== "undefined"){
				if(localStorage.cont){
					localStorage.cont = Number(localStorage.cont)+1;
				}else{
					localStorage.cont = 1;
				}
				var cad;
				cad = document.getElementById('ImageProd').value + ';' + document.getElementById('nomeProduto').value + ';' + document.getElementById('precoProduto').value;
				localStorage.setItem("cad_"+localStorage.cont,cad);
				
			}
		}		
		
		
	</script>
</body>

</html>