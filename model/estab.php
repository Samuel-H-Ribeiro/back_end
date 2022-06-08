<?php
    class estabelecimento{
        private $id_usuario, $nome_estab, $razao_social, $cnpj, $cep, $numero, $logradouro, $bairro, $id_cidade, $id_estado;
        public $email;
        private ?string $foto_perfil, $complemento; 

        public function __construct($id_usuario, $nome_estab, $razao_social, $email, $cnpj, $cep, $numero,
        $logradouro, $bairro, $id_cidade, $id_estado, ?string $foto_perfil, ?string $complemento){
        $this->id_usuario = $id_usuario;
        $this->nome_estab = $nome_estab;
        $this->razao_social = $razao_social;
        $this->email = $email;
        $this->cnpj = $cnpj;
        $this->cep = $cep;
        $this->numero = $numero;
        $this->logradouro = $logradouro;
        $this->bairro = $bairro;
        $this->id_cidade = $id_cidade;
        $this->id_estado = $id_estado;
        $this->foto_perfil = $foto_perfil;
        $this->complemento = $complemento;
        }

        public function criarEstabelecimento($obj, $conn){
            $insert = "INSERT INTO `estabelecimento` (`id_usuario`, `nome`, `razao_soc`, `email`, `cnpj`, `cep`, `num_end`,`id_rua`, `id_bairro`,
            `id_cidade`, `id_estado`, `complemento`, `foto_perfil`) VALUES ($obj->id_usuario, '$obj->nome_estab', '$obj->razao_social', '$obj->email',
            '$obj->cnpj', '$obj->cep', '$obj->numero', '$obj->logradouro', '$obj->bairro', $obj->id_cidade, $obj->id_estado, '$obj->complemento',
            '$obj->foto_perfil')";
            $insert = $conn->prepare($insert);
            $insert->execute();
        }
    }

?>