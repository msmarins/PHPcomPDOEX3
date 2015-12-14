<?php

/**
 * Executar.class [ TIPO ]
 * Decricao     
 * @copyright (c) year, Marcio Marins Marins Produções
 */
require_once '../conexao.php';
class Executar{
    private $id;
    private $acao;
    private $dados;
    
    
    function getId() {
        return $this->id;
    }

    function getAcao() {
        return $this->acao;
    }

    function getDados() {
        return $this->dados;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setAcao($acao) {
        $this->acao = $acao;
    }

    function setDados($dados) {
        $this->dados = $dados;
    }

   
    public function MontaValoresInsert(){
     $atributos = ['login'=>'jose' , 'senha'=>'123'];
     $keys = implode("," , array_keys($atributos));
     $junta = ":" . implode(",:" , array_keys($atributos));
     $separa = explode("," , $junta);
     $campos =  "(" . $keys. ") VALUES (" . $junta . ")"; 
     $combinaAray = array_combine($separa , array_values($atributos));
     $query = "INSERT INTO usuarios " . $campos;
     
     $pdo = Conectar();
     $stmt=$pdo->prepare($query);
     $stmt->execute($combinaAray);
     echo $pdo->lastInsertId();
     var_dump($combinaAray);

    }
    

        
}
$teste = new Executar();
$teste->MontaValoresInsert();