<?php

/**
 * Autenticar.Class [ TIPO ]
 * Decricao     
 * @copyright (c) year, Marcio Marins Marins Produções
 */


class Autenticar {

    private $db;
    private $login;
    private $senha;

    public function __construct(\PDO $pdo) {
        $this->db = $pdo;
    }

    public function getLogin() {
        
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getSenha() {
        
    }

    public function setSenha($senha) {
        $this->senha = md5($senha);
    }

    public function Logar() {
        $query = "SELECT * FROM  usuarios WHERE login =:login AND senha =:senha";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":login", $this->login, PDO::PARAM_STR);
        $stmt->bindParam(":senha", $this->senha, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() <= 0) {
            header("Location:admin.php?aviso=1");
        } else {
            session_start();
            $_SESSION["login"] = $this->login;
            header("Location:index.php");
        }
    }

}
