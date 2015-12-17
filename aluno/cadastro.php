<?php
session_start();
if ($_SESSION["login"] == "") {
    header("location:sessoes/admin.php?aviso=2");
}
?>
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
        require_once 'classes/Aluno.class.php';
        require_once 'classes/ServiceDb.class.php';
        require_once 'classes/ServiceDb.class.php';
        require_once "conexao.php";
        $pdo = Conectar();

        $sessao = filter_input(INPUT_GET, "sessao") ? filter_input(INPUT_GET, "sessao") : NULL;

        switch ($sessao) {
            case 5:
                $aluno = new Aluno();
                $processo = new ServiceDb($pdo, $aluno);
                $id = filter_input(INPUT_GET, "id") ? filter_input(INPUT_GET, "id") : NULL;
                $ident = "&id=" . $id;
                $campo1 = "value = '" . $processo->Find($id)["nome"] . "' name = 'nome' id = 'nome'";
                $campo2 = "value = '" . $processo->Find($id)["nota"] . "' name = 'nota' id = 'nota'";
                $lb1 = "nome";
                $lb2 = "nota";
                $bt = "EDITAR ALUNO";
                $acao = "editar";
                break;
            case 3:
                $ident = "";
                $campo1 = "value = '' name = 'nome' id = 'nome'";
                $campo2 = "value = '' name = 'nota' id = 'nota'";
                $lb1 = "nome";
                $lb2 = "nota";
                $bt = "CADASTRAR ALUNO ";
                $acao = "cad_aluno";
                break;
            case 4:
                $ident = "";
                $campo1 = "value = \"\" name = 'login' id = 'login'";
                $campo2 = "value = \"\" name = 'senha' id = 'senha'";
                $lb1 = "login";
                $lb2 = "senha";
                $bt = "CADASTRAR USUÁRIO ";
                $acao = "cad_user";
                break;
            case 7:
                $usuario = new Usuario();
                $processo = new ServiceDb($pdo, $usuario);
                $id = filter_input(INPUT_GET, "id") ? filter_input(INPUT_GET, "id") : NULL;
                $ident = "&id=" . $id;
                $campo1 = "value = '" . $processo->Find($id)["login"] . "' name = 'login' id = 'login'";
                $campo2 = "value = '" . $processo->Find($id)["senha"] . "' name = 'senha' id = 'senha'";
                $lb1 = "login";
                $lb2 = "senha";
                $bt = "EDITAR USUÁRIO";
                $acao = "editar";
                break;
        }
        ?>
        <form method="post" action="executar.php?acao=<?php echo $acao . $ident ?>">
            <fieldset>
                <legend><?php echo $bt; ?></legend>
                <label for="<?php echo $lb1; ?>"><?php echo $lb1; ?></label>
                <input type="text" <?php echo $campo1; ?> size="30"/><br />
                <label for="<?php echo $lb2; ?>"><?php echo $lb2; ?></label>
                <input type="text" <?php echo $campo2; ?> size="30"/><br />
                <input type="submit" value="Enviar"/>
            </fieldset>
        </form>
    </body>
</html>
