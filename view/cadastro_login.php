<?php
    session_start();
    include_once("../biblioteca/top.php");
    include_once("../biblioteca/sessoes.php");
    
?>
    <?php exibirSessao("email_invalido");?>
    <form method="POST" action="../controller/cadastrar_login.php">
        <label for="nome">Nome: </label> <input type="text" name="nome" id="nome" value="<?php exibirSessao("f_nome")?>" required><br>
        <label for="email">Email: </label> <input type="text" name="email" id="email" value="<?php exibirSessao("f_email") ?>" required><br>
        <label for="senha">Senha:</label><input type="password" name="senha" id="senha" value="<?php exibirSessao("f_senha") ?>" required><br>
        <input type="submit" name="cadastrar" value="cadastrar"><br>
    </form>
</body>
</html>