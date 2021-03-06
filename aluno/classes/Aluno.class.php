<?php

/**
 * Aluno.class [ TIPO ]
 * Decricao     
 * @copyright (c) year, Marcio Marins Marins Produções
 */
require_once 'interface/Entidade.interface.php';

class Aluno implements EntidadeInterface {

    private $id;
    private $table = "alunos";
    private $nome;
    private $nota;
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

    function getNome() {
        return $this->nome;
    }

    function getNota() {
        return $this->nota;
    }

    function getDados() {
        return $this->dados;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTable($table) {
        $this->table = $table;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setNota($nota) {
        $this->nota = $nota;
    }

    function setDados($dados) {
        $this->dados = $dados;
    }

}
