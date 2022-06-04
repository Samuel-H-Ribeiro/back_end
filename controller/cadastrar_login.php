<?php
    session_start();
    include_once("../conexao/conexao.php");
    include_once("../model/login_model.php");
    include_once("../biblioteca/sessoes.php");

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $login = new login($nome, $email, $senha);

    $invalido = $login->cadastroLogin($login, $conn);
    if ($invalido == true) {
        criarSessao("email_invalido", "Email já cadastrado");
        criarSessao("f_nome", $nome);
        criarSessao("f_email", $email);
        criarSessao("f_senha", $senha);
        header('location: ../view/cadastro_login.php');
    } else {
        header('location: ../view/logar.php');
    }
?>