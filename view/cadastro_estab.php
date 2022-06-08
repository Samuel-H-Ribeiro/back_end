<?php 

    include_once("../biblioteca/top.php");
    include_once("../biblioteca/sessoes.php");
    session_start();

    if (!isset($_SESSION['id_login'])) {
       $_SESSION['login_necessario'] = "É preciso fazer um login antes de cadastrar uma banda.";
        header('location: logar.php');
    }
?>
    
    <form action="../controller/estab_controller.php" method="post">
        <?php if (!isset($_SESSION['id_usuario'])) {
            echo "
            <label for='nome'>nome: </label> <input type='text' name='nome' id='nome' value='"; exibirSessao('nome_usuario'); echo "' required><br>
            <label for='cpf'>cpf: </label> <input type='text' name='cpf' id='cpf' value='"; exibirSessao('cpf'); echo "' required><br>
            "; exibirSessao('cpf_invalido'); echo"
            <label for='telefone'>telefone: </label> <input type='text' name='telefone' id='telefone' value='"; exibirSessao('telefone'); echo "' required><br>
             "; exibirSessao('tel_invalido');
        }
        ?>

        <label for="nome_estab">Nome: </label> <input type="text" name="nome_estab" id="nome_estab" value="<?php exibirSessao("nome_estab"); ?>" required><br>
        <label for="razao_soc">Razão social: </label> <input type="text" name="razao_social" id="razao_soc" value="<?php exibirSessao("razao"); ?>" required><br>
        <label for="cnpj">cnpj: </label> <input type="text" name="cnpj" id="cnpj" value="<?php exibirSessao("cnpj");?>" required><br>
        <?php exibirSessao("cnpj_invalido");?>
        <label for="foto_perfil">foto perfil</label> <input type="text" name="foto_perfil" id="foto" value="<?php exibirSessao("foto");?>"><br>
        <label for="email">E-mail</label> <input type="text" name="email" id="email" value = "<?php exibirSessao("email"); ?>" required><br>
        <?php  exibirSessao("email_invalido");?>
        <label for="cep">CEP</label> <input type="text" name="cep" id="cep" value = "<?php exibirSessao("cep"); ?>" required><br>
        <label for="cidade">Cidade</label> <input type="text" name="cidade" id="cidade" value= "<?php exibirSessao("cidade"); ?>" required><br>
        <label for="estado">Estado</label> <input type="text" name="estado" id="estado" value = "<?php exibirSessao("estado"); ?>" required><br>
        <label for="logradouro">Logradouro </label> <input type="text" name="logradouro" id="logradouro" value = "<?php exibirSessao("logradouro"); ?>" required><br>
        <label for="bairro">Bairro</label> <input type="text" name="bairro" id="bairro" value = "<?php exibirSessao("bairro"); ?>" required><br>
        <label for="numero">Numero</label> <input type="text" name="numero" id="numero" value = "<?php exibirSessao("numero"); ?>" required><br>
        <label for="complemento">Complemento</label> <input type="text" name="complemento" id="complemento" value = "<?php exibirSessao("complemento"); ?>" ><br>
        <input type="submit"><br>
    </form>
</body>
</html>
