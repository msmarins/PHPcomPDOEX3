<?php

/**
 * Aluno.class [ TIPO ]
 * Decricao     
 * @copyright (c) year, Marcio Marins Marins Produções
 */
require_once 'interface/Entidade.interface.php';

class Usuario implements EntidadeInterface {

    private $id;
    private $table = "usuarios";
    private $login;
    private $senha;
    private $dados;
    private $termos;

    function getTermos() {
        return $this->termos;
    }

    function setTermos($termos) {
        $this->termos = $termos;
    }

    function getId() {
        return $this->id;
    }

    function getTable() {
        return $this->table;
    }

    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function getDados() {
        return $this->dados;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setDados($dados) {
        $this->dados = $dados;
    }

    function setTable($table) {
        $this->table = $table;
    }

}
