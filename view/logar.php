<?php
    session_start();
    include_once("../biblioteca/top.php");
    include_once("../biblioteca/sessoes.php");
?>
     <?php 
        exibirSessao("login_necessario");
        exibirSessao("login_invalido");
        ?>
    <form method="POST" action="../controller/logar_controller.php">
        <label for="email">Email: </label> <input type="text" name="email" id="email" value="<?php exibirSessao("email"); ?>" required><br>
        <label for="senha">Senha:</label><input type="password" name="senha" id="senha" value="<?php exibirSessao("senha"); ?>" required><br>
        <input type="submit" name="Logar" value="Logar"><br>
    </form>
</body>
</html>