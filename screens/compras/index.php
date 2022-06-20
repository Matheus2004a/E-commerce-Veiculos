<?php
require __DIR__ . "/../../connection/connection.php";
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
	<link rel="stylesheet" href="../../home_alternativa/assets/css/main.css">
	<link rel="stylesheet" href="../../home_alternativa/assets/css/styles.css">
	<link rel="stylesheet" href="../../components/styles/button_top_page.css">
</head>

<body>
	<?php
	require __DIR__ . "/../../components/messages-alerts/icons.php";

	$filter = $_POST['search'] ?? '';

	$sql = "SELECT `id_prod`, `nome_prod`, `categoria_prod`, `preco_custo_prod`, `foto_prod`, `qtd_estoque` FROM `tbl_produtos` WHERE nome_prod LIKE '%$filter%' ORDER BY nome_prod";

	$filter_selected = $_POST['select-filter'] ?? '';

	$order = "";

	if ($filter_selected == "maior") {
		$order = "ORDER BY preco_custo_prod DESC";
		$sql = "SELECT `id_prod`, `nome_prod`, `categoria_prod`, `preco_custo_prod`, `foto_prod`, `qtd_estoque` FROM `tbl_produtos` $order";
	} elseif ($filter_selected == "menor") {
		$order = "ORDER BY preco_custo_prod ASC";
		$sql = "SELECT `id_prod`, `nome_prod`, `categoria_prod`, `preco_custo_prod`, `foto_prod`, `qtd_estoque` FROM `tbl_produtos` $order";
	} else {
		$sql = "SELECT `id_prod`, `nome_prod`, `categoria_prod`, `preco_custo_prod`, `foto_prod`, `qtd_estoque` FROM `tbl_produtos` WHERE nome_prod LIKE '%$filter%' ORDER BY nome_prod";
	}

	$result_query = mysqli_query($conn, $sql);
	?>

	<a name="top-page"></a>
	<?php
	require "../../components/header.php";
	?>

	<main>
		<div class="max-w-2xl mx-auto py-6 sm:py-24 lg:max-w-7xl">
			<div class="flex items-center justify-between mb-8">
				<form class="w-1/3" action="" method="POST">
					<input class="form-control" type="search" placeholder="Pesquise aqui o que você procura..." aria-label="Search" name="search">
				</form>

				<form class="flex gap-2 w-1/4" action="" method="post" id="order">
					<select class="form-select" name="select-filter" aria-label="select">
						<option selected>Filtrar por</option>
						<option value="maior">Maior preço</option>
						<option value="menor">Menor preço</option>
						<option value="a-z">De A à Z</option>
					</select>
				</form>
			</div>

			<?php
			if (isset($_SESSION['msg-alert-mechanic'])) {
				echo $_SESSION['msg-alert-mechanic'];
				unset($_SESSION['msg-alert-mechanic']);
			}
			?>

			<h2 class="mb-4 text-2xl font-bold">Produtos</h2>
			<article class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
				<?php
				if (mysqli_num_rows($result_query) > 0) {
					while ($row = mysqli_fetch_assoc($result_query)) { ?>
						<div class='group shadow-md rounded-lg'>
							<a href='desc-product.php?id=<?php echo $row['id_prod'] ?>&pagina=1'>
								<div class='w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-t-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8'>
									<figure>
										<img src="<?php echo "../../images/products-images/" . $row['foto_prod'] ?> " alt='' class='w-full h-60 object-center object-cover group-hover:opacity-75'>
									</figure>
								</div>
								<div class='p-3'>
									<h3 class='text-base text-gray-700 truncate'><?php echo $row['nome_prod'] ?></h3>
									<p class='flex items-center justify-between mt-1 text-lg font-medium text-gray-900'>R$ <?php echo $row['preco_custo_prod'] ?></p>
									<?php
									if ($row['qtd_estoque'] > 0) { ?>
										<a href='./cart/template_store/cart.php?add=carrinho&id_prod=<?php echo $row['id_prod'] ?>'>
											<button type='button' class='bg-slate-500 w-100 mt-2 btn btn-secondary' onclick='saveData()'>Adicionar ao carrinho</button>
										</a>
									<?php
									} else { ?>
										<div class="flex justify-end mt-3">
											<p class='text-center text-red-600 bg-red-100 py-1 pl-2.5 pr-2.5 rounded font-bold'>Indisponível</p>
										</div>
									<?php } ?>
								</div>
							</a>
						</div>
					<?php
					}
				} else { ?>
					<div class='alert alert-warning flex items-center w-full' role='alert'>
						<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Warning:'>
							<use xlink:href='#exclamation-triangle-fill' />
						</svg>
						<div>
							Nenhum produto encontrado
						</div>
					</div>
				<?php
				}
				mysqli_close($conn);
				?>
			</article>
		</div>

		<a href="#top-page">
			<button class="button-top-page"><i class="fas fa-arrow-up"></i></button>
		</a>
	</main>

	<?php require_once "../../components/footer.php"; ?>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/51dc1929bd.js" crossorigin="anonymous"></script>
	<script src="../home/js/main.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	<script>
		function saveData() {
			if (typeof(Storage) !== "undefined") {
				if (localStorage.cont) {
					localStorage.cont = Number(localStorage.cont) + 1;
				} else {
					localStorage.cont = 1;
				}
				var cad;
				cad = document.getElementById('ImageProd').value + ';' + document.getElementById('nomeProduto').value + ';' + document.getElementById('precoProduto').value;
				localStorage.setItem("cad_" + localStorage.cont, cad);
			}
		}
	</script>
</body>

</html>