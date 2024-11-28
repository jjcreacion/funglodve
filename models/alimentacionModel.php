<?php
class Alimentacion {
    private $conn;
    private $table_name = "alimentacion";

    public $id_gloria;
    public $balanceada;
    public $dieta;
    public $lcasa;
    public $lfundacion;
    public $lotro;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table_name . " (id_gloria, balanceada, dieta, lcasa, lfundacion, lotro) VALUES (:id_gloria, :balanceada, :dieta, :lcasa, :lfundacion, :lotro)";
        $stmt = $this->conn->prepare($query);

        // Sanitizar datos
        $this->id_gloria = htmlspecialchars(strip_tags($data['id_gloria']));
        $this->balanceada = htmlspecialchars(strip_tags($data['balanceada']));
        $this->dieta = htmlspecialchars(strip_tags($data['dieta']));
        $this->lcasa = htmlspecialchars(strip_tags($data['lcasa']));
        $this->lfundacion = htmlspecialchars(strip_tags($data['lfundacion']));
        $this->lotro = htmlspecialchars(strip_tags($data['lotro']));

        // Vincular valores
        $stmt->bindParam(":id_gloria", $this->id_gloria);
        $stmt->bindParam(":balanceada", $this->balanceada);
        $stmt->bindParam(":dieta", $this->dieta);
        $stmt->bindParam(":lcasa", $this->lcasa);
        $stmt->bindParam(":lfundacion", $this->lfundacion);
        $stmt->bindParam(":lotro", $this->lotro);

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
        $query = "UPDATE " . $this->table_name . " SET balanceada = :balanceada, dieta = :dieta, lcasa = :lcasa, lfundacion = :lfundacion, lotro = :lotro WHERE id_gloria = :id_gloria";
        $stmt = $this->conn->prepare($query);

        // Sanitizar datos
        $this->id_gloria = htmlspecialchars(strip_tags($data['id_gloria']));
        $this->balanceada = htmlspecialchars(strip_tags($data['balanceada']));
        $this->dieta = htmlspecialchars(strip_tags($data['dieta']));
        $this->lcasa = htmlspecialchars(strip_tags($data['lcasa']));
        $this->lfundacion = htmlspecialchars(strip_tags($data['lfundacion']));
        $this->lotro = htmlspecialchars(strip_tags($data['lotro']));

        // Vincular valores
        $stmt->bindParam(":id_gloria", $this->id_gloria);
        $stmt->bindParam(":balanceada", $this->balanceada);
        $stmt->bindParam(":dieta", $this->dieta);
        $stmt->bindParam(":lcasa", $this->lcasa);
        $stmt->bindParam(":lfundacion", $this->lfundacion);
        $stmt->bindParam(":lotro", $this->lotro);

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
