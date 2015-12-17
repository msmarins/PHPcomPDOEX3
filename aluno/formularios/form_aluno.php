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
        $id = filter_input(INPUT_GET, "id") ? filter_input(INPUT_GET, "id") : NULL;
        $acao = filter_input(INPUT_GET, "acao") ? filter_input(INPUT_GET, "acao") : NULL;
        
        switch ($acao) {
            case "editar_aluno":
                $ident = "&id=" . $id;
                $nome = $processo->Find("id=:id" , $id)["nome"];
                $nota = $processo->Find("id=:id" , $id)["nota"];
                $bt = "EDITAR ALUNO";
                $acao = "Editar";
                break;
            case "excluir_aluno":
                $ident = "&id=" . $id;
                $nome = $processo->Find("id=:id" , $id)["nome"];
                $nota = $processo->Find("id=:id" , $id)["nota"];
                $bt = "DESEJA MESMO EXCLUIR ESTE ALUNO?";
                $acao = "Excluir";
                break;
            case "inserir_aluno":
                $ident = "";
                $nome = "";
                $nota = "";
                $bt = "CADASTRAR NOVO ALUNO ";
                $acao = "Cadastrar";
                break;
        }
        ?>
        <form method="post" action="executar.php?classe=Aluno&acao=<?php echo $acao . $ident; ?>">
            <fieldset>
                <legend><?php echo $bt; ?></legend>
                <label for="nome">Nome</label>
                <input type="text" value="<?php echo $nome; ?>" name = 'nome' id = 'nome' size="30"/><br />
                <label for="nota">Nota</label>
                <input type="text" value="<?php echo $nota; ?>" name = 'nota' id = 'nota' size="30"/><br />
                <input type="submit" value="<?php echo $acao; ?>"/>
            </fieldset>
        </form>
    </body>
</html>
