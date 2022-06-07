<?php
   // include_once("../biblioteca/funcoes_model.php");
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

            $insert = "INSERT INTO `banda` (`nome`,`integrantes`,`id_estilo`,`email`, `id_user`, `id_cep`, `id_cidade`, `id_estado`, `foto`) 
            VALUES ('$obj->nome', '$obj->qtd_int', $obj->estilo, '$obj->email', $obj->id_user, $obj->cep, $obj->cidade, $obj->estado, '$obj->ft_perfil')";
                //':nome', ':integrantes', ':estilo', ':email', ':usuario', ':cep', ':cidade', ':estado', ':foto')
            $insert = $conn->prepare($insert);
            $insert->execute();
                //array(':nome' => $obj->nome, ':integrantes' => $obj->qtd_int, ':estilo' => $obj->estilo, ':email' => $obj->email,
            //':usuario' => $obj->id_user, ':cep' => $obj->cep, ':cidade' => $obj->cidade, ':estado' => $obj->estado, ':foto' => $obj->ft_perfil));
        }
    }



?>