<?php
require __DIR__ . "/../../connection/connection.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agendamento de serviços</title>
	<link rel="stylesheet" href="../../bootstrap-5.1.3-dist/css/bootstrap.min.css">
	<script src="https://cdn.tailwindcss.com"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../../home_alternativa/assets/css/main.css">
	<link rel="stylesheet" href="../../home_alternativa/assets/css/styles.css">
	<link rel="stylesheet" href="../../components/styles/button_top_page.css">
	<link rel="stylesheet" href="style-modal.css">
	<script src="script.js"></script>
</head>

<body>
	<?php
	require __DIR__ . "/../../components/messages-alerts/icons.php";

	$filter = $_POST['search'] ?? '';

	$sql = "SELECT `id_servico`, `nome_servico`, `desc_servico`, `val_servico`, `img_servico`, `fk_id_mecanico` FROM `tbl_servicos` WHERE nome_servico LIKE '%$filter%' ORDER BY nome_servico";

	$filter_selected = $_POST['select-filter'] ?? '';

	$order = "";

	if ($filter_selected == "maior") {
		$order = "ORDER BY val_servico DESC";
		$sql = "SELECT `id_servico`, `nome_servico`, `desc_servico`, `val_servico`, `img_servico`, `fk_id_mecanico` FROM `tbl_servicos` $order";
	} elseif ($filter_selected == "menor") {
		$order = "ORDER BY val_servico ASC";
		$sql = "SELECT `id_servico`, `nome_servico`, `desc_servico`, `val_servico`, `img_servico`, `fk_id_mecanico` FROM `tbl_servicos` $order";
	} else {
		$sql = "SELECT `id_servico`, `nome_servico`, `desc_servico`, `val_servico`, `img_servico`, `fk_id_mecanico` FROM `tbl_servicos` WHERE nome_servico LIKE '%$filter%' ORDER BY nome_servico";
	}

	$result_query = mysqli_query($conn, $sql);
	?>

	<a name="top-page"></a>

	<?php
	include "../../components/header.php"
	?>

	<main>
		<div class="max-w-2xl mx-auto py-6 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
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

			<h2 class="mb-4 text-2xl font-bold">Serviços</h2>
			<article class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
				<?php
				if (mysqli_num_rows($result_query) > 0) {
					while ($row = mysqli_fetch_assoc($result_query)) {
						echo "<div class='group shadow-md rounded-lg'>
								<div class='w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-t-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8'>
									<figure>
										<img src='" . $row['img_servico'] . "' id='Imageservico' alt='' class='w-full h-60 object-center object-cover group-hover:opacity-75'>
									</figure>
								</div>
								<div class='p-3'>
									<h3 class='text-base text-gray-700 truncate' id='nomeservicouto' value='11'>" . $row['nome_servico'] . "</h3>
									<p class='flex items-center justify-between mt-1 text-lg font-medium text-gray-900' value='" . $row['val_servico'] . "' id='precoservicouto'>R$ " . $row['val_servico'] . "</p>";
						if (isset($_SESSION['category']) && $_SESSION['category'] == "cliente") {
							echo "<button type='button' class='bg-slate-500 w-100 mt-2 btn btn-secondary' onclick='saveData()' ><a href='../AgendamentoTrocas/index.php?id_servico=" . $row['id_servico'] . "'> Agendar serviço </a> </button>";
						} else {
							echo "<button onclick='showModal()' type='button' class='bg-slate-500 w-100 mt-2 btn btn-secondary' onclick='saveData()'> Agendar serviço </button>";
						}
						echo "</div>
							</div>";
					}
				} else {
					echo "<div class='alert alert-warning flex items-center w-full' role='alert'>
									<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Warning:'><use xlink:href='#exclamation-triangle-fill'/></svg>
									<div>
									  Nenhum servico encontrado
									</div>
								  </div>";
				}
				mysqli_close($conn);
				?>
			</article>
		</div>

		<?php
		// require "../../components/button_top_page.php";
		?>
		<a href="#top-page">
			<button class="button-top-page bg-sky-500"><i class="fas fa-arrow-up"></i></button>
		</a>

		<div id="myModal" class="modal">
			<div class="modal_content">
				<i class="fa-solid fa-triangle-exclamation"></i>
				<p id="p_modal">
					Para agendar um serviço você precisa ser um <b>CLIENTE!</b>
				</p>
				<div class="buttons">
					<p>
						Deseja entrar como cliente?
					</p>
					<span onclick="closeModal()" class="close"><a href="/../E-commerce-Veiculos/screens/login/">Sim</a></span>
					<span onclick="closeModal()" class="close">Não</span>
				</div>
			</div>
		</div>
	</main>

	<?php
	include "../../components/footer.php";
	?>

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
				cad = document.getElementById('Imageservico').value + ';' + document.getElementById('nomeservicouto').value + ';' + document.getElementById('precoservicouto').value;
				localStorage.setItem("cad_" + localStorage.cont, cad);

			}
		}
	</script>
</body>

</html>