<?php
class Recreacion {
    private $conn;
    private $table_name = "recreacion";

    public $id_gloria;
    public $pertenece;
    public $indique;
    public $pasear;
    public $jugar;
    public $compartir;
    public $playa;
    public $cine;
    public $otro;
    public $cantar;
    public $bailar;
    public $actuar;
    public $recitar;
    public $escribir;
    public $pintar;
    public $cotro;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table_name . " (id_gloria, pertenece, indique, pasear, jugar, compartir, playa, cine, otro, cantar, bailar, actuar, recitar, escribir, pintar, cotro) VALUES (:id_gloria, :pertenece, :indique, :pasear, :jugar, :compartir, :playa, :cine, :cotro, :cantar, :bailar, :actuar, :recitar, :escribir, :pintar, :cotro)";
        $stmt = $this->conn->prepare($query);

        // Sanitizar datos
        $this->id_gloria = htmlspecialchars(strip_tags($data['id_gloria']));
        $this->pertenece = htmlspecialchars(strip_tags($data['pertenece']));
        $this->indique = htmlspecialchars(strip_tags($data['indique']));
        $this->pasear = htmlspecialchars(strip_tags($data['pasear']));
        $this->jugar = htmlspecialchars(strip_tags($data['jugar']));
        $this->compartir = htmlspecialchars(strip_tags($data['compartir']));
        $this->playa = htmlspecialchars(strip_tags($data['playa']));
        $this->cine = htmlspecialchars(strip_tags($data['cine']));
        $this->cotro = htmlspecialchars(strip_tags($data['cotro']));
        $this->cantar = htmlspecialchars(strip_tags($data['cantar']));
        $this->bailar = htmlspecialchars(strip_tags($data['bailar']));
        $this->actuar = htmlspecialchars(strip_tags($data['actuar']));
        $this->recitar = htmlspecialchars(strip_tags($data['recitar']));
        $this->escribir = htmlspecialchars(strip_tags($data['escribir']));
        $this->pintar = htmlspecialchars(strip_tags($data['pintar']));
        $this->cotro = htmlspecialchars(strip_tags($data['cotro']));

        // Vincular valores
        $stmt->bindParam(":id_gloria", $this->id_gloria);
        $stmt->bindParam(":pertenece", $this->pertenece);
        $stmt->bindParam(":indique", $this->indique);
        $stmt->bindParam(":pasear", $this->pasear);
        $stmt->bindParam(":jugar", $this->jugar);
        $stmt->bindParam(":compartir", $this->compartir);
        $stmt->bindParam(":playa", $this->playa);
        $stmt->bindParam(":cine", $this->cine);
        $stmt->bindParam(":cotro", $this->cotro);
        $stmt->bindParam(":cantar", $this->cantar);
        $stmt->bindParam(":bailar", $this->bailar);
        $stmt->bindParam(":actuar", $this->actuar);
        $stmt->bindParam(":recitar", $this->recitar);
        $stmt->bindParam(":escribir", $this->escribir);
        $stmt->bindParam(":pintar", $this->pintar);
        $stmt->bindParam(":cotro", $this->cotro);

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
        $query = "UPDATE " . $this->table_name . " SET pertenece = :pertenece, indique = :indique, pasear = :pasear, jugar = :jugar, compartir = :compartir, playa = :playa, cine = :cine, otro = :cotro, cantar = :cantar, bailar = :bailar, actuar = :actuar, recitar = :recitar, escribir = :escribir, pintar = :pintar, cotro = :cotro WHERE id_gloria = :id_gloria";
        $stmt = $this->conn->prepare($query);

        // Sanitizar datos
        $this->id_gloria = htmlspecialchars(strip_tags($data['id_gloria']));
        $this->pertenece = htmlspecialchars(strip_tags($data['pertenece']));
        $this->indique = htmlspecialchars(strip_tags($data['indique']));
        $this->pasear = htmlspecialchars(strip_tags($data['pasear']));
        $this->jugar = htmlspecialchars(strip_tags($data['jugar']));
        $this->compartir = htmlspecialchars(strip_tags($data['compartir']));
        $this->playa = htmlspecialchars(strip_tags($data['playa']));
        $this->cine = htmlspecialchars(strip_tags($data['cine']));
        $this->otro = htmlspecialchars(strip_tags($data['otro']));
        $this->cantar = htmlspecialchars(strip_tags($data['cantar']));
        $this->bailar = htmlspecialchars(strip_tags($data['bailar']));
        $this->actuar = htmlspecialchars(strip_tags($data['actuar']));
        $this->recitar = htmlspecialchars(strip_tags($data['recitar']));
        $this->escribir = htmlspecialchars(strip_tags($data['escribir']));
        $this->pintar = htmlspecialchars(strip_tags($data['pintar']));
        $this->cotro = htmlspecialchars(strip_tags($data['cotro']));

        // Vincular valores
        $stmt->bindParam(":id_gloria", $this->id_gloria);
        $stmt->bindParam(":pertenece", $this->pertenece);
        $stmt->bindParam(":indique", $this->indique);
        $stmt->bindParam(":pasear", $this->pasear);
        $stmt->bindParam(":jugar", $this->jugar);
        $stmt->bindParam(":compartir", $this->compartir);
        $stmt->bindParam(":playa", $this->playa);
        $stmt->bindParam(":cine", $this->cine);
        $stmt->bindParam(":cotro", $this->cotro);
        $stmt->bindParam(":cantar", $this->cantar);
        $stmt->bindParam(":bailar", $this->bailar);
        $stmt->bindParam(":actuar", $this->actuar);
        $stmt->bindParam(":recitar", $this->recitar);
        $stmt->bindParam(":escribir", $this->escribir);
        $stmt->bindParam(":pintar", $this->pintar);
        $stmt->bindParam(":cotro", $this->cotro);

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
