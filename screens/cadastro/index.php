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
  <link rel="stylesheet" href="../../config/setup.css">
  <link rel="stylesheet" href="./styles/cadastro.css">
  <link rel="stylesheet" href="../../bootstrap-5.1.3-dist/css/bootstrap.min.css">
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
      <form action="cadastrar.php" method="POST" class="needs-validation" novalidate>
        <?php
        if (isset($_SESSION["success-register"])) {
          echo $_SESSION["success-register"];
          unset($_SESSION["success-register"]);
        } elseif (isset($_SESSION["unsuccess-register"])) {
          echo $_SESSION["unsuccess-register"];
          unset($_SESSION["unsuccess-register"]);
        }
        ?>

        <div class="rows">
          <fieldset>
            <label for="validationCustom01" class="form-label">Nome</label>
            <input type="text" class="form-control" id="validationCustom01" name="nome" placeholder="Digite seu nome" required>
            <div class="invalid-feedback">
              Insira seu nome.
            </div>
          </fieldset>

          <fieldset>
            <label for="">CPF</label>
            <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Digite seu cpf" autocomplete="off" maxlength="14" required>
            <div class="invalid-feedback">
              Insira seu cpf.
            </div>
          </fieldset>
        </div>

        <div class="rows">
          <fieldset>
            <label for="validationCustomUsername" class="form-label">Email</label>
            <div class="input-group has-validation">
              <input type="email" class="form-control" name="email" id="validationCustomUsername" aria-describedby="inputGroupPrepend" placeholder="Digite seu email" required>
              <span class="input-group-text" id="inputGroupPrepend">
                <i class="fas fa-envelope"></i>
              </span>
              <div class="invalid-feedback">
                Insira seu email.
              </div>
            </div>
          </fieldset>

          <fieldset>
            <label for="validationCustomUsername" class="form-label">Senha</label>
            <div class="input-group has-validation">
              <input type="password" class="form-control" name="senha" id="validationCustomUsername" aria-describedby="inputGroupPrepend" placeholder="Digite sua senha" required>
              <span class="input-group-text" id="inputGroupPrepend">
                <i class="far fa-eye"></i>
              </span>
              <div class="invalid-feedback">
                Insira sua senha.
              </div>
            </div>
          </fieldset>
        </div>

        <div class="rows">
          <fieldset>
            <label for="">Telefone</label>
            <input type="tel" class="form-control" name="telefone" id="telefone" placeholder="Digite seu telefone" autocomplete="off" maxlength="13" required>
            <div class="invalid-feedback">
              Insira seu telefone.
            </div>
          </fieldset>

          <fieldset>
            <label for="validationCustom04" class="form-label">Categoria de usuário</label>
            <select name="categoria" class="form-select" id="validationCustom04" required>
              <option selected disabled value="">Selecione sua categoria</option>
              <option value="cliente">Cliente</option>
              <option value="mecanico">Mecânico</option>
            </select>
            <div class="invalid-feedback">
              Insira a categoria de usuário.
            </div>
          </fieldset>
        </div>

        <fieldset>
          <label for="">Foto de perfil</label>
          <input type="file" class="form-control" name="file">
        </fieldset>

        <?php
          include "../../components/preview.php"
        ?>

        <button type="submit" class="btn btn-primary btn-block mb-3">Criar conta</button>
      </form>

      <footer>
        <p>Já possui conta? <a href="../login/login.php">Faça login</a></p>
      </footer>
    </div>
  </main>

  <!-- Kit fontawesome -->
  <script src="https://kit.fontawesome.com/51dc1929bd.js" crossorigin="anonymous"></script>
  <script src="../../components/password.js"></script>
  <script src="../../validations/forms.js"></script>
  <script src="../../components/preview-image.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.8/jquery.mask.min.js" integrity="sha512-hAJgR+pK6+s492clbGlnrRnt2J1CJK6kZ82FZy08tm6XG2Xl/ex9oVZLE6Krz+W+Iv4Gsr8U2mGMdh0ckRH61Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $("#telefone").mask("(99) 99999-9999")
    $("#cpf").mask("000.000.000-00")
  </script>
</body>

</html>