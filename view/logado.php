<?php
    session_start();
    include_once('../biblioteca/top.php');

    if (!isset($_SESSION['id_login']) && (!isset($_SESSION['nome_login']))) {
        $_SESSION['login_necessario'];
        header('location: logar.php');
    }
?>

    <h1>Bem vindo a pagina <?php echo $_SESSION['nome_login']; if(isset($_SESSION['id_usuario'])) { echo $_SESSION['id_usuario'];} ?></h1>
    <a href="../view/cadastro_banda.php">Cadastrar Banda</a><br>

    <a href="../controller/logout.php">sair</a><br>

    </body>
    </html>
