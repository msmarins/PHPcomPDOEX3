<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/main_style.css" />
    </head>
    <body>
        <?php
        require_once 'interface/Entidade.interface.php';
        require_once 'classes/Usuario.class.php';
        require_once 'classes/ServiceDb.class.php';
        require_once "conexao.php";
        $pdo = Conectar();
        $usuario = new Usuario();
        $processo = new ServiceDb($pdo, $usuario);
        $id = filter_input(INPUT_GET, "id") ? filter_input(INPUT_GET, "id") : NULL;
        $acao = filter_input(INPUT_GET, "acao") ? filter_input(INPUT_GET, "acao") : NULL;

        switch ($acao) {
            case "editar_usuario":
                $ident = "&id=" . $id;
                $login = $processo->Find("id=:id", $id)["login"];
                $senha = $processo->Find("id=:id", $id)["senha"];
                $bt = "EDITAR USUÁRIO";
                $acao = "Editar";
                break;
            case "excluir_usuario":
                $ident = "&id=" . $id;
                $login = $processo->Find("id=:id", $id)["login"];
                $senha = $processo->Find("id=:id", $id)["senha"];
                $bt = "DESEJA MESMO EXCLUIR ESTE USUÁRIO?";
                $acao = "Excluir";
                break;
            case "inserir_usuario":
                $ident = "";
                $login = "";
                $senha = "";
                $bt = "CADASTRAR NOVO USUÁRIO ";
                $acao = "Cadastrar";
                break;
        }
        ?>
        <form method="post" action="executar.php?classe=Usuario&acao=<?php echo $acao . $ident; ?>">
            <fieldset>
                <legend><?php echo $bt; ?></legend>
                <label for="login">Login</label>
                <input type="text" value="<?php echo $login; ?>" name = "login" id = "login" size="30"/><br />
                <label for="senha">Senha</label>
                <input type="text" value="<?php echo $senha; ?>" name = "senha" id = "senha" size="30"/><br />
                <input type="submit" value="<?php echo $acao; ?>"/>
            </fieldset>
        </form>
    </body>
</html>
