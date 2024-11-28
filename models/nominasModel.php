<?php
class Nominas {
    private $conn;
    private $table_name = "nominas";

    public $id;
    public $descripcion;
    public $periodicidad;
    public $institucion;
    public $tipo;
    public $created_at;
    public $updated_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table_name . " (descripcion, institucion, periodicidad, tipo, created_at, updated_at) VALUES (:descripcion, :institucion, :periodicidad, :tipo, :created_at, :updated_at)";
        $stmt = $this->conn->prepare($query);
    
        $this->descripcion = htmlspecialchars(strip_tags($data['descripcion']));
        $this->institucion = htmlspecialchars(strip_tags($data['institucion']));
        $this->tipo = htmlspecialchars(strip_tags($data['tipo']));
        $this->periodicidad = htmlspecialchars(strip_tags($data['periodicidad']));
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');
    
        // Vincular valores
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":institucion", $this->institucion);
        $stmt->bindParam(":tipo", $this->tipo);
        $stmt->bindParam(":periodicidad", $this->periodicidad);
        $stmt->bindParam(":created_at", $this->created_at);
        $stmt->bindParam(":updated_at", $this->updated_at);
    
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function update($data) {
        $query = "UPDATE " . $this->table_name . " SET descripcion = :descripcion, institucion = :institucion, periodicidad = :periodicidad, tipo = :tipo, updated_at = :updated_at WHERE id = :id";
        $stmt = $this->conn->prepare($query);
    
        $this->id = htmlspecialchars(strip_tags($data['idnomina']));
        $this->descripcion = htmlspecialchars(strip_tags($data['descripcion']));
        $this->institucion = htmlspecialchars(strip_tags($data['institucion']));
        $this->periodicidad = htmlspecialchars(strip_tags($data['periodicidad']));
        $this->tipo = htmlspecialchars(strip_tags($data['tipo']));
        $this->updated_at = date('Y-m-d H:i:s');
    
        // Vincular valores
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":institucion", $this->institucion);
        $stmt->bindParam(":tipo", $this->tipo);
        $stmt->bindParam(":periodicidad", $this->periodicidad);
        $stmt->bindParam(":updated_at", $this->updated_at);
    
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($id));
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
