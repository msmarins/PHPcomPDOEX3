<?php

/**
 * Cocexao.class.php [ TIPO ]
 * Decricao     
 * @copyright (c) year, Marcio Marins Marins Produções
 */
class Conexao {

    //cria os atributos da classe Conexao 
    protected $servidor;
    protected $usuario;
    protected $senha;
    protected $banco;
    public static $db;

    //metodo construtor
    public function __construct() {
        $this->servidor = "localhost";
        $this->usuario = "root";
        $this->senha = "";
        $this->banco = "cursophp";
    }

    public function Instance() {
        if (!self::$db) {
            self::$db = $this->Conectar();
        }
        return self::$db;
    }

    private function Conectar() {
        try {
            $db = new \PDO("mysql:host={$this->servidor};dbname={$this->banco}", $this->usuario, $this->senha);
        } catch (PDOException $e) {
            echo "Não foi possível estabelecer contato com o banco de dados: Erro: " . $e->getMessage();
        }

        return $db;
    }

}
