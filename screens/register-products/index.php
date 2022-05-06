<?php
session_start();
// require __DIR__ . '/../login/verify-session.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de produtos</title>
    <link rel="stylesheet" href="../../bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="../home/css/style.css">
</head>

<?php
require __DIR__ . '/../../components/messages-alerts/icons.php';
?>

<body class="hold-transition register-page">
    <?php
    include "../../components/header.php";
    ?>

    <main class="container card">
        <div class="card-body register-card-body">
            <h2 class="text-center mb-4">Cadastrar produto</h2>
            <form action="upload.php" method="post" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                <?php
                if (isset($_SESSION['register-product'])) {
                    echo $_SESSION['register-product'];
                    unset($_SESSION['register-product']);
                } else if (isset($_SESSION['no-register-product'])) {
                    echo $_SESSION['no-register-product'];
                    unset($_SESSION['no-register-product']);
                }
                ?>
                <fieldset class="col-md-6">
                    <label for="validationCustom01" class="form-label">Nome do produto</label>
                    <input type="text" class="form-control" name="name-product" id="validationCustom01" required autofocus>
                    <div class="invalid-feedback">
                        Digite o nome do produto.
                    </div>
                </fieldset>

                <fieldset class="col-md-6">
                    <label for="validationCustom04" class="form-label">Categoria do produto</label>
                    <select class="form-select" name="category-product" id="validationCustom04" required>
                        <option selected disabled value="">Selecione sua categoria</option>
                        <option value="Rodas">Rodas</option>
                        <option value="Filtros de ar">Filtros de ar</option>
                        <option value="Óleo">Óleo</option>
                    </select>
                    <div class="invalid-feedback">
                        Digite a categoria do produto.
                    </div>
                </fieldset>

                <fieldset class="col-md-6">
                    <label for="validationCustom05" class="form-label">Preço</label>
                    <input type="text" class="form-control" name="price-product" id="price-product" maxlength="10" autocomplete="off" required>
                    <div class="invalid-feedback">
                        Digite o preço do produto.
                    </div>
                </fieldset>

                <fieldset class="col-md-6">
                    <label for="validationCustom05" class="form-label">Código de barras</label>
                    <input type="text" class="form-control" name="cod-product" id="money" maxlength="10" autocomplete="off" required>
                    <div class="invalid-feedback">
                        Digite o código de barras do produto.
                    </div>
                </fieldset>

                <fieldset class="col-md-6">
                    <label for="validationCustom01" class="form-label">Qtd em estoque</label>
                    <input type="number" class="form-control" name="qtd-product" id="validationCustom01" required>
                    <div class="invalid-feedback">
                        Digite o qtd de estoque do produto.
                    </div>
                </fieldset>

                <fieldset class="col-md-6">
                    <label for="validationCustom05" class="form-label">Foto do produto</label>
                    <input type="file" name="file" class="form-control" id="validationCustom05" required>
                    <div class="invalid-feedback">
                        Insira a foto do produto.
                    </div>
                </fieldset>

                <fieldset class="col-12">
                    <label for="validationCustom05" class="form-label">Descrição do produto</label>
                    <textarea type="text" class="form-control" name="describe-product" id="validationCustom05" required></textarea>
                    <div class="invalid-feedback">
                        Digite a descrição do produto.
                    </div>
                </fieldset>

                <div class="col-6">
                    <a href="">
                        <button class="btn btn-secondary">Voltar</button>
                    </a>
                    <button class="btn btn-primary" type="submit">Cadastrar produto</button>
                </div>
            </form>
        </div>
    </main>

    <script src="../../validations/type-files.js"></script>
    <script src="../../validations/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.8/jquery.mask.min.js" integrity="sha512-hAJgR+pK6+s492clbGlnrRnt2J1CJK6kZ82FZy08tm6XG2Xl/ex9oVZLE6Krz+W+Iv4Gsr8U2mGMdh0ckRH61Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#price-product').mask('000.000,00', {
            reverse: true
        });
    </script>
</body>

</html>