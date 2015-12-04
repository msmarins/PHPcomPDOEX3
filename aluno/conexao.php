<!DOCTYPE html>
<?php

function Conectar() {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "pdo";//banco de dados criano no primeiro ex
    try {
        $pdo = new \PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
    return $pdo;
}
