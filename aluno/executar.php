<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/main_style.css" />
    </head>
    <body>
        <?php
        $id = filter_input(INPUT_GET, "id") ? filter_input(INPUT_GET, "id") : NULL;
        $acao = filter_input(INPUT_GET, "acao") ? filter_input(INPUT_GET, "acao") : NULL;
        $nome = filter_input(INPUT_POST, "nome") ? filter_input(INPUT_POST, "nome") : NULL;
        $nota = filter_input(INPUT_POST, "nota") ? filter_input(INPUT_POST, "nota") : NULL;
        require_once '../interface/Entidade.interface.php';
        require_once '../classes/ServiceDb.class.php';
        require_once '../classes/Aluno.class.php';
        require_once "conexao.php";
        $pdo = Conectar();
        $aluno = new Aluno();
        $aluno->setId($id);
        $aluno->setTable("alunos");
        $aluno->setNome($nome);
        $aluno->setNota($nota);
        $dds = ["nome" => $aluno->getNome() , "nota" => $aluno->getNota()];
        $aluno->setDados($dds);
        $aluno->setTermos("WHERE id = $id");
        $exec = new ServiceDb($pdo, $aluno);
        switch ($acao) {
            case "cadastrar":
                $exec->Inserir();
                break;
            case "editar":
                $exec->Alterar();
                break;
        }
        header("location:index.php");
        ?>
    </body>
</html>
