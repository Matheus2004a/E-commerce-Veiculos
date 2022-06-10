<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <link rel="stylesheet" href="../../home_alternativa/assets/css/styles.css">
    <title>Agendamento de troca de peças</title>
</head>

<body onload="setMinDay()">
    <?php
    require "../../connection/connection.php";

    $sql_profile = "SELECT id, nome, telefone, email, foto FROM dados_mecanico WHERE id = $_GET[id_user]";
    $profil_data = mysqli_query($conn, $sql_profile);

    while ($row = mysqli_fetch_assoc($profil_data)) {
        $name = $row['nome'];
        $telefone = $row['telefone'];
        $email = $row['email'];
        $foto = $row['foto'];
    }
    ?>


    <div class="container">
        <?php 
        
        include "../../components/header.php";
        
        ?>
        <div class="nav-left">

            <!-- CONTAINER PERFIL -->
            <div class="perfil">
                <?php
                if (isset($foto)) {
                    echo '<img src="../../images/users/' . $foto . '" alt="img perfil">';
                } else {
                    echo '<img src="../../images/users/default-user.png" alt="img perfil">';
                }
                ?>
                <div class="divNameDesc">
                    <span class="spanName"><?php echo $name; ?></span>
                    <span class="spanDescription"><?php echo $telefone; ?></span>
                </div>
                <button id="btnClosePerfil">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                        <title>Chevron Down</title>
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 184l144 144 144-144" />
                    </svg>
                </button>
            </div>

            <!-- CONTAINER BOTEOS CHAT E CANCEL -->
            <div class="chatCancel">
                <button class="chat">Chat</button>
                <button class="cancel" onclick="location.href='../listService/#'">Cancelar</button>
            </div>

            <!-- CONTAINER DA DESCRIÇÃO E NOME DO SERVIÇO -->
            <?php

            $sql = "SELECT nome_servico, desc_servico, val_servico FROM tbl_servicos WHERE id_servico = $_GET[id_servico];";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                $valor = $row['val_servico'];
                echo '<div class="description">';
                echo     '<span class="nameService">' . $row['nome_servico'] . '</span>';
                echo     '<span class="valService">Valor: R$' . $row['val_servico'] . '</span>';
                echo     '<span class="titleDescription">Descrição</span>';
                echo     '<span class="descriptionService">' . $row['desc_servico'] . '</span>';
                echo '</div>';
            }
            ?>
        </div>
        <!-- FIM DIV CONTAINER LADO ESQUERDO -->

        <!-- DIV CONTAINER LADO DIREITO DA TELA -->
        <div class="nav-right">
            <div class="containerAction">
                <input type="date" id="inputDate" onchange="pickDate(value)">
                <span class="spanHorario">Selecione um horario:</span>

                <?php

                $sql = "SELECT hora_disponivel  FROM tbl_horarios WHERE fk_id_servico = $_GET[id_servico];";
                $result = mysqli_query($conn, $sql);

                echo '<div class="buttonHour">';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<table>
                                    <tbody>
                                        <tr>
                                            <td>
                                            " . '<button value="' . $row['hora_disponivel'] . '" id="btnHora" onclick="pickHour(value)">' . $row['hora_disponivel'] . '</button>' . "
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>";
                }
                echo "</div>";
                ?>
                <hr>
                <span id="spanTitleDetails">Detalhes</span>
                <div class="details">
                    <span>Data: <span id="spanData"></span></span>
                    <span>Hora: <span id="spanHora"></span></span>
                    <span>Valor: <span id="spanValor"><?php echo "$valor"; ?></span></span>

                </div>

                <span class="spanObservations">Observações</span>
                <textarea id="obs" rows="3" placeholder="Digite aqui"></textarea>
                <form <?php echo 'action="scriptResult.php?id_user=' . $_GET['id_user'] . '&id_servico=' . $_GET['id_servico'] . '"'; ?> method="post">
                    <input type="hidden" name="data" id="hiddenData">
                    <input type="hidden" name="hora" id="hiddenHora">
                    <input type="hidden" name="id_user" value="<?php echo $_GET['id_user']; ?>">
                    <input type="hidden" name="id_service" value="<?php echo $_GET['id_servico']; ?>">
                    <input type="hidden" name="observacao" id="hiddenObs">
                    <input type="submit" class="btnConfirm" value="Confirmar" onclick="pickValues(event)">
                </form>
            </div>
        </div>
        <!-- FIM DIV CONTAINER LADO DIREITO -->
    </div>

    <!-- MODAL SE OS DADOS ESTÃO INCORRETOS -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span onclick="closeModal(event)" class="close">&times;</span>
            <p id="p_modal">
            </p>
        </div>

    </div>

    <!-- MODAL STATUS AGENDAMENTO -->
    <div id="myModal" class="modal">

        <div class="modal-content">
            <span onclick="closeModal(event)" class="close">&times;</span>
            <p id="p_modal">
            </p>
        </div>

    </div>

    <?php
    if (isset($_SESSION['status'])) {
        echo '<script>resultCadastro(' . $_SESSION['status'] . ') </script>';
        unset($_SESSION['status']);
    } elseif (isset($_SESSION['error'])) {
        echo '<script>resultCadastro(' . $_SESSION['error'] . ') </script>';
        unset($_SESSION['error']);
    }
    mysqli_close($conn);
    ?>
</body>

</html>