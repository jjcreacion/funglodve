<?php
class Subsedes {
    private $conn;
    private $table_name = "subsedes";

    public $id;
    public $nombre;
    public $encargado;
    public $direccion;
    public $telefono;
    public $email;
    public $created_at;
    public $updated_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table_name . " (nombre, encargado, direccion, telefono, email, created_at, updated_at) VALUES (:nombre, :encargado, :direccion, :telefono, :email, :created_at, :updated_at)";
        $stmt = $this->conn->prepare($query);
    
        $this->nombre = htmlspecialchars(strip_tags($data['nombre']));
        $this->encargado = htmlspecialchars(strip_tags($data['encargado']));
        $this->direccion = htmlspecialchars(strip_tags($data['direccion']));
        $this->telefono = htmlspecialchars(strip_tags($data['telefono']));
        $this->email = htmlspecialchars(strip_tags($data['email']));
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');
    
        // Vincular valores
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":encargado", $this->encargado);
        $stmt->bindParam(":direccion", $this->direccion);
        $stmt->bindParam(":telefono", $this->telefono);
        $stmt->bindParam(":email", $this->email);
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
        $query = "UPDATE " . $this->table_name . " SET nombre = :nombre, encargado = :encargado, direccion = :direccion, telefono = :telefono, email = :email, updated_at = :updated_at WHERE id = :id";
        $stmt = $this->conn->prepare($query);
    
        $this->id = htmlspecialchars(strip_tags($data['idSubsede']));
        $this->nombre = htmlspecialchars(strip_tags($data['nombre']));
        $this->encargado = htmlspecialchars(strip_tags($data['encargado']));
        $this->direccion = htmlspecialchars(strip_tags($data['direccion']));
        $this->telefono = htmlspecialchars(strip_tags($data['telefono']));
        $this->email = htmlspecialchars(strip_tags($data['email']));
        $this->updated_at = date('Y-m-d H:i:s');
    
        // Vincular valores
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":encargado", $this->encargado);
        $stmt->bindParam(":direccion", $this->direccion);
        $stmt->bindParam(":telefono", $this->telefono);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":updated_at", $this->updated_at);
    
        if ($stmt->execute()) {
            return true;
        }
        return false;
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
