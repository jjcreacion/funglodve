<?php
class Salud {
    private $conn;
    private $table_name = "salud";

    public $id_gloria;
    public $enfermedad;
    public $especifique;
    public $diagnostico;
    public $tratamiento;
    public $cumple;
    public $institucion;
    public $discapacitado;
    public $indique;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table_name . " (id_gloria, enfermedad, especifique, diagnostico, tratamiento, cumple, institucion, discapacitado, indique) VALUES (:id_gloria, :enfermedad, :especifique, :diagnostico, :tratamiento, :cumple, :institucion, :discapacitado, :indique)";
        $stmt = $this->conn->prepare($query);

        // Sanitizar datos
        $this->id_gloria = htmlspecialchars(strip_tags($data['id_gloria']));
        $this->enfermedad = htmlspecialchars(strip_tags($data['enfermedad']));
        $this->especifique = htmlspecialchars(strip_tags($data['especifique']));
        $this->diagnostico = htmlspecialchars(strip_tags($data['diagnostico']));
        $this->tratamiento = htmlspecialchars(strip_tags($data['tratamiento']));
        $this->cumple = htmlspecialchars(strip_tags($data['cumple']));
        $this->institucion = htmlspecialchars(strip_tags($data['institucion']));
        $this->discapacitado = htmlspecialchars(strip_tags($data['discapacitado']));
        $this->indique = htmlspecialchars(strip_tags($data['indique']));

        // Vincular valores
        $stmt->bindParam(":id_gloria", $this->id_gloria);
        $stmt->bindParam(":enfermedad", $this->enfermedad);
        $stmt->bindParam(":especifique", $this->especifique);
        $stmt->bindParam(":diagnostico", $this->diagnostico);
        $stmt->bindParam(":tratamiento", $this->tratamiento);
        $stmt->bindParam(":cumple", $this->cumple);
        $stmt->bindParam(":institucion", $this->institucion);
        $stmt->bindParam(":discapacitado", $this->discapacitado);
        $stmt->bindParam(":indique", $this->indique);

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
        $query = "UPDATE " . $this->table_name . " SET enfermedad = :enfermedad, especifique = :especifique, diagnostico = :diagnostico, tratamiento = :tratamiento, cumple = :cumple, institucion = :institucion, discapacitado = :discapacitado, indique = :indique WHERE id_gloria = :id_gloria";
        $stmt = $this->conn->prepare($query);

        // Sanitizar datos
        $this->id_gloria = htmlspecialchars(strip_tags($data['id_gloria']));
        $this->enfermedad = htmlspecialchars(strip_tags($data['enfermedad']));
        $this->especifique = htmlspecialchars(strip_tags($data['especifique']));
        $this->diagnostico = htmlspecialchars(strip_tags($data['diagnostico']));
        $this->tratamiento = htmlspecialchars(strip_tags($data['tratamiento']));
        $this->cumple = htmlspecialchars(strip_tags($data['cumple']));
        $this->institucion = htmlspecialchars(strip_tags($data['institucion']));
        $this->discapacitado = htmlspecialchars(strip_tags($data['discapacitado']));
        $this->indique = htmlspecialchars(strip_tags($data['indique']));

        // Vincular valores
        $stmt->bindParam(":id_gloria", $this->id_gloria);
        $stmt->bindParam(":enfermedad", $this->enfermedad);
        $stmt->bindParam(":especifique", $this->especifique);
        $stmt->bindParam(":diagnostico", $this->diagnostico);
        $stmt->bindParam(":tratamiento", $this->tratamiento);
        $stmt->bindParam(":cumple", $this->cumple);
        $stmt->bindParam(":institucion", $this->institucion);
        $stmt->bindParam(":discapacitado", $this->discapacitado);
        $stmt->bindParam(":indique", $this->indique);

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
