<?php
    session_start();
    include_once("../conexao/conexao.php");
    include_once("../model/usuario.php");
    include_once("../model/banda.php");
    include_once("../biblioteca/sessoes.php");
    include_once("../biblioteca/funcoes_model.php");

    if (!isset($_SESSION['id_usuario'])) {
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $cpf = $_POST['cpf'];
    }
    
    $id_login = $_SESSION['id_login'];
    $nome_banda = $_POST['nome_banda'];
    $integrantes = $_POST['qtd_int'];
    $estilo = $_POST['estilo'];
    $foto = $_POST['foto'];
    $email = $_POST['email'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    if (!isset($_SESSION['id_usuario'])) {
        $usuario = new usuario($nome, $cpf, $telefone, $id_login);
    }
    
    if (!isset($_SESSION['id_usuario'])) {
    $cpf_invalido = consulta($usuario->cpf, "cpf", "usuario", $conn);
    $tel_invalido = consulta($usuario->telefone, "numero", "telefone", $conn);
    } else {
        $cpf_invalido = false;
        $tel_invalido = false;
    }
    $email_invalido = consulta($email, "email", "banda", $conn);

    if ($cpf_invalido == true || $tel_invalido == true || $email_invalido == true) {
        validaSessao($cpf_invalido, "cpf_invalido", "CPF");
        validaSessao($tel_invalido, "tel_invalido", "Telefone"); 
        validaSessao($email_invalido, "email_invalido", "Email");
        }
    
    if ($cpf_invalido != false || $tel_invalido != false || $email_invalido != false) {
        if (isset($_SESSION['cpf_invalido']) || $_SESSION['tel_invalido'] || $_SESSION['email_invalido']) {
            header('location: ../view/cadastro_banda.php');
            if (!isset($_SESSION['id_usuario'])) {
                $_SESSION['nome_usuario'] = $nome;
                $_SESSION['telefone'] = $telefone;
                $_SESSION['cpf'] = $cpf;
            }
            
            $_SESSION['nome_banda'] = $nome_banda;
            $_SESSION['integrantes'] = $integrantes;
            $_SESSION['estilo'] = $estilo;
            $_SESSION['foto'] = $foto;
            $_SESSION['email'] = $email;
            $_SESSION['cep'] = $cep;
            $_SESSION['cidade'] = $cidade;
            $_SESSION['estado'] = $estado;
        } 
    } 
    else {
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
        $id_estilo = consultaEstilo($estilo, $conn);

        $banda = new banda($nome_banda, $integrantes, $id_estilo, $email, $_SESSION['id_usuario'], $id_cep, $id_cidade, $id_estado, $foto);

        $banda->cadastrarBanda($banda, $conn);
        header('location: ../view/logado.php');
        
    }

?>