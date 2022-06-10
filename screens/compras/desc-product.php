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
                <input type='number' class='w-1/6 p-1 rounded border border-secondary outline-none' min='1' max=". $row['qtd_estoque'] .">

                <!-- Reviews -->
                <div class='mt-6'>
                    <div class='flex items-center'>
                        <div class='flex items-center'>
                            <!-- Heroicon name: solid/star Active: 'text-gray-900', Default: 'text-gray-200'-->
                            <svg class='text-gray-900 h-5 w-5 flex-shrink-0' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' aria-hidden='true'>
                                <path d='M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z' />
                            </svg>

                            <!-- Heroicon name: solid/star -->
                            <svg class='text-gray-900 h-5 w-5 flex-shrink-0' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' aria-hidden='true'>
                                <path d='M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z' />
                            </svg>

                            <!-- Heroicon name: solid/star -->
                            <svg class='text-gray-900 h-5 w-5 flex-shrink-0' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' aria-hidden='true'>
                                <path d='M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z' />
                            </svg>

                            <!-- Heroicon name: solid/star -->
                            <svg class='text-gray-900 h-5 w-5 flex-shrink-0' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' aria-hidden='true'>
                                <path d='M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z' />
                            </svg>

                            <!-- Heroicon name: solid/star -->
                            <svg class='text-gray-200 h-5 w-5 flex-shrink-0' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' aria-hidden='true'>
                                <path d='M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z' />
                            </svg>
                        </div>
                        <p class='sr-only'>4 out of 5 stars</p>
                        <a href='#' class='ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500'>117 reviews</a>
                    </div>
                </div>

                <!-- Product info -->
                <!-- Options -->
                <div class='lg:mt-0 lg:row-span-3'>
                    <a href='./cart/template_store/cart.php?acao=add&id_prod=".$row['id_prod']."' ><button class='mt-4 w-2/6 bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'>Comprar agora</button></a>
                </div>
            </div>

            <div class='py-10 lg:pt-6 lg:pb-16 lg:col-start-1 lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8'>
                <!-- Description and details -->
                <div class='mt-10'>
                    <h3 class='text-sm font-medium text-gray-900'>Highlights</h3>

                    <div class='mt-4'>
                        <ul role='list' class='block pl-4 list-disc text-sm space-y-2'>
                            <li class='text-gray-400'><span class='text-gray-600'>Hand cut and sewn locally</span></li>

                            <li class='text-gray-400'><span class='text-gray-600'>Dyed with our proprietary colors</span></li>

                            <li class='text-gray-400'><span class='text-gray-600'>Pre-washed &amp; pre-shrunk</span></li>

                            <li class='text-gray-400'><span class='text-gray-600'>Ultra-soft 100% cotton</span></li>
                        </ul>
                    </div>
                </div>

                <div class='mt-10'>
                    <h2 class='text-sm font-medium text-gray-900'>Details</h2>

                    <div class='mt-4 space-y-6'>
                        <p class='text-sm text-gray-600'>The 6-Pack includes two black, two white, and two heather gray Basic Tees. Sign up for our subscription service and be the first to get new, exciting colors, like our upcoming &quot;Charcoal Gray&quot; limited release.</p>
                    </div>
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
    <?php require_once "../../components/footer.php";?>
</body>

</html>