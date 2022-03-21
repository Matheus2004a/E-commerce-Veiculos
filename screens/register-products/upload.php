<?php
session_start();
require __DIR__ . '/../../connection/connection.php';

if (isset($_FILES['file'])) {
    $name_product = $_POST['name-product'];
    $category_product = $_POST['category-product'];
    $cod_product = $_POST['cod-product'];
    $price_product = $_POST['price-product'];
    $desc_product = $_POST['describe-product'];

    $file = $_FILES['file'];

    if ($file['error']) {
        die("Falha ao carregar arquivo");
    }

    $name_file = $file['name'];
    // Gera um id único para o arquivo do produto
    $new_name_file = uniqid();
    // Converte a extensão do arquivo para letras minúsculas
    $extension_file = strtolower(pathinfo($name_file, PATHINFO_EXTENSION));

    if ($extension_file != "jpg" && $extension_file != "png") {
        die("Tipo de arquivo não aceito");
    }

    $path_file = "../../uploads/" . $new_name_file . "." . $extension_file;
    // Faz o upload do arquivo para a pasta de uploads
    $moved_file = move_uploaded_file($file['tmp_name'], $path_file);

    if ($moved_file) {
        var_dump($conn->query("INSERT INTO `tbl_cad_produtos` (`cod_produto`, `nome_arquivo`, `foto_prod`) VALUES ('$cod_product', '$name_file', '$path_file')" or die($conn->error)));
        echo "<div class='alert alert-success d-flex align-items-center'role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
            <div>
              Produto cadastrado com sucesso
            </div>
          </div>";
    } else {
        // echo "Falha ao enviar arquivo";
        echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
            <div>
            Produto não/já cadastrado
            </div>
        </div>";
    }
} else {
    echo "Arquivo não enviado";
}

mysqli_close($conn);
?>