<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Document</title>
</head>

<body onload="setMinDay()">
    <?php
    include "../../connection/connection.php";
    ?>
    <div class="container">
        <!-- DIV CONTAINER LADO ESQUERDO DA TELA -->
        <div class="header">header</div>
        <div class="nav-left">

            <!-- CONTAINER PERFIL -->
            <div class="perfil">
                <img src="./assets/euPerfil.jpg" alt="img perfil">
                <div class="divNameDesc">
                    <span class="spanName">Talison Brendon</span>
                    <span class="spanDescription">Mecanico formado a 7 anos pelo senai</span>
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
                <button class="cancel">Cancelar</button>
            </div>

            <!-- CONTAINER DA DESCRIÇÃO E NOME DO SERVIÇO -->
            <?php

            $sql = "select nome_servico, desc_servico, val_servico from tbl_servicos where id_servico = 1;";
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


                <?php

                $sql = "select hora_disponivel  from tbl_horarios_servicos where fk_id_servico = 1;";
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
                <form action="scriptResult.php" method="post">
                    <input type="hidden" name="data" id="hiddenData">
                    <input type="hidden" name="hora" id="hiddenHora">
                    <input type="hidden" name="observacao" id="hiddenObs">
                    <input type="submit" class="btnConfirm" value="Confirmar" onclick="pickValues()">
                </form>
            </div>
        </div>
        <!-- FIM DIV CONTAINER LADO DIREITO -->
    </div>
    <?php
    mysqli_close($conn);
    ?>
</body>

</html>