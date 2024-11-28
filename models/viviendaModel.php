<?php
class Vivienda {
    private $conn;
    private $table_name = "vivienda";

    public $id_gloria;
    public $posee;
    public $ubicacion;
    public $condiciones;
    public $especifique;
    public $tipo;
    public $anyos;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table_name . " (id_gloria, posee, ubicacion, condiciones, especifique, tipo, anyos) VALUES (:id_gloria, :posee, :ubicacion, :condiciones, :especifique, :tipo, :anyos)";
        $stmt = $this->conn->prepare($query);

        // Sanitizar datos
        $this->id_gloria = htmlspecialchars(strip_tags($data['id_gloria']));
        $this->posee = htmlspecialchars(strip_tags($data['posee']));
        $this->ubicacion = htmlspecialchars(strip_tags($data['ubicacion']));
        $this->condiciones = htmlspecialchars(strip_tags($data['condiciones']));
        $this->especifique = htmlspecialchars(strip_tags($data['especifique']));
        $this->tipo = htmlspecialchars(strip_tags($data['tipo']));
        $this->anyos = htmlspecialchars(strip_tags($data['anyos']));

        // Vincular valores
        $stmt->bindParam(":id_gloria", $this->id_gloria);
        $stmt->bindParam(":posee", $this->posee);
        $stmt->bindParam(":ubicacion", $this->ubicacion);
        $stmt->bindParam(":condiciones", $this->condiciones);
        $stmt->bindParam(":especifique", $this->especifique);
        $stmt->bindParam(":tipo", $this->tipo);
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
        $query = "UPDATE " . $this->table_name . " SET posee = :posee, ubicacion = :ubicacion, condiciones = :condiciones, especifique = :especifique, tipo = :tipo, anyos = :anyos WHERE id_gloria = :id_gloria";
        $stmt = $this->conn->prepare($query);

        // Sanitizar datos
        $this->id_gloria = htmlspecialchars(strip_tags($data['id_gloria']));
        $this->posee = htmlspecialchars(strip_tags($data['posee']));
        $this->ubicacion = htmlspecialchars(strip_tags($data['ubicacion']));
        $this->condiciones = htmlspecialchars(strip_tags($data['condiciones']));
        $this->especifique = htmlspecialchars(strip_tags($data['especifique']));
        $this->tipo = htmlspecialchars(strip_tags($data['tipo']));
        $this->anyos = htmlspecialchars(strip_tags($data['anyos']));

        // Vincular valores
        $stmt->bindParam(":id_gloria", $this->id_gloria);
        $stmt->bindParam(":posee", $this->posee);
        $stmt->bindParam(":ubicacion", $this->ubicacion);
        $stmt->bindParam(":condiciones", $this->condiciones);
        $stmt->bindParam(":especifique", $this->especifique);
        $stmt->bindParam(":tipo", $this->tipo);
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
