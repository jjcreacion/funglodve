<?php
class Educacion {
    private $conn;
    private $table_name = "educacion";

    public $id_gloria;
    public $grado;
    public $estudia;
    public $indique;
    public $mision;
    public $cual;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table_name . " (id_gloria, grado, estudia, indique, mision, cual) VALUES (:id_gloria, :grado, :estudia, :indique, :mision, :cual)";
        $stmt = $this->conn->prepare($query);

        // Sanitizar datos
        $this->id_gloria = htmlspecialchars(strip_tags($data['id_gloria']));
        $this->grado = htmlspecialchars(strip_tags($data['grado']));
        $this->estudia = htmlspecialchars(strip_tags($data['estudia']));
        $this->indique = htmlspecialchars(strip_tags($data['indique']));
        $this->mision = htmlspecialchars(strip_tags($data['mision']));
        $this->cual = htmlspecialchars(strip_tags($data['cual']));

        // Vincular valores
        $stmt->bindParam(":id_gloria", $this->id_gloria);
        $stmt->bindParam(":grado", $this->grado);
        $stmt->bindParam(":estudia", $this->estudia);
        $stmt->bindParam(":indique", $this->indique);
        $stmt->bindParam(":mision", $this->mision);
        $stmt->bindParam(":cual", $this->cual);

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
        $query = "UPDATE " . $this->table_name . " SET grado = :grado, estudia = :estudia, indique = :indique, mision = :mision, cual = :cual WHERE id_gloria = :id_gloria";
        $stmt = $this->conn->prepare($query);

        // Sanitizar datos
        $this->id_gloria = htmlspecialchars(strip_tags($data['id_gloria']));
        $this->grado = htmlspecialchars(strip_tags($data['grado']));
        $this->estudia = htmlspecialchars(strip_tags($data['estudia']));
        $this->indique = htmlspecialchars(strip_tags($data['indique']));
        $this->mision = htmlspecialchars(strip_tags($data['mision']));
        $this->cual = htmlspecialchars(strip_tags($data['cual']));

        // Vincular valores
        $stmt->bindParam(":id_gloria", $this->id_gloria);
        $stmt->bindParam(":grado", $this->grado);
        $stmt->bindParam(":estudia", $this->estudia);
        $stmt->bindParam(":indique", $this->indique);
        $stmt->bindParam(":mision", $this->mision);
        $stmt->bindParam(":cual", $this->cual);

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
