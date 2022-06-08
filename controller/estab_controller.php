<?php
    session_start();
    include_once("../conexao/conexao.php");
    include_once("../model/usuario.php");
    include_once("../model/estab.php");
    include_once("../biblioteca/sessoes.php");
    include_once("../biblioteca/funcoes_model.php");

    if (!isset($_SESSION['id_usuario'])) {
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $cpf = $_POST['cpf'];
}

    $id_login = $_SESSION['id_login'];
    $nome_estab = $_POST['nome_estab'];
    $razao_social = $_POST['razao_social'];
    $email = $_POST['email'];
    $cnpj = $_POST['cnpj'];
    $cep = $_POST['cep'];
    $foto_perfil = $_POST['foto_perfil'];
    $numero_endereco = $_POST['numero'];
    $logradouro = $_POST['logradouro'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $complemento = $_POST['complemento'];

    if(!isset($_SESSION['id_usuario'])){
        $usuario = new usuario($nome, $cpf, $telefone, $id_login);
        $cpf_invalido = consulta($usuario->cpf, "cpf", "usuario", $conn);
        $tel_invalido = consulta($usuario->telefone, "numero", "telefone", $conn);
    } else {
        $cpf_invalido = false;
        $tel_invalido = false;
    }

    $email_invalido = consulta($email, "email", "estabelecimento", $conn);
    $cnpj_invalido = consulta($cnpj, "cnpj", "estabelecimento", $conn);

    if ($cpf_invalido == true || $tel_invalido == true || $email_invalido == true || $cnpj_invalido == true) {
        validaSessao($cpf_invalido, "cpf_invalido", "CPF");
        validaSessao($tel_invalido, "tel_invalido", "Telefone"); 
        validaSessao($email_invalido, "email_invalido", "Email");
        validaSessao($cnpj_invalido, "cnpj_invalido", "Cnpj");
        if (isset($_SESSION['cpf_invalido']) || $_SESSION['tel_invalido'] || $_SESSION['email_invalido']) {
            header('location: ../view/cadastro_estab.php');
            if (!isset($_SESSION['id_usuario'])) {
                $_SESSION['nome_usuario'] = $nome;
                $_SESSION['telefone'] = $telefone;
                $_SESSION['cpf'] = $cpf;
            }            

            $_SESSION['nome_estab'] = $nome_estab;
            $_SESSION['razao'] = $razao_social;
            $_SESSION['email'] = $email;
            $_SESSION['cnpj'] = $cnpj;
            $_SESSION['cep'] = $cep;
            $_SESSION['foto'] = $foto_perfil;
            $_SESSION['numero'] = $numero_endereco;
            $_SESSION['logradouro'] = $logradouro;
            $_SESSION['bairro'] = $bairro;
            $_SESSION['cidade'] = $cidade;
            $_SESSION['estado'] = $estado;
            $_SESSION['complemento'] = $complemento;
        }
    }
    else{
        $id_usuario = id("usuario", "id_login", $id_login, $conn);
        if ($id_usuario == false ) {
            $usuario->criarUsuario($usuario, $conn);
            $_SESSION['id_usuario'] = consultaId("usuario", "id_login", $_SESSION['id_login'], $conn);
            $usuario->criarTelefone($usuario->telefone, $_SESSION['id_usuario'], $conn);
        } else { 
        $id_usuario = $id_usuario['id'];
        $_SESSION['id_usuario'] = $id_usuario;
        }
        
        $id_cidade = consultaCidade($cidade, $conn);
        $id_cep = consultaCep($cep, $conn);
        $id_estado = consultaEstado($estado, $conn);
        $id_rua = consultaRua($logradouro, $conn);
        $id_bairro = consultaBairro($bairro, $conn);

        $estabelecimento = new estabelecimento($_SESSION['id_usuario'], $nome_estab, $razao_social, $email, $cnpj, 
        $id_cep, $numero_endereco, $id_rua, $id_bairro, $id_cidade, $id_estado, $foto_perfil, $complemento);

        $estabelecimento->criarEstabelecimento($estabelecimento, $conn);
        header('location: ../view/logado.php');
    }

?>