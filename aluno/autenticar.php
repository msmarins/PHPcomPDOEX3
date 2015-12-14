<?php

require_once 'classes/Autenticar.class.php';
require_once "conexao.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $login = trim(filter_input(INPUT_POST, "login"));
    $senha = trim(filter_input(INPUT_POST, "senha"));

    if (!isset($login) || !isset($senha)) {
        header("location=admin.php?aviso=1");
        die;
    } else {
        $pdo = Conectar();
        $logar = new Autenticar($pdo);
        $logar->setLogin($login);
        $logar->setSenha($senha);
        $logar->Logar();
    }
}
