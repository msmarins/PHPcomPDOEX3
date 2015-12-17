
<h1>LISTA DE ALUNOS</h1>
<?php
$busca = filter_input(INPUT_GET, "busca_aluno") ? filter_input(INPUT_GET, "busca_aluno") : NULL;
$id = filter_input(INPUT_GET, "id") ? filter_input(INPUT_GET, "id") : NULL;
$acao = filter_input(INPUT_GET, "acao") ? filter_input(INPUT_GET, "acao") : NULL;
require_once 'interface/Entidade.interface.php';
require_once 'classes/ServiceDb.class.php';
require_once 'classes/Aluno.class.php';
require_once 'classes/Update.class.php';
require_once "conexao.php";
$pdo = Conectar();
$aluno = new Aluno();
$exec = new ServiceDb($pdo, $aluno);
if (!isset($busca)) {
    foreach ($exec->Listar("id ASC") as $listar) {
        echo $listar->nome . ", nota: " . $listar->nota . "   - <a href='index.php?id=" . $listar->id . "&sessao=3&acao=editar_aluno'> Editar</a> | <a href='index.php?id=" . $listar->id . "&acao=excluir_aluno&sessao=3'> Excluir </a> <br />";
    }
} else {
    $atributos = $exec->Find("nome=:nome" , $busca);
    echo $atributos["nome"] . ", nota: " . $atributos ["nota"] . "   - <a href='index.php?id=" . $atributos["id"] . "&sessao=3&acao=editar_aluno'> Editar</a> | <a href='index.php?id=" . $atributos["id"] . "&acao=excluir_aluno&sessao=3'> Excluir </a> <br />";
}
?>
<br /><br />
<form method="get" action="#">
    <label for="busca_aluno">Busca Aluno</label>
    <input type="text" name="busca_aluno" id="busca_aluno"/> 
    <input type="submit" value="buscar" />
</form>
<br /><br />

