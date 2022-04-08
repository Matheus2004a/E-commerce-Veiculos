<?php
session_start();
require 'verify-access.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de produtos</title>
    <link rel="stylesheet" href="../../bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<?php
require __DIR__ . '/../../components/messages-alerts/icons.php';
?>

<body>
    <main class="container">
        <h2 class="text-center">Cadastrar produto</h2>
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
            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Nome do produto</label>
                <input type="text" class="form-control" name="name-product" id="validationCustom01" required autofocus>
                <div class="invalid-feedback">
                    Digite o nome do produto.
                </div>
            </div>

            <div class="col-md-6">
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
            </div>

            <div class="col-md-6">
                <label for="validationCustom03" class="form-label">Cód do produto</label>
                <input type="text" class="form-control" name="cod-product" id="validationCustom03" required>
                <div class="invalid-feedback">
                    Digite o código do produto.
                </div>
            </div>

            <div class="col-md-6">
                <label for="validationCustom05" class="form-label">Preço</label>
                <input type="text" class="form-control" name="price-product" id="validationCustom05" required>
                <div class="invalid-feedback">
                    Digite o preço do produto.
                </div>
            </div>

            <div class="col-md-6">
                <label for="validationCustom05" class="form-label">Descrição do produto</label>
                <textarea type="text" class="form-control" name="describe-product" id="validationCustom05" required></textarea>
                <div class="invalid-feedback">
                    Digite a descrição do produto.
                </div>
            </div>

            <div class="col-md-6">
                <label for="validationCustom05" class="form-label">Foto do produto</label>
                <input type="file" name="file" class="form-control" id="validationCustom05" required>
                <div class="invalid-feedback">
                    Insira a foto do produto.
                </div>

                <img alt="" id="img ">
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Cadastrar produto</button>
            </div>
        </form>
    </main>

    <script src="./js/main.js"></script>
    <script src="../../validations/main.js"></script>
</body>

</html>