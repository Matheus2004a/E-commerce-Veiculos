<?php 
    namespace App\WebSerice;

    class Correios{
        private $codigoEmpresa = '';
        private $senhaEmpresa = '';

        public function __construct($codigoEmpresa = '', $senhaEmpresa = '')
        {
            $this  -> codigoEmpresa = $codigoEmpresa;
            $this -> senhaEmpresa = $senhaEmpresa;
        }

        public function calcularFrete($codigoServico,$cepOrigem,
                                     $cepDestino,$peso,
                                     $formato,$comprimento,
                                     $altura,$largura,
                                     $diametro=0,$maoPropria=false,
                                     $valorDeclarado=0,$avisoRecebimento=false){
            
        }

    }

?>