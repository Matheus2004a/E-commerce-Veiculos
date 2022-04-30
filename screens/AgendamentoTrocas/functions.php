<?php


    function success($data, $hora) {
        
        echo "<span>Serviço agendado com sucesso no dia: ".inverteData($data)." as $hora</span>";
    }

    


    function inverteData($data){
        if(count(explode("-",$data)) > 1){
            return implode("/",array_reverse(explode("-",$data)));
        }
    }

?>