<?php
session_start();
if ($_SESSION["login"] == "") {
    header("location:admin.php?aviso=2");
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
        $id = filter_input(INPUT_GET, "id") ? filter_input(INPUT_GET, "id") : NULL;
        $acao = filter_input(INPUT_GET, "acao") ? filter_input(INPUT_GET, "acao") : NULL;
        require_once 'interface/Entidade.interface.php';
        require_once 'classes/ServiceDb.class.php';
        require_once 'classes/Aluno.class.php';
        require_once 'classes/Usuario.class.php';
        require_once 'classes/Update.class.php';
        require_once "conexao.php";
        $pdo = Conectar();

        switch ($acao) {
            case "cad_aluno":
                $nome = filter_input(INPUT_POST, "nome") ? filter_input(INPUT_POST, "nome") : NULL;
                $nota = filter_input(INPUT_POST, "nota") ? filter_input(INPUT_POST, "nota") : NULL;
                $aluno = new Aluno();
                $aluno->setNome($nome);
                $aluno->setNota($nota);
                $dds = ["nome" => $aluno->getNome(), "nota" => $aluno->getNota()];
                $dados = $aluno->setDados($dds);
                $exec = new ServiceDb($pdo, $aluno);
                $exec->Inserir($aluno->getDados());
                break;
            case "cad_user":
                $login = filter_input(INPUT_POST, "login") ? filter_input(INPUT_POST, "login") : NULL;
                $senha = filter_input(INPUT_POST, "senha") ? filter_input(INPUT_POST, "senha") : NULL;
                $user = new Usuario();
                $user->setLogin($login);
                $user->setSenha(md5($senha));
                $dds = ["login" => $user->getLogin(), "senha" => $user->getSenha()];
                $dados = $user->setDados($dds);
                $exec = new ServiceDb($pdo, $user);
                $exec->Inserir($user->getDados());
                break;
            case "editar":
                $nome = filter_input(INPUT_POST, "nome") ? filter_input(INPUT_POST, "nome") : NULL;
                $nota = filter_input(INPUT_POST, "nota") ? filter_input(INPUT_POST, "nota") : NULL;
                $aluno = new Aluno();
                $aluno->setNome($nome);
                $aluno->setNota($nota);
                $dds = ["nome" => $aluno->getNome(), "nota" => $aluno->getNota()];
                $dados = $aluno->setDados($dds);
                $exec = new ServiceDb($pdo, $aluno);
                $exec->Alterar($id, $dds);
                break;
        }

        header("location:index.php");
        ?>
    </body>
</html>
