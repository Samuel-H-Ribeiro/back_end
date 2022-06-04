<?php
    include_once("config.php");
    try {
        $conn = new PDO("mysql:host=$host;dbname=" . $nome, $usuario, $senha);
       //  echo "Conexao realizada";
    } catch (PDOException $erro) {
        echo "erro" . $erro->getMessage();
    }
    
?>