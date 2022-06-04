<?php
    include_once("../biblioteca/funcoes_model.php");
    class banda{
        private $nome, $qtd_int, $estilo, $id_user, $cep, $cidade, $estado;
        public $email;
        private ?string $ft_perfil; 
    
        public function __construct($nome, $qtd_int, $estilo, $email, $id_user, $cep, $cidade, $estado,
        ?string $ft_perfil) {
            $this->nome = $nome;
            $this->qtd_int = $qtd_int;
            $this->estilo = $estilo;
            $this->email = $email;
            $this->id_user = $id_user;
            $this->cep = $cep;
            $this->cidade = $cidade;
            $this->estado = $estado;
            $this->ft_perfil = $ft_perfil;
        }
    
        public function cadastrarBanda($obj, $conn){
            $select = "SELECT email FROM banda WHERE email LIKE '$obj->email'";
            
        }
    }



?>