<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>LISTA ALUNOS</title>
    </head>
    <body>
        <h1>LISTA DE ALUNOS</h1>
        <?php
        foreach ($processo->Listar("id ASC") as $listar) {
            echo $listar->nome . " nota: " . $listar->nota . "   - <a href='index.php?id=" . $listar->id . "&acao=editar&sessao=4'> Editar</a> | <a href='index.php?id=" . $listar->id . "&acao=excluir&sessao=2'> Excluir </a> <br />";
        }
        ?>
    </body>
</html>
