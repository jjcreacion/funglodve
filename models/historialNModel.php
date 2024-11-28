<?php
class HistorialC {
    private $conn;
    private $table_name = "historial_n";

    public $id;
    public $distrital;
    public $estatal;
    public $interclubes;
    public $cnacionales;
    public $jnacionales;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table_name . " (id_gloria, distrital, estatal, interclubes, cnacionales, jnacionales) VALUES (:id, :distrital, :estatal, :interclubes, :cnacionales, :jnacionales)";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($data['id']));
        $this->distrital = htmlspecialchars(strip_tags($data['distrital']));
        $this->estatal = htmlspecialchars(strip_tags($data['estatal']));
        $this->interclubes = htmlspecialchars(strip_tags($data['interclubes']));
        $this->cnacionales = htmlspecialchars(strip_tags($data['cnacionales']));
        $this->jnacionales = htmlspecialchars(strip_tags($data['jnacionales']));

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":distrital", $this->distrital);
        $stmt->bindParam(":estatal", $this->estatal);
        $stmt->bindParam(":interclubes", $this->interclubes);
        $stmt->bindParam(":cnacionales", $this->cnacionales);
        $stmt->bindParam(":jnacionales", $this->jnacionales);

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
        $query = "UPDATE " . $this->table_name . " SET distrital = :distrital, estatal = :estatal, interclubes = :interclubes, cnacionales = :cnacionales, jnacionales = :jnacionales WHERE id_gloria = :id";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($data['id']));
        $this->distrital = htmlspecialchars(strip_tags($data['distrital']));
        $this->estatal = htmlspecialchars(strip_tags($data['estatal']));
        $this->interclubes = htmlspecialchars(strip_tags($data['interclubes']));
        $this->cnacionales = htmlspecialchars(strip_tags($data['cnacionales']));
        $this->jnacionales = htmlspecialchars(strip_tags($data['jnacionales']));

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":distrital", $this->distrital);
        $stmt->bindParam(":estatal", $this->estatal);
        $stmt->bindParam(":interclubes", $this->interclubes);
        $stmt->bindParam(":cnacionales", $this->cnacionales);
        $stmt->bindParam(":jnacionales", $this->jnacionales);

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
