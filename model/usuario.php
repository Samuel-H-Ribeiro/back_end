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
       
    }
?>