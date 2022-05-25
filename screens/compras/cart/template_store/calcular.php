<?php
    require __DIR__.'/../../../../vendor/autoload.php';
    use \App\WebSerice\Correios;

    $obCorreios = new Correios();

    $codigoServico;
    $cepOrigem;
    $cepDestino;
    $peso;
    $formato;
    $comprimento;
    $altura;
    $largura;
    $diametro=0;
    $maoPropria=false;
    $valorDeclarado=0;
    $avisoRecebimento=false;

    $frete = $obCorreios -> calcularFrete();
?>