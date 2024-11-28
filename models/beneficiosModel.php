<?php
class Alimentacion {
    private $conn;
    private $table_name = "beneficios";

    public $id;
    public $id_gloria;
    public $id_nomina;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table_name . " (id_gloria, id_nomina) VALUES (:id_gloria, :id_nomina)";
        $stmt = $this->conn->prepare($query);

        $this->id_gloria = htmlspecialchars(strip_tags($data['id_gloria']));
        $this->id_nomina = htmlspecialchars(strip_tags($data['id_nomina']));

        $stmt->bindParam(":id_gloria", $this->id_gloria);
        $stmt->bindParam(":id_nomina", $this->id_nomina);

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
        $query = "UPDATE " . $this->table_name . " SET id_gloria = :id_gloria, id_nomina = :id_nomina WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($data['id']));
        $this->id_gloria = htmlspecialchars(strip_tags($data['id_gloria']));
        $this->id_nomina = htmlspecialchars(strip_tags($data['id_nomina']));

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":id_gloria", $this->id_gloria);
        $stmt->bindParam(":id_nomina", $this->id_nomina);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete($id_gloria,$id_nomina) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_gloria = :id_gloria AND id_nomina = :id_nomina";
        $stmt = $this->conn->prepare($query);

        $this->id_gloria = htmlspecialchars(strip_tags($id_gloria));
        $this->id_nomina = htmlspecialchars(strip_tags($id_nomina));
        $stmt->bindParam(":id_gloria", $this->id_gloria);
        $stmt->bindParam(":id_nomina", $this->id_nomina);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function GetById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_gloria = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
