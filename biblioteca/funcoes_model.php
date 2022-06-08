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
    $select = "SELECT id FROM cidades WHERE cidade LIKE :cidade";
    $result = $conn->prepare($select);
    $result->execute(array(':cidade' => $cidade));

}

function consultaId($tabela, $campo, $valor, $conn){
    $select = "SELECT id FROM $tabela WHERE $campo LIKE '$valor'";
    $result = $conn->prepare($select);
    $result->execute();
    $id = $result->fetch(PDO::FETCH_ASSOC);
    return $id['id'];
}

function select_insert($tabela, $campo, $valor, $conn){
    $select = "SELECT id FROM $tabela WHERE $campo = '$valor'";
   // $select = "SELECT id FROM :tabela WHERE :campo LIKE :valor";
    $result = $conn->prepare($select);
    $result->execute();
        //array(':tabela' =>$tabela, ':campo' =>$campo, ':valor' =>$valor));
    $id = $result->fetch(PDO::FETCH_ASSOC);

    if($id == false){
        $insert = "INSERT INTO `$tabela` (`$campo`) VALUES ('$valor')";
        //$insert = "INSERT INTO `:tabela` (`:campo`) VALUES (:valor)";
        $result = $conn->prepare($insert);
        $result-> execute();
            //array(':tabela' =>$tabela, ':campo' =>$campo, ':valor' =>$valor));
        $id = consultaId($tabela, $campo, $valor, $conn);
    }
    return $id['id'];
}

    function consultaCidade($cidade, $conn) {
        $select = "SELECT id FROM cidades WHERE cidade LIKE '$cidade'";
        $select = $conn->prepare($select);
        $select ->execute();
        $id = $select->fetch(PDO::FETCH_ASSOC);

        if ($id == false) {
            $insert = "INSERT INTO `cidades` (`cidade`) VALUES ('$cidade')";
            $insert = $conn->prepare($insert);
            $insert->execute();
            $select = "SELECT id FROM cidades WHERE cidade LIKE '$cidade'";
            $select = $conn->prepare($select);
            $select ->execute();
            $id = $select->fetch(PDO::FETCH_ASSOC);    
        }
        return $id['id'];
    }

    function consultaEstado($estado, $conn) {
        $select = "SELECT id FROM estados WHERE estado LIKE '$estado'";
        $select = $conn->prepare($select);
        $select ->execute();
        $id = $select->fetch(PDO::FETCH_ASSOC);

        if ($id == false) {
            $insert = "INSERT INTO `estados` (`estado`) VALUES ('$estado')";
            $insert = $conn->prepare($insert);
            $insert->execute();
            $select = "SELECT id FROM estados WHERE estado LIKE '$estado'";
            $select = $conn->prepare($select);
            $select ->execute();
            $id = $select->fetch(PDO::FETCH_ASSOC);    
        }
        return $id['id'];
    }

    function consultaCep($cep, $conn) {
        $select = "SELECT id FROM ceps WHERE cep LIKE '$cep'";
        $select = $conn->prepare($select);
        $select ->execute();
        $id = $select->fetch(PDO::FETCH_ASSOC);

        if ($id == false) {
            $insert = "INSERT INTO `ceps` (`cep`) VALUES ('$cep')";
            $insert = $conn->prepare($insert);
            $insert->execute();
            $select = "SELECT id FROM ceps WHERE cep LIKE '$cep'";
            $select = $conn->prepare($select);
            $select ->execute();
            $id = $select->fetch(PDO::FETCH_ASSOC);    
        }
        return $id['id'];
    }

    function consultaEstilo($estilo, $conn) {
        $select = "SELECT id FROM estilos WHERE estilo LIKE '$estilo'";
        $select = $conn->prepare($select);
        $select ->execute();
        $id = $select->fetch(PDO::FETCH_ASSOC);

        if ($id == false) {
            $insert = "INSERT INTO `estilos` (`estilo`) VALUES ('$estilo')";
            $insert = $conn->prepare($insert);
            $insert->execute();
            $select = "SELECT id FROM estilos WHERE estilo LIKE '$estilo'";
            $select = $conn->prepare($select);
            $select ->execute();
            $id = $select->fetch(PDO::FETCH_ASSOC);    
        }
        return $id['id'];
    }

    function id ($tabela, $campo, $valor, $conn) {
        $select = "SELECT id FROM $tabela WHERE $campo LIKE '$valor'";
        $select = $conn->prepare($select);
        $select ->execute();
        $id = $select->fetch(PDO::FETCH_ASSOC);

        return $id;
    }

    function consultaRua($rua, $conn) {
        $select = "SELECT id FROM logradouro WHERE rua LIKE '$rua'";
        $select = $conn->prepare($select);
        $select ->execute();
        $id = $select->fetch(PDO::FETCH_ASSOC);

        if ($id == false) {
            $insert = "INSERT INTO `logradouro` (`rua`) VALUES ('$rua')";
            $insert = $conn->prepare($insert);
            $insert->execute();
            $select = "SELECT id FROM logradouro WHERE rua LIKE '$rua'";
            $select = $conn->prepare($select);
            $select ->execute();
            $id = $select->fetch(PDO::FETCH_ASSOC);    
        }
        return $id['id'];
    }

    function consultaBairro($bairro, $conn) {
        $select = "SELECT id FROM bairros WHERE bairro LIKE '$bairro'";
        $select = $conn->prepare($select);
        $select ->execute();
        $id = $select->fetch(PDO::FETCH_ASSOC);

        if ($id == false) {
            $insert = "INSERT INTO `bairros` (`bairro`) VALUES ('$bairro')";
            $insert = $conn->prepare($insert);
            $insert->execute();
            $select = "SELECT id FROM bairros WHERE bairro LIKE '$bairro'";
            $select = $conn->prepare($select);
            $select ->execute();
            $id = $select->fetch(PDO::FETCH_ASSOC);    
        }
        return $id['id'];
    }

?>