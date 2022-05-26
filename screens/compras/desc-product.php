<?php
require __DIR__ . "/../../connection/connection.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descrição de produtos</title>
    <link rel="stylesheet" href="../../bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../home/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="desc_product.css">
</head>

<body>
    <a name="top-page"></a>

    <?php
    require "../../components/header.php";

    $id_product = $_GET['id'];
    $sql = "SELECT `id_prod`, `nome_prod`, `categoria_prod`, `preco_custo_prod`, `desc_prod`, `foto_prod`, `qtd_estoque` FROM `tbl_produtos` WHERE id_prod = $id_product";
    $result_query = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result_query);

    echo "<main>
        <a href='index.php'>
            <span class='return-page w-fit flex align-items-center gap-2'>
                <i class='bx bx-arrow-back'></i>
                <p>Voltar</p>
            </span>
        </a>
        <!-- Image gallery -->
        <div class='mt-6 max-w-2xl mx-auto items-center sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-3 lg:gap-x-8'>
            <div class='hidden lg:grid lg:grid-cols-1 lg:gap-y-8'>
                <div class='aspect-w-4 aspect-h-5 sm:rounded-lg sm:overflow-hidden lg:aspect-w-3 lg:aspect-h-4'>
                    <figure>
                        <img src='" . $row['foto_prod'] . "' alt='Model wearing plain white basic tee.' class='w-full h-full object-center object-cover'>
                    </figure>
                </div>
            </div>

            <div class='grid gap-3 lg:col-span-2 lg:pr-8'>
                <h1 class='text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl'>" . $row['nome_prod'] . "</h1>
                <p class='text-base text-gray-900'>" . $row['desc_prod'] . "</p>
                <p class='text-3xl text-gray-900'>R$" . $row['preco_custo_prod'] . "</p>
                <p class='text-base text-gray-900'>Selecione a quantidade:</p>
                <input type='number' class='w-1/6 p-1 rounded border border-secondary outline-none' min='1' max=" . $row['qtd_estoque'] . ">
                <!-- Product info -->
                <!-- Options -->
                <div class='lg:mt-0 lg:row-span-3'>
                    <button type='submit' class='mt-2 w-2/6 bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'>Comprar agora</button>
                </div>
            </div>
        </div>
</main>";

    $sql_more_prod = "SELECT `id_prod`, `nome_prod`, `categoria_prod`, `preco_custo_prod`, `desc_prod`, `foto_prod`, `qtd_estoque` FROM `tbl_produtos` WHERE categoria_prod LIKE '%$row[categoria_prod]%' ORDER BY nome_prod LIMIT 4";
    $result_more_prod = mysqli_query($conn, $sql_more_prod);
    ?>

    <div class='max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8'>
        <h2 class='text-2xl font-semibold'>As pessoas também compraram</h2>
        <article class='grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8 mt-5'>
            <?php
            while ($row_prod = mysqli_fetch_assoc($result_more_prod)) {
                echo "<div class='group shadow-md rounded-lg'>
                <a href='desc-product.php?id=" . $row_prod['id_prod'] . "'>
                        <div class='w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-t-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8'>
                            <figure>
                                <img src=' " . $row_prod['foto_prod'] . "' alt='' class='w-full h-60 object-center object-cover group-hover:opacity-75'>
                            </figure>
                        </div>
                        <div class='p-3'>
                            <h3 class='text-base text-gray-700 truncate'>" . $row_prod['nome_prod'] . "</h3>
                            <p class='flex items-center justify-between mt-1 text-lg font-medium text-gray-900'>R$ " . $row_prod['preco_custo_prod'] . "</p>
                            <a href='./cart/App/Controller/addCarrinho.php'>
                                <button type='button' class='bg-slate-500 w-100 mt-2 btn btn-secondary'>Adicionar ao carrinho</button>
                            </a>
                        </div>
                    </a>
                </div>";
            }
            mysqli_close($conn);
            ?>
        </article>
    </div>
</body>

</html>