<?php
class HistorialB {
    private $conn;
    private $table_name = "historial";

    public $id;
    public $fecha_i;
    public $federado;
    public $cual;
    public $estado;
    public $j_nac;
    public $ediciones;
    public $fecha_p;
    public $select_nac;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table_name . " (fecha_i, federado, cual, estado, j_nac, ediciones, fecha_p, select_nac) VALUES (:fecha_i, :federado, :cual, :estado, :j_nac, :ediciones, :fecha_p, :select_nac)";
        $stmt = $this->conn->prepare($query);

        // Sanitizar datos
        $this->fecha_i = htmlspecialchars(strip_tags($data['fecha_i']));
        $this->federado = htmlspecialchars(strip_tags($data['federado']));
        $this->cual = htmlspecialchars(strip_tags($data['cual']));
        $this->estado = htmlspecialchars(strip_tags($data['estado']));
        $this->j_nac = htmlspecialchars(strip_tags($data['j_nac']));
        $this->ediciones = htmlspecialchars(strip_tags($data['ediciones']));
        $this->fecha_p = htmlspecialchars(strip_tags($data['fecha_p']));
        $this->select_nac = htmlspecialchars(strip_tags($data['select_nac']));

        // Vincular valores
        $stmt->bindParam(":fecha_i", $this->fecha_i);
        $stmt->bindParam(":federado", $this->federado);
        $stmt->bindParam(":cual", $this->cual);
        $stmt->bindParam(":estado", $this->estado);
        $stmt->bindParam(":j_nac", $this->j_nac);
        $stmt->bindParam(":ediciones", $this->ediciones);
        $stmt->bindParam(":fecha_p", $this->fecha_p);
        $stmt->bindParam(":select_nac", $this->select_nac);

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
        $query = "UPDATE " . $this->table_name . " SET fecha_i = :fecha_i, federado = :federado, cual = :cual, estado = :estado, j_nac = :j_nac, ediciones = :ediciones, fecha_p = :fecha_p, select_nac = :select_nac WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        // Sanitizar datos
        $this->id = htmlspecialchars(strip_tags($data['id']));
        $this->fecha_i = htmlspecialchars(strip_tags($data['fecha_i']));
        $this->federado = htmlspecialchars(strip_tags($data['federado']));
        $this->cual = htmlspecialchars(strip_tags($data['cual']));
        $this->estado = htmlspecialchars(strip_tags($data['estado']));
        $this->j_nac = htmlspecialchars(strip_tags($data['j_nac']));
        $this->ediciones = htmlspecialchars(strip_tags($data['ediciones']));
        $this->fecha_p = htmlspecialchars(strip_tags($data['fecha_p']));
        $this->select_nac = htmlspecialchars(strip_tags($data['select_nac']));
     
        // Vincular valores
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":fecha_i", $this->fecha_i);
        $stmt->bindParam(":federado", $this->federado);
        $stmt->bindParam(":cual", $this->cual);
        $stmt->bindParam(":estado", $this->estado);
        $stmt->bindParam(":j_nac", $this->j_nac);
        $stmt->bindParam(":ediciones", $this->ediciones);
        $stmt->bindParam(":fecha_p", $this->fecha_p);
        $stmt->bindParam(":select_nac", $this->select_nac);
     
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
    public function GetById($id){
        $sql = "SELECT * FROM " . $this->table_name . " WHERE id_gloria = :id"; 
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
