<?php
    session_start();
    unset($_SESSION['id_login']);
    unset($_SESSION['nome_login']);
    header('location: ../index.html');
?>