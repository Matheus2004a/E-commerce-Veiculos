<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../dist/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Setup CSS -->
  <link rel="stylesheet" href="../../config/setup.css">
  <!-- Bootstrap-5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="hold-transition login-page">
  <?php
  require __DIR__ . "/../../components/messages-alerts/icons.php";
  ?>

  <header class="login-logo">
    <a href=""><b>Admin</b>LTE</a>
  </header>

  <main class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Faça login para iniciar sua sessão</p>

      <form action="login.php" method="POST">
        <?php
        if (isset($_SESSION['no-authenticated'])) {
          echo $_SESSION['no-authenticated'];
          unset($_SESSION['no-authenticated']);
        }
        ?>
        <fieldset>
          <label for="">E-mail</label>
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Digite seu email" autofocus>
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

        <div class="icheck-primary">
          <input type="checkbox" id="remember">
          <label for="remember">Lembrar - me</label>
          <p>
            Já possui conta? Cadastre - se <a href="../cadastro/index.php" class="text-center">aqui</a>
          </p>
        </div>
        <button type="submit" class="btn btn-primary btn-block mb-3" name="btnLogin" id="btnLogin" value="Enviar">Login</button>
      </form>

      <footer>
        <p>
          <a href="forgot-password.html">Esqueceu sua senha?</a>
        </p>
        <a href="../../index.php">
          <button type="button" class="btn btn-primary">Voltar</button>
        </a>
      </footer>
    </div>
  </main>

  <!-- Kit fontawesome -->
  <script src="https://kit.fontawesome.com/51dc1929bd.js" crossorigin="anonymous"></script>
  <script src="./js/password.js"></script>
  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Scripts Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>