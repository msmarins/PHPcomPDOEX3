
<h1>LISTA DE USUÁRIOS</h1>
<?php
$id = filter_input(INPUT_GET, "id") ? filter_input(INPUT_GET, "id") : NULL;
$acao = filter_input(INPUT_GET, "acao") ? filter_input(INPUT_GET, "acao") : NULL;
require_once 'interface/Entidade.interface.php';
require_once 'classes/ServiceDb.class.php';
require_once 'classes/Usuario.class.php';
require_once 'classes/Update.class.php';
require_once "conexao.php";
$pdo = Conectar();
$usuario = new Usuario();
$exec = new ServiceDb($pdo, $usuario);

foreach ($exec->Listar("id ASC") as $listar) {
    echo $listar->login . " - <a href='index.php?id=" . $listar->id . "&sessao=4&acao=editar_usuario'> Editar</a> | <a href='index.php?id=" . $listar->id . "&acao=excluir_usuario&sessao=4'> Excluir </a> <br />";
}

