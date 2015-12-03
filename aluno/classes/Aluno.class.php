<?php

/**
 * Aluno.class [ TIPO ]
 * Decricao     
 * @copyright (c) year, Marcio Marins Marins Produções
 */
require_once '../interface/Entidade.interface.php';

class Aluno implements EntidadeInterface {

    private $id;
    private $table = "alunos";
    private $nome;
    private $nota;
    private $inputForm;
    private $campoTabela;
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

    function getNome() {
        return $this->nome;
    }

    function getNota() {
        return $this->nota;
    }

    function getInputForm() {
        return $this->inputForm;
    }

    function getCampoTabela() {
        return $this->campoTabela;
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

    function setInputForm($inputForm) {
        $this->inputForm = $inputForm;
    }

    function setCampoTabela(array $campoTabela) {
        $this->campoTabela = $campoTabela;
    }

    function setDados(array $dados) {
        foreach ($dados as $listar => $valor) {//pega os o nome do index do array assossiativo tipo: "nome" => "marcio" ... retorna nome
            $list [] = $listar . " = :" . $listar;
       }
       $dds = implode(",", $list);
       $this->dados = $dds;
    }

}
//
//$teste = new Aluno();
//$dd = ["nome" => "marcio" , "nota"=>"10"];
//$teste->setDados($dd);
