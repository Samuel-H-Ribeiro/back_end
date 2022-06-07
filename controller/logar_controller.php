<?php
    session_start();
    include_once("../conexao/conexao.php");
    include_once("../model/login_model.php");
    include_once("../biblioteca/sessoes.php");

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nome = "";

    $login = new login($nome, $email, $senha);

    $id_login = $login->logar($login, $conn);

    if ($id_login != false) {
        $_SESSION["id_login"] = $id_login['id'];
        criarSessao("nome_login", $id_login['nome']); 
        $id_usuario = consultaId("usuario", "id_login", $_SESSION['id_login'], $conn); 
        if ($id_usuario != false) {
            if ($id_usuario > 0) {
                $_SESSION['id_usuario'] = $id_usuario;
            }
        }
        header('location: ../view/logado.php');
    } else {
        criarSessao("login_invalido", "Usuario ou senha invalidos");
        criarSessao("email", $email);
        criarSessao("senha", $senha);
        header('location: ../view/logar.php');
    }
    
?> 