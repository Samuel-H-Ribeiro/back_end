<?php 
    function criarSessao($campo, $mensagem) {
        $_SESSION["$campo"] = "$mensagem";
    }

    function exibirSessao($campo) {
        if (isset($_SESSION["$campo"])) {
            echo $_SESSION["$campo"];
            unset($_SESSION["$campo"]);
        }  
    }






    // ----------------------------------------------------------------------------------------------------------------------------//

    function validaSessao($invalido, $nome_sessao, $campo) {
        if ($invalido == true) {
            $_SESSION["$nome_sessao"] = "$campo já cadastrado no sistema";
        }
    }


    function validacaoConsulta($ret, $valor, $campo) {
        $invalido = false;
        if ($ret != false) {
            if($ret["$valor"] == $campo) {
                $invalido = true;
            }
        }
        return $invalido;
    }
?>