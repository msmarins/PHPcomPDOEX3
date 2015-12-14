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
        $this->db = $db;
        $this->entity = $entity;
    }

    public function Find($id) {
        $query = "SELECT * FROM {$this->entity->getTable()} WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetch(\PDO :: FETCH_ASSOC); // o fetch não aceita FETCH_CLASS 
    }

    //alterado pel otutor
    public function Listar($order = null) {
        if ($order) {
            $query = "SELECT * FROM {$this->entity->getTable()} ORDER BY {$order}";
        } else {
            $query = "SELECT * FROM {$this->entity->getTable()}";
        }
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function Deletar($id) {
        $query = "DELETE FROM {$this->entity->getTable()} WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $id);
        if ($stmt->execute()) {
            return true;
        }
    }

    public function Inserir($atributos) {
        $keys = implode(",", array_keys($atributos));
        $junta = ":" . implode(",:", array_keys($atributos));
        $separa = explode(",", $junta);
        $campos = "(" . $keys . ") VALUES (" . $junta . ")";
        $combinaAray = array_combine($separa, array_values($atributos));
        $query = "INSERT INTO {$this->entity->getTable()}" . $campos;
        $stmt = $this->db->prepare($query);

        if ($stmt->execute($combinaAray)) {
            echo "Os dados foram inseridos com sucesso e o ID de registro é " . $this->db->lastInsertId();
        } else {
            echo "Tivemos problemas ao inserir o registro, por favor, tentde novamente!";
        }
    }

//    public function Inserir() {
//        $query = "INSERT INTO {$this->entity->getTable()} (nome,nota) VALUES (:nome,:nota)";
//        $stmt = $this->db->prepare($query);
//        $stmt->bindValue(":nome", $this->entity->getNome());
//        $stmt->bindValue(":nota", $this->entity->getNota());
//        if ($stmt->execute()) {
//            return true;
//        }
//    }

    public function Alterar($id, $atributos) {//estes atributos DEVEM ser passados atraves de um array associativo
        $attrib = new Update($atributos); //Cria um novo OBJ da classe Updade no arquivo Update.php e o armasena/seta na variável $attrib
        $campos = $attrib->UpdateCampos($atributos); //chama o método UpdateCampos da classe Update e seta a string retornada na varável $campos
        $query = "UPDATE {$this->entity->getTable()} SET $campos WHERE id = :id ";
        $stmt = $this->db->prepare($query);
        $valores = $attrib->CombinaArrayUpade($atributos); //chama o método CombinaArrayUpdate da classe Update e seta a array retornado na varável $valores
        $valores["id"] = $id;
        try {
            $stmt->execute($valores);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
