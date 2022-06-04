<?php  
    include_once("../biblioteca/top.php");
    include_once("../biblioteca/sessoes.php");
    session_start();

    if (!isset($_SESSION['id_login'])) {
       $_SESSION['login_necessario'] = "É preciso fazer um login antes de cadastrar uma banda.";
        header('location: logar.php');
    }
?>
    
    <form action="../controller/cadastro_banda.php" method="post">
        <label for="nome">nome: </label> <input type="text" name="nome" id="nome" value="<?php exibirSessao("nome_usuario"); ?>"required><br>
        <label for="cpf">cpf: </label> <input type="text" name="cpf" id="cpf" value="<?php exibirSessao("cpf"); ?>" required><br>
        <?php exibirSessao("cpf_invalido");?>
        <label for="telefone">telefone: </label> <input type="text" name="telefone" id="telefone" value="<?php exibirSessao("telefone");?>"required><br>
        <?php exibirSessao("tel_invalido");?>
        <label for="nome_banda">nome: </label> <input type="text" name="nome_banda" id="nome_banda" value="<?php exibirSessao("nome_banda"); ?>" required><br>
        <label for="qtd_int">qtd_int: </label> <input type="text" name="qtd_int" id="qtd_int" value="<?php exibirSessao("integrantes"); ?>" required><br>
        <label for="estilo">estilo: </label> <input type="text" name="estilo" id="estilo" value=" <?php exibirSessao("estilo"); ?>" required><br>
        <label for="foto_perfil">foto perfil</label> <input type="text" name="foto" id="foto" value=" <?php exibirSessao("foto"); ?>"><br>
        <label for="email">E-mail</label> <input type="text" name="email" id="email" value = "<?php exibirSessao("email"); ?>" required><br>
        <?php  exibirSessao("email_invalido");?>
        <label for="cep">CEP</label> <input type="text" name="cep" id="cep" value = "<?php exibirSessao("cep"); ?>" required><br>
        <label for="cidade">Cidade</label> <input type="text" name="cidade" id="cidade" value= "<?php exibirSessao("cidade"); ?>" required><br>
        <label for="estado">Estado</label> <input type="text" name="estado" id="estado" value = "<?php exibirSessao("estado"); ?>" required><br>
        <input type="submit"><br>
    </form>
</body>
</html>