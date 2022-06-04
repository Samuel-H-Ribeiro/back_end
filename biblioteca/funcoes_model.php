<?php 

function consulta($valor, $campo, $tabela, $conn) {
    $select = "SELECT $campo FROM $tabela WHERE $campo LIKE '$valor'";
    // $select = "SELECT :campo FROM :tabela WHERE :campo LIKE ':valor'";
    $result = $conn->prepare($select);
    $result-> execute();
        //array(':valor'=> $valor, ':campo'=> $campo, ':tabela'=> $tabela));
    $ret_result = $result->fetch(PDO::FETCH_ASSOC);
    return $ret_result;
}

function retornaDados($select, $conn) {
    $result = $conn->prepare($select);
    $result-> execute();
    $ret_result = $result->fetch(PDO::FETCH_ASSOC);
    return $ret_result;
}

function validacao($ret, $valor, $campo) {
    $invalido = false;
    if ($ret != false) {
        if($ret["$valor"] == $campo) {
            $invalido = true;
        }
    }
    return $invalido;
}

// function consulta($valor, $campo, $tabela, $conn) {
//     array(":valor" => $valor, ":campo"=> $campo, ":tabela"=> $tabela);
//     $select = "SELECT :campo FROM :tabela WHERE :campo = ':valor'";
//     $retorno = retornaDados($select, $conn);
//     $invalido = validacao($retorno, "cpf", $valor);
//     return $invalido;
// }

function retornaCidade($cidade, $conn){
    $select = "SELECT id FROM cidades WHERE cidade LIKE ':cidade'";
    
}

function consultaId($campo, $tabela, $valor, $conn){
    $select = "SELECT id FROM :tabela WHERE :campo LIKE ':valor'";
    $result = $conn->prepare($select);
    $result-> execute(array(':tabela' => $tabela, ':campo' => $campo, ':valor' => $valor));
    $id = $result->fetch(PDO::FETCH_ASSOC);
    return $id['id'];
}

function select_insert($campo, $tabela, $valor, $conn){
    $id = consultaId($campo, $tabela, $valor, $conn);
    if($id == false){
       $insert = "INSERT INTO `:tabela` (`:campo`) values (':valor')";
        $result = $conn->prepare($insert);
        $result-> execute(array(':tabela' => $tabela, ':campo' => $campo, ':valor' => $valor));
        $id = $result->fetch(PDO::FETCH_ASSOC);
        $id = $id['id'];
    }
    return $id['id'];
}

?>