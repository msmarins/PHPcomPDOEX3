<?php

/**
 * ServiceDb.class [ TIPO ]
 * Decricao     
 * @copyright (c) year, Marcio Marins Marins Produções
 */
class ServiceDb {

    private $db;
    private $entity;

    public function __construct(\PDO $db, EntidadeInterface $entity) {
        // public function __construct(\PDO $db) {

        $this->db = $db;
        $this->entity = $entity;
        //$this->entity = "alunos";
    }

    public function Find($id) {
        $query = "SELECT * FROM {$this->entity->getTable()} WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetch(\PDO :: FETCH_ASSOC); // o fetch não aceita FETCH_CLASS 
    }

    public function Listar($order = null) {
        if ($order) {
            $query = "SELECT * FROM {$this->entity->getTable()} ORDER BY {$order}";
        } else {
            $query = "SELECT * FROM {$this->entity->getTable()}";
        }
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO :: FETCH_CLASS); //Aqui pode ser FETCH_ASSOC a diferença é a forma de retornar o resultado FETCH_CLASS retorna objetos e FETCH_ASSOC retorna um array associativo
    }

    public function Deletar($id) {
        $query = "DELETE FROM {$this->entity->getTable()} WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $id);
        if ($stmt->execute()) {
            return true;
        }
    }

    public function Inserir() {
        $query = "INSERT INTO {$this->entity->getTable()} (nome,nota) VALUES (:nome,:nota)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":nome", $this->entity->getNome());
        $stmt->bindValue(":nota", $this->entity->getNota());
        if ($stmt->execute()) {
            return true;
        }
    }

    public function Alterar() {
        $query = "UPDATE {$this->entity->getTable()} SET {$this->entity->getDados()} {$this->entity->getTermos()}";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":nome", $this->entity->getNome());
        $stmt->bindValue(":nota", $this->entity->getNota());
        if ($stmt->execute()) {
            return true;
        }
    }

}

