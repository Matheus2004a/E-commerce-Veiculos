<?php
session_start();
require __DIR__ . '/../../connection/connection.php';

$extensions_allows = ["jpg", "jpeg", "png"];

$name_product = mysqli_real_escape_string($conn, $_POST['name-product']);
$category_product = mysqli_real_escape_string($conn, $_POST['category-product']);
$price_product = mysqli_real_escape_string($conn, $_POST['price-product']);
$price_product = str_replace(".", "", $price_product);
$price_product = str_replace(",", ".", $price_product);
$desc_product = mysqli_real_escape_string($conn, $_POST['describe-product']);
$qtd_product = mysqli_real_escape_string($conn, $_POST['qtd-product']);

if (isset($_FILES['file'])) {
    $file = $_FILES['file'];

    if ($file['error']) {
        die("Falha ao carregar arquivo");
    }

    $name_file = $file['name'];
    // Gera um id único para o arquivo do produto
    $new_name_file = uniqid();
    // Converte a extensão do arquivo para letras minúsculas
    $extension_file = strtolower(pathinfo($name_file, PATHINFO_EXTENSION));
    $local_name_file = $new_name_file . "." . $extension_file;
    $path_file = "../../images/products-images/" . $new_name_file . "." . $extension_file;

    if (in_array($extension_file, $extensions_allows)) {
        $sql ="INSERT INTO `tbl_produtos`(`nome_prod`, `categoria_prod`, `preco_custo_prod`, `desc_prod`, `foto_prod`, `qtd_estoque`) VALUES ('$name_product','$category_product','$price_product','$desc_product','$local_name_file',$qtd_product)";
        register_product($conn, $sql, $file, $path_file);
    } else {
        die("Tipo de extensão inválida.");
    }
} else {
    echo "Arquivo não enviado";
}

function register_product($conn, $sql, $file, $path_file)
{
    if (mysqli_query($conn, $sql) && move_uploaded_file($file['tmp_name'], $path_file)) {
        $_SESSION['register-product'] = "<div class='alert alert-success d-flex align-items-center'role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
            <div>
              Produto cadastrado com sucesso
            </div>
            </div>";
        header("location: index.php");
    } else {
        $_SESSION['no-register-product'] = "<div class='alert alert-danger d-flex align-items-center' role='alert'>
        <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
        <div>
          Produto já cadastrado
        </div>
      </div>";
        header("location: index.php");
    }
}

mysqli_close($conn);
?>