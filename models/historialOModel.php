<?php
class HistorialO {
    private $conn;
    private $table_name = "historial_o";

    public $id;
    public $entrenador;
    public $arbitro;
    public $juez;
    public $institucion;
    public $tiempo;
    public $dirigente;
    public $dinstitucion;
    public $dtiempo;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table_name . " (entrenador, arbitro, juez, institucion, tiempo, dirigente, dinstitucion, dtiempo) VALUES (:entrenador, :arbitro, :juez, :institucion, :tiempo, :dirigente, :dinstitucion, :dtiempo)";
        $stmt = $this->conn->prepare($query);

        // Sanitizar datos
        $this->entrenador = htmlspecialchars(strip_tags($data['entrenador']));
        $this->arbitro = htmlspecialchars(strip_tags($data['arbitro']));
        $this->juez = htmlspecialchars(strip_tags($data['juez']));
        $this->institucion = htmlspecialchars(strip_tags($data['institucion']));
        $this->tiempo = htmlspecialchars(strip_tags($data['tiempo']));
        $this->dirigente = htmlspecialchars(strip_tags($data['dirigente']));
        $this->dinstitucion = htmlspecialchars(strip_tags($data['dinstitucion']));
        $this->dtiempo = htmlspecialchars(strip_tags($data['dtiempo']));

        // Vincular valores
        $stmt->bindParam(":entrenador", $this->entrenador);
        $stmt->bindParam(":arbitro", $this->arbitro);
        $stmt->bindParam(":juez", $this->juez);
        $stmt->bindParam(":institucion", $this->institucion);
        $stmt->bindParam(":tiempo", $this->tiempo);
        $stmt->bindParam(":dirigente", $this->dirigente);
        $stmt->bindParam(":dinstitucion", $this->dinstitucion);
        $stmt->bindParam(":dtiempo", $this->dtiempo);

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
        $query = "UPDATE " . $this->table_name . " SET entrenador = :entrenador, arbitro = :arbitro, juez = :juez, institucion = :institucion, tiempo = :tiempo, dirigente = :dirigente, dinstitucion = :dinstitucion, dtiempo = :dtiempo WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        // Sanitizar datos
        $this->id = htmlspecialchars(strip_tags($data['id']));
        $this->entrenador = htmlspecialchars(strip_tags($data['entrenador']));
        $this->arbitro = htmlspecialchars(strip_tags($data['arbitro']));
        $this->juez = htmlspecialchars(strip_tags($data['juez']));
        $this->institucion = htmlspecialchars(strip_tags($data['institucion']));
        $this->tiempo = htmlspecialchars(strip_tags($data['tiempo']));
        $this->dirigente = htmlspecialchars(strip_tags($data['dirigente']));
        $this->dinstitucion = htmlspecialchars(strip_tags($data['dinstitucion']));
        $this->dtiempo = htmlspecialchars(strip_tags($data['dtiempo']));

        // Vincular valores
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":entrenador", $this->entrenador);
        $stmt->bindParam(":arbitro", $this->arbitro);
        $stmt->bindParam(":juez", $this->juez);
        $stmt->bindParam(":institucion", $this->institucion);
        $stmt->bindParam(":tiempo", $this->tiempo);
        $stmt->bindParam(":dirigente", $this->dirigente);
        $stmt->bindParam(":dinstitucion", $this->dinstitucion);
        $stmt->bindParam(":dtiempo", $this->dtiempo);

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
