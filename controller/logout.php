<?php
    session_start();
    unset($_SESSION['id_login']);
    unset($_SESSION['nome_login']);
    unset($_SESSION['id_usuario']);
    header('location: ../index.html');
?>