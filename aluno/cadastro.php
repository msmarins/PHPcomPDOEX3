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
        $aluno = new Aluno();
        $processo = new ServiceDb($pdo, $aluno);

        $acao = filter_input(INPUT_GET, "acao") ? filter_input(INPUT_GET, "acao") : NULL;

        switch ($acao) {
            case "editar":
                $id = filter_input(INPUT_GET, "id") ? filter_input(INPUT_GET, "id") : NULL;
                $ident = "&id=" . $id;
                $nome = $processo->Find($id)["nome"];
                $nota = $processo->Find($id)["nota"];
                $bt = "EDITAR";
                break;
            case NULL:
                $bt = "CADASTRAR";
                $ident = "";
                $nome = "";
                $nota = "";
                $acao = "cadastrar";
                break;
        }
        ?>
        <form method="post" action="executar.php?acao=<?php echo $acao . $ident ?>">
            <fieldset>
                <legend><?php echo $bt; ?> ALUNO</legend>
                <label for="nome">NOME</label>
                <input type="text" value="<?php echo $nome; ?>" name="nome" id="nome" size="30"/><br />
                <label for="nota">NOTA</label>
                <input type="text" value="<?php echo $nota; ?>" name="nota" id="nota" size="30"/><br />
                <input type="submit" value="Enviar"/>
            </fieldset>
        </form>
    </body>
</html>
