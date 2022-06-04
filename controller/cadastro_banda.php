<?php
    session_start();
    include_once("../conexao/conexao.php");
    include_once("../model/usuario.php");
    include_once("../model/banda.php");
    include_once("../biblioteca/sessoes.php");

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $id_login = $_SESSION['id_login'];

    $nome_banda = $_POST['nome_banda'];
    $integrantes = $_POST['qtd_int'];
    $estilo = $_POST['estilo'];
    $foto = $_POST['foto'];
    $email = $_POST['email'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $id_user = 1;

    $usuario = new usuario($nome, $cpf, $telefone, $_SESSION['id_login']);
    
    $cpf_invalido = consulta($usuario->cpf, "cpf", "usuario", $conn);
    $tel_invalido = consulta($usuario->telefone, "numero", "telefone", $conn);

    if ($cpf_invalido == false and $tel_invalido == false) {
        $banda = new banda($nome_banda, $integrantes, $estilo, $email, $id_user, $cep, $cidade, $estado, $foto);

        $email_invalido = consulta($banda->email, "email", "banda", $conn);

        if ($email_invalido == true) {
            validaSessao($email_invalido, "email_invalido", "Email");
        }
    } else {
        validaSessao($cpf_invalido, "cpf_invalido", "CPF");
        validaSessao($tel_invalido, "tel_invalido", "Telefone");
    }
    
    if ($cpf_invalido != false || $tel_invalido != false || $email_invalido != false) {
        if (isset($_SESSION['cpf_invalido']) || $_SESSION['tel_invalido'] || $_SESSION['email_invalido']) {
            header('location: ../view/cadastro_banda.php');
            $_SESSION['nome_usuario'] = $nome;
            $_SESSION['telefone'] = $telefone;
            $_SESSION['cpf'] = $cpf;
            $_SESSION['nome_banda'] = $nome_banda;
            $_SESSION['integrantes'] = $integrantes;
            $_SESSION['estilo'] = $estilo;
            $_SESSION['foto'] = $foto;
            $_SESSION['email'] = $email;
            $_SESSION['cep'] = $cep;
            $_SESSION['cidade'] = $cidade;
            $_SESSION['estado'] = $estado;
        } else "Nenhum dado foi encontrado no banco";
    } 

?>