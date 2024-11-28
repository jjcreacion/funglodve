<?php
class Ivss {
    private $conn;
    private $table_name = "ivss";

    public $id_gloria;
    public $cotiza;
    public $semanas;
    public $estado;
    public $empresa;
    public $anyos;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table_name . " (id_gloria, cotiza, semanas, estado, empresa, anyos) VALUES (:id_gloria, :cotiza, :semanas, :estado, :empresa, :anyos)";
        $stmt = $this->conn->prepare($query);

        // Sanitizar datos
        $this->id_gloria = htmlspecialchars(strip_tags($data['id_gloria']));
        $this->cotiza = htmlspecialchars(strip_tags($data['cotiza']));
        $this->semanas = htmlspecialchars(strip_tags($data['semanas']));
        $this->estado = htmlspecialchars(strip_tags($data['estado']));
        $this->empresa = htmlspecialchars(strip_tags($data['empresa']));
        $this->anyos = htmlspecialchars(strip_tags($data['anyos']));

        // Vincular valores
        $stmt->bindParam(":id_gloria", $this->id_gloria);
        $stmt->bindParam(":cotiza", $this->cotiza);
        $stmt->bindParam(":semanas", $this->semanas);
        $stmt->bindParam(":estado", $this->estado);
        $stmt->bindParam(":empresa", $this->empresa);
        $stmt->bindParam(":anyos", $this->anyos);

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
        $query = "UPDATE " . $this->table_name . " SET cotiza = :cotiza, semanas = :semanas, estado = :estado, empresa = :empresa, anyos = :anyos WHERE id_gloria = :id_gloria";
        $stmt = $this->conn->prepare($query);

        // Sanitizar datos
        $this->id_gloria = htmlspecialchars(strip_tags($data['id_gloria']));
        $this->cotiza = htmlspecialchars(strip_tags($data['cotiza']));
        $this->semanas = htmlspecialchars(strip_tags($data['semanas']));
        $this->estado = htmlspecialchars(strip_tags($data['estado']));
        $this->empresa = htmlspecialchars(strip_tags($data['empresa']));
        $this->anyos = htmlspecialchars(strip_tags($data['anyos']));

        // Vincular valores
        $stmt->bindParam(":id_gloria", $this->id_gloria);
        $stmt->bindParam(":cotiza", $this->cotiza);
        $stmt->bindParam(":semanas", $this->semanas);
        $stmt->bindParam(":estado", $this->estado);
        $stmt->bindParam(":empresa", $this->empresa);
        $stmt->bindParam(":anyos", $this->anyos);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete($id_gloria) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_gloria = :id_gloria";
        $stmt = $this->conn->prepare($query);

        $this->id_gloria = htmlspecialchars(strip_tags($id_gloria));
        $stmt->bindParam(":id_gloria", $this->id_gloria);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function GetById($id_gloria) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_gloria = :id_gloria";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_gloria", $id_gloria, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
