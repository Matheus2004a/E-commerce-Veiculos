<?php


function saveImg($img)
{
    // verifica se foi enviado um arquivo
    if (isset($img['name']) && $img['error'] == 0) {

        $arquivo_tmp = $img['tmp_name'];
        $nome = $img['name'];
        // Pega a extensão
        $extensao = pathinfo($nome, PATHINFO_EXTENSION);

        // Converte a extensão para minúsculo
        $extensao = strtolower($extensao);

        // Somente imagens, .jpg;.jpeg;.gif;.png
        // Aqui eu enfileiro as extensões permitidas e separo por ';'
        // Isso serve apenas para eu poder pesquisar dentro desta String
        if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {
            // Cria um nome único para esta imagem
            // Evita que duplique as imagens no servidor.
            // Evita nomes com acentos, espaços e caracteres não alfanuméricos
            $novoNome = uniqid(time()) . '.' . $extensao;

            // Concatena a pasta com o nome
            $destino = '../../imagens/' . $novoNome;


            // tenta mover o arquivo para o destino
            if (move_uploaded_file($arquivo_tmp, $destino)) {
                $status = 0;
            } else {
                $msg_error = 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.';
                $status = 2;
            }
        } else {
            $msg_error = 'Você poderá enviar apenas arquivos *.jpg;*.jpeg;*.gif;*.png';
            $status = 2;
        }
    } else {
        $msg_error = "Você não enviou nenhuma imagem.";
        $status = 2;
    }
    if (isset($destino)) {
        return array($status, $destino);
    } else {
        return array($status, $msg_error);
    }
}
?>