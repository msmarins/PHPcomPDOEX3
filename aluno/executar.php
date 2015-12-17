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
        $id = filter_input(INPUT_GET, "id") ? filter_input(INPUT_GET, "id") : NULL;
        $acao = filter_input(INPUT_GET, "acao") ? filter_input(INPUT_GET, "acao") : NULL;
        $classe = filter_input(INPUT_GET, "classe") ? filter_input(INPUT_GET, "classe") : NULL;
        require_once 'interface/Entidade.interface.php';
        require_once 'classes/ServiceDb.class.php';
        require_once 'classes/Aluno.class.php';
        require_once 'classes/Usuario.class.php';
        require_once 'classes/Update.class.php';
        require_once "conexao.php";
        $pdo = Conectar();
        $obj = new $classe();
        switch ($classe) {
            case "Aluno":
                $nome = filter_input(INPUT_POST, "nome") ? filter_input(INPUT_POST, "nome") : NULL;
                $nota = filter_input(INPUT_POST, "nota") ? filter_input(INPUT_POST, "nota") : NULL;
                $obj->setNome($nome);
                $obj->setNota($nota);
                $dds = ["nome" => $obj->getNome(), "nota" => $obj->getNota()];
                $dados = $obj->setDados($dds);
                $exec = new ServiceDb($pdo, $obj);
                $sessao=1;
                break;
            case "Usuario":
                $login = filter_input(INPUT_POST, "login") ? filter_input(INPUT_POST, "login") : NULL;
                $senha = filter_input(INPUT_POST, "senha") ? filter_input(INPUT_POST, "senha") : NULL;
                $obj->setLogin($login);
                $obj->setSenha(md5($senha));
                $dds = ["login" => $obj->getLogin(), "senha" => $obj->getSenha()];
                $dados = $obj->setDados($dds);
                $exec = new ServiceDb($pdo, $obj);
                $sessao=2;
                break;
        }
        switch ($acao) {
            case "Cadastrar":
                $exec->Inserir($obj->getDados());
                break;
            case "Editar":
                $exec->Alterar($id, $obj->getDados());
                break;
            case "Excluir":
                $exec->Deletar($id);
                break;
        }
 
        header("location:index.php?sessao=" . $sessao);
        ?>
    </body>
</html>
