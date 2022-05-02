<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../../dist/css/index.css">
</head>

<body>
    <a href="#modalEnquete"></a>
    <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Open Modal</button>
    <div id="modalEnquete" class="modal-Enquete">

        <div id="id01" class="w3-modal">
            <div class="w3-modal-content">
                <div class="w3-container">
                    <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                    <form action="../../functions/InserirEnquete.php" method="post">
                        <h4>Digite sua sugestão para melhoria do sistema</h4>
                        <div class="flex-container">
                            <div class="textArea_Descricao">
                                <textarea name="descricao_sistem" id="descricao_sistema" cols="30" rows="10" placeholder=""></textarea>
                            </div>
                            <div class="radioAvaliacao">

                                <p class="radio_cont">Bom</p>
                                <input type="radio" name="radio_avaliacao" id="Bom" value="1" class="radio_cont">
                                <p class="radio_cont">Médio</p>
                                <input type="radio" name="radio_avaliacao" id="Medio" value="2" class="radio_cont">
                                <p class="radio_cont">Ruim</p>
                                <input type="radio" name="radio_avaliacao" id="Ruim" value="3" class="radio_cont">

                            </div>

                        </div>
                        <button type="submit" class="btn-enquete"> Responda </button>
                    </form>
                    <div class="resultado">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
</body>

</html>