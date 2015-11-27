<!DOCTYPE html>
<?php

function Conectar() {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "cursophp";
    try {
        //tenta fazer conexao com o banco de dados
        $pdo = new \PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        //se não conseguir retorna o erro
    } catch (PDOException $ex) {
        //printa o erro de conexao da clase PDO
        echo $ex->getMessage();
    }
    //retorna a variavel $pdo carregada com as infos do banco
    return $pdo;
}
