<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <link rel="stylesheet" href="/../E-commerce-Veiculos/home_alternativa/assets/css/main.css">
    <!-- <link rel="stylesheet" href="/../E-commerce-Veiculos/home_alternativa/assets/css/styles.css"> -->
    <title>Cadastro de serviços</title>
</head>

<body>
    <form class="container" action="scriptCadastrar.php" method="POST" id="container" enctype="multipart/form-data">

        <?php
        include "../../components/header.php";
        include "../../connection/connection.php";
        $verificaDadosMecanico = 'SELECT id_mecanico, nome, email, telefone, foto FROM dados_mecanico WHERE id_dados_pessoais = "' . $_SESSION['idLogado'] . '"';
        $realizaConsultaDados = mysqli_query($conn, $verificaDadosMecanico);
        $fetchDados = mysqli_fetch_assoc($realizaConsultaDados);
        $_SESSION['id_mecanico'] = $fetchDados['id_mecanico'];
        ?>

        <div class="nav-top" id="nav-top">
            <div class="content-top">
                <div class="left-content-top">
                    <div class="perfil">
                        <?php 
                        if(isset($_SESSION['image']) && $_SESSION['image'] != null) {
                            echo '<img src="/../E-commerce-veiculos/images/users/' . $_SESSION['image'] . '" alt="">'; 
                        } else {
                            echo "<i class='bx bxs-user-circle icon-user'></i>";
                        }
                         echo '<span class="span-title">' . $fetchDados['nome'] . '</span>' ?>
                    </div>
                    <span class="span-title">Email:</span>
                    <?php echo ' <span class="span-content">' . $fetchDados['email'] . '</span>' ?>
                    <span class="span-title">Telefone</span>
                    <?php echo ' <span class="span-content">' . $fetchDados['telefone'] . '</span>' ?>
                </div>
                <div class="right-content-top">
                    <span class="span-title">Digite o nome do serviço</span>
                    <input type="text" name="nameService" id="nameService" placeholder="Nome do serviço" autocomplete="off">
                    <span class="span-title">Faça uma descrição sobre o serviço</span>
                    <textarea name="descriptionService" id="descriptionService" cols="30" rows="5" placeholder="Descrição do serviço"></textarea>
                </div>
            </div>
        </div>

        <div class="nav-bottom" id="nav-bottom">
            <div class="content-bottom">
                <div class="left-content-bottom">
                    <span class="span-title">Agendar horarios (min 3 horarios)</span>
                    <span class="span-content">Selecione o horario</span>
                    <div class="hour">
                        <input type="time" name="hourService" id="hourService">
                        <button onclick="saveHour(event)">salvar</button>
                    </div>
                    <span class="span-title">Valor do serviço</span>
                    <input type="text" name="valService" id="valService" placeholder="R$">

                    <fieldset>
                        <label for="">Foto do serviço</label>
                        <!-- <input type="file" class="form-control" name="arquivo"> -->
                        <input type="file" name="arquivo" id="imagem" class="form-control">
                    </fieldset>
                    <?php
                    include "../../components/preview.php"
                    ?>
                </div>
                <div class="right-content-bottom">
                    <span class="span-title">Seus horários cadastrados</span>
                    <div class="horarios" id="horarios">
                        <!-- INPUTS GERADOS DINAMICAMENTE NO JS FICAM AQUI -->
                    </div>
                </div>
            </div>
            <input type="hidden" name="horasCadastradas" id="horasCadastradas">
            <input type="submit" value="Cadastrar serviço" onclick="verificarDados(event)">
        </div>
    </form>

    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span onclick="closeModal(event)" class="close">&times;</span>
            <p id="p_modal">
            </p>
        </div>
    </div>

    <?php
    if (isset($_SESSION['status_img'])) {
        if ($_SESSION['status_img'] == 1) {
            echo '<script>resultCadastro(' . $_SESSION['status_img'] . ') </script>';
            unset($_SESSION['status_img']);
        } else if ($_SESSION['status_img'] == 2) {
            echo "<script>resultCadastro('" . $_SESSION['msg_error'] . "') </script>";
            unset($_SESSION['status_img']);
            unset($_SESSION['msg_error']);
        } else {
            echo '<script>resultCadastro("' . $_SESSION['msg_error'] . '") </script>';
            unset($_SESSION['status_img']);
            unset($_SESSION['msg_error']);
        }
    } else {
        unset($_SESSION['msg_error'], $_SESSION['status_img']);
    }
    ?>

    <script src="https://kit.fontawesome.com/51dc1929bd.js" crossorigin="anonymous"></script>
    <script src="../../components/password.js"></script>
    <script src="../../validations/forms.js"></script>
    <script src="../../components/preview-image.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.8/jquery.mask.min.js" integrity="sha512-hAJgR+pK6+s492clbGlnrRnt2J1CJK6kZ82FZy08tm6XG2Xl/ex9oVZLE6Krz+W+Iv4Gsr8U2mGMdh0ckRH61Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        document.querySelector("#uploadPreviewTemplate > div > div > div > div:nth-child(3) > a > button").setAttribute("type", "button")
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.8/jquery.mask.min.js" integrity="sha512-hAJgR+pK6+s492clbGlnrRnt2J1CJK6kZ82FZy08tm6XG2Xl/ex9oVZLE6Krz+W+Iv4Gsr8U2mGMdh0ckRH61Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#valService').mask('000.000,00', {
            reverse: true
        });
    </script>
</body>

</html>