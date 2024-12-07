<?php
class Dependiente {
    private $conn;
    private $table_name = "dependientes";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Crear nuevo dependiente
    public function create($data) {
        $query = "INSERT INTO " . $this->table_name . " (id_gloria, nombre, parentesco, grado, ocupacion, ingreso, telefono, f_nac) VALUES (:id_gloria, :nombre, :parentesco, :grado, :ocupacion, :ingreso, :telefono, :f_nac)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_gloria", $data['id_gloria']);
        $stmt->bindParam(":nombre", $data['nombre']);
        $stmt->bindParam(":parentesco", $data['parentesco']);
        $stmt->bindParam(":grado", $data['grado']);
        $stmt->bindParam(":ocupacion", $data['ocupacion']);
        $stmt->bindParam(":ingreso", $data['ingreso']);
        $stmt->bindParam(":telefono", $data['telefono']);
        $stmt->bindParam(":f_nac", $data['f_nac']);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Leer todos los dependientes
    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY nombre";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Actualizar dependiente
    public function update($data) {
        $query = "UPDATE " . $this->table_name . " SET id_gloria = :id_gloria, nombre = :nombre, parentesco = :parentesco, grado = :grado, ocupacion = :ocupacion, ingreso = :ingreso, telefono = :telefono, f_nac = :f_nac WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $data['id_dependiente']);
        $stmt->bindParam(":id_gloria", $data['id_gloria']);
        $stmt->bindParam(":nombre", $data['nombre']);
        $stmt->bindParam(":parentesco", $data['parentesco']);
        $stmt->bindParam(":grado", $data['grado']);
        $stmt->bindParam(":ocupacion", $data['ocupacion']);
        $stmt->bindParam(":ingreso", $data['ingreso']);
        $stmt->bindParam(":telefono", $data['telefono']);
        $stmt->bindParam(":f_nac", $data['f_nac']);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Borrar dependiente
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $id);

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
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetByIdDep($id){
        $sql = "SELECT * FROM " . $this->table_name . " WHERE id = :id"; 
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
