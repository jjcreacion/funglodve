<?php
class HistorialI {
    private $conn;
    private $table_name = "historial_i";

    public $id;
    public $csuda;
    public $ccentro;
    public $clatino;
    public $cboliva;
    public $cpana;
    public $cibero;
    public $cligas;
    public $cmundiales;
    public $invitacionales;
    public $jsuda;
    public $jcentro;
    public $jlatino;
    public $jboliva;
    public $jpana;
    public $jalba;
    public $jjoo;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table_name . " (csuda, ccentro, clatino, cboliva, cpana, cibero, cligas, cmundiales, invitacionales, jsuda, jcentro, jlatino, jboliva, jpana, jalba, jjoo) VALUES (:csuda, :ccentro, :clatino, :cboliva, :cpana, :cibero, :cligas, :cmundiales, :invitacionales, :jsuda, :jcentro, :jlatino, :jboliva, :jpana, :jalba, :jjoo)";
        $stmt = $this->conn->prepare($query);

        // Sanitizar datos
        $this->csuda = htmlspecialchars(strip_tags($data['csuda']));
        $this->ccentro = htmlspecialchars(strip_tags($data['ccentro']));
        $this->clatino = htmlspecialchars(strip_tags($data['clatino']));
        $this->cboliva = htmlspecialchars(strip_tags($data['cboliva']));
        $this->cpana = htmlspecialchars(strip_tags($data['cpana']));
        $this->cibero = htmlspecialchars(strip_tags($data['cibero']));
        $this->cligas = htmlspecialchars(strip_tags($data['cligas']));
        $this->cmundiales = htmlspecialchars(strip_tags($data['cmundiales']));
        $this->invitacionales = htmlspecialchars(strip_tags($data['invitacionales']));
        $this->jsuda = htmlspecialchars(strip_tags($data['jsuda']));
        $this->jcentro = htmlspecialchars(strip_tags($data['jcentro']));
        $this->jlatino = htmlspecialchars(strip_tags($data['jlatino']));
        $this->jboliva = htmlspecialchars(strip_tags($data['jboliva']));
        $this->jpana = htmlspecialchars(strip_tags($data['jpana']));
        $this->jalba = htmlspecialchars(strip_tags($data['jalba']));
        $this->jjoo = htmlspecialchars(strip_tags($data['jjoo']));

        // Vincular valores
        $stmt->bindParam(":csuda", $this->csuda);
        $stmt->bindParam(":ccentro", $this->ccentro);
        $stmt->bindParam(":clatino", $this->clatino);
        $stmt->bindParam(":cboliva", $this->cboliva);
        $stmt->bindParam(":cpana", $this->cpana);
        $stmt->bindParam(":cibero", $this->cibero);
        $stmt->bindParam(":cligas", $this->cligas);
        $stmt->bindParam(":cmundiales", $this->cmundiales);
        $stmt->bindParam(":invitacionales", $this->invitacionales);
        $stmt->bindParam(":jsuda", $this->jsuda);
        $stmt->bindParam(":jcentro", $this->jcentro);
        $stmt->bindParam(":jlatino", $this->jlatino);
        $stmt->bindParam(":jboliva", $this->jboliva);
        $stmt->bindParam(":jpana", $this->jpana);
        $stmt->bindParam(":jalba", $this->jalba);
        $stmt->bindParam(":jjoo", $this->jjoo);

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
        $query = "UPDATE " . $this->table_name . " SET csuda = :csuda, ccentro = :ccentro, clatino = :clatino, cboliva = :cboliva, cpana = :cpana, cibero = :cibero, cligas = :cligas, cmundiales = :cmundiales, invitacionales = :invitacionales, jsuda = :jsuda, jcentro = :jcentro, jlatino = :jlatino, jboliva = :jboliva, jpana = :jpana, jalba = :jalba, jjoo = :jjoo WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        // Sanitizar datos
        $this->id = htmlspecialchars(strip_tags($data['id']));
        $this->csuda = htmlspecialchars(strip_tags($data['csuda']));
        $this->ccentro = htmlspecialchars(strip_tags($data['ccentro']));
        $this->clatino = htmlspecialchars(strip_tags($data['clatino']));
        $this->cboliva = htmlspecialchars(strip_tags($data['cboliva']));
        $this->cpana = htmlspecialchars(strip_tags($data['cpana']));
        $this->cibero = htmlspecialchars(strip_tags($data['cibero']));
        $this->cligas = htmlspecialchars(strip_tags($data['cligas']));
        $this->cmundiales = htmlspecialchars(strip_tags($data['cmundiales']));
        $this->invitacionales = htmlspecialchars(strip_tags($data['invitacionales']));
        $this->jsuda = htmlspecialchars(strip_tags($data['jsuda']));
        $this->jcentro = htmlspecialchars(strip_tags($data['jcentro']));
        $this->jlatino = htmlspecialchars(strip_tags($data['jlatino']));
        $this->jboliva = htmlspecialchars(strip_tags($data['jboliva']));
        $this->jpana = htmlspecialchars(strip_tags($data['jpana']));
        $this->jalba = htmlspecialchars(strip_tags($data['jalba']));
        $this->jjoo = htmlspecialchars(strip_tags($data['jjoo']));

        // Vincular valores
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":csuda", $this->csuda);
        $stmt->bindParam(":ccentro", $this->ccentro);
        $stmt->bindParam(":clatino", $this->clatino);
        $stmt->bindParam(":cboliva", $this->cboliva);
        $stmt->bindParam(":cpana", $this->cpana);
        $stmt->bindParam(":cibero", $this->cibero);
        $stmt->bindParam(":cligas", $this->cligas);
        $stmt->bindParam(":cmundiales", $this->cmundiales);
        $stmt->bindParam(":invitacionales", $this->invitacionales);
        $stmt->bindParam(":jsuda", $this->jsuda);
        $stmt->bindParam(":jcentro", $this->jcentro);
        $stmt->bindParam(":jlatino", $this->jlatino);
        $stmt->bindParam(":jboliva", $this->jboliva);
        $stmt->bindParam(":jpana", $this->jpana);
        $stmt->bindParam(":jalba", $this->jalba);
        $stmt->bindParam(":jjoo", $this->jjoo);

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
