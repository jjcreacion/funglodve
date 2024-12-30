<?php 
    class Usuarios {
    private $conn;
    private $table_name = "usuarios";

    public $id;
    public $nombre;
    public $password;
    public $perfil;
    public $created_at;
    public $updated_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table_name . " (nombre, password, perfil, created_at, updated_at) VALUES (:nombre, :password, :perfil, :created_at, :updated_at)";
        $stmt = $this->conn->prepare($query);
    
        $this->nombre = htmlspecialchars(strip_tags($data['nombre']));
        $this->password = password_hash($data['password'], PASSWORD_BCRYPT);
        $this->perfil = htmlspecialchars(strip_tags($data['perfil']));
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');
    
        // Vincular valores
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":perfil", $this->perfil);
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
        $query = "UPDATE " . $this->table_name . " SET nombre = :nombre, password = :password, perfil = :perfil, updated_at = :updated_at WHERE id = :id";
        $stmt = $this->conn->prepare($query);
    
        $this->id = htmlspecialchars(strip_tags($data['id']));
        $this->nombre = htmlspecialchars(strip_tags($data['nombre']));
        $this->password = password_hash($data['password'], PASSWORD_BCRYPT);
        $this->perfil = htmlspecialchars(strip_tags($data['perfil']));
        $this->updated_at = date('Y-m-d H:i:s');
    
        // Vincular valores
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":perfil", $this->perfil);
        $stmt->bindParam(":updated_at", $this->updated_at);
    
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

    public function verifyPassword($nombre, $password) { 
        $query = "SELECT * FROM " . $this->table_name . " WHERE nombre = :nombre"; 
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->execute(); 
        $user = $stmt->fetch(PDO::FETCH_ASSOC); 
        if ($user && password_verify($password, $user['password'])) { 
            return true; 
        }
         return false; 
    }
}

?>