<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration Page</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
  <!-- Bootstrap-5 -->
  <link rel="stylesheet" href="./styles/cadastro.css">
  <link rel="stylesheet" href="../../config/setup.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="hold-transition register-page">
  <?php
  require __DIR__ . "/../../components/messages-alerts/icons.php";
  ?>
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <main class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Crie sua conta</p>
      <form action="cadastrar.php" method="post">
        <?php
        if (isset($_SESSION["success-register"])) {
          echo $_SESSION["success-register"];
          unset($_SESSION["success-register"]);
        } else if (isset($_SESSION["unsuccess-register"])) {
          echo $_SESSION["unsuccess-register"];
          unset($_SESSION["unsuccess-register"]);
        }
        ?>

        <fieldset>
          <label for="">Nome completo</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="nome-completo" placeholder="Digite seu nome completo" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
        </fieldset>

        <fieldset>
          <label for="">E-mail</label>
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Digite seu email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
        </fieldset>

        <fieldset>
          <label for="">Senha</label>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="senha" placeholder="Digite sua senha">
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="far fa-eye"></i>
              </div>
            </div>
          </div>
        </fieldset>

        <fieldset>
          <label for="">Categoria de usuário</label>
          <select class="form-select mb-3" name="categoria" aria-label="Default select example">
            <option selected>Selecione sua categoria</option>
            <option value="Mecânico">Mecânico</option>
            <option value="Fornecedor">Fornecedor</option>
            <option value="Cliente">Cliente</option>
          </select>
        </fieldset>

        <div class="icheck-primary mb-3">
          <input type="checkbox" id="agreeTerms" name="terms" value="agree">
          <label for="agreeTerms">
            Eu concordo com os <a href="#">termos</a>
          </label>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Criar conta</button>
      </form>

      <div class="social-auth-links text-center">
        <p>OR</p>
        <button type="button" class="btn btn-block btn-primary">
          <a href=""></a>
          <i class="fab fa-facebook mr-2"></i>
          Continuar com Facebook
        </button>
        <button type="button" class="btn btn-block btn-danger">
          <a href=""></a>
          <i class="fab fa-google-plus mr-2"></i>
          Continuar com Google+
        </button>
      </div>
      <footer>
        <p>Já possui conta? <a href="../login/login.php">Faça login</a></p>
      </footer>
    </div>
  </main>

  <!-- Kit fontawesome -->
  <script src="https://kit.fontawesome.com/51dc1929bd.js" crossorigin="anonymous"></script>
  <script src="./js/password.js"></script>
  <!-- AdminLTE App -->
</body>

</html>