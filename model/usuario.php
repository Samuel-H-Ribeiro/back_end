<?php
    include_once("../biblioteca/funcoes_model.php");
    class usuario {
        private $nome;
        public $cpf;
        public $telefone;
        private $id_login;

        public function __construct($nome, $cpf, $telefone, $id_login) {
            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->telefone = $telefone;
            $this->id_login = $id_login;
        }
       
        public function criarUsuario($obj, $conn) {
            $insert = "INSERT INTO `usuario` (`nome`,`cpf`,`id_login`) VALUES (:nome, :cpf, :id_login)";
            $insert = $conn->prepare($insert);
            $insert->execute(array(':nome'=>$obj->nome, ':cpf'=> $obj->cpf, ':id_login'=>$obj->id_login));
        }

        public function criarTelefone($numero, $id_usuario, $conn) {
            $insert = "INSERT INTO `telefone` (`numero`, `id_usuario`) VALUES (:numero, :id_usuario)";
            $insert = $conn->prepare($insert);
            $insert->execute(array(':numero'=>$numero, ':id_usuario'=>$id_usuario));
        }
    }
?>