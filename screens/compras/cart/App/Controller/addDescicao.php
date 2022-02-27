<?php

/**
 * Arquivo que vai adicionar todos os produtos selecionados pelo cliente no carrinho;
 * Primeiramente é verificado se o cliente está logado;
 * Caso esteja, recuperamos o cpf do usuario logado, e armazenamos as infomações do produto selecionado no banco
 */

session_start();
include_once '../../DataBase/connection.php';
include_once 'ClienteController.php';

$user = new ClienteController();
$result = $user->isLoggedIn();

if($result == true){
    $produto = $_GET['produto'];
    $conexao = new Conexao();
    $conexao = $conexao->conexao();
    //$stmt = $conexao->prepare('SELECT idcarrinho FROM carrinho WHERE carrinho.cliente_cpf ="'.$_SESSION["user_cpf"].'";');
    $stmt->execute();
    $resultado = $stmt->fetch();
    $qts = 1;
    if($resultado == true){
        $stmt = $conexao->prepare("INSERT INTO descricaoProd(produto_id_prod, produto_idproduto, quantidade) VALUES(:carrinho, :produto, :quantidade);");
        $stmt->bindParam(':carrinho', $resultado[0]);
        $stmt->bindParam(':produto', $produto);
        $stmt->bindParam(':quantidade', $qts);
        $stmt->execute();
        $stmt = null;    
    }
}
    ?>