<?php
class Perfiles {
    private $conn;
    private $table_name = "perfiles";

    public $id;
    public $descripcion;
    public $modgl;
    public $modds;
    public $modcf;
    public $modhd;
    public $modbf;
    public $modss;
    public $modin;
    public $modpr;
    public $modrp;
    public $modnm;
    public $modus;
    public $modpf;
    public $created_at;
    public $updated_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table_name . " (descripcion, modgl, modds, modcf, modhd, modbf, modss, modin, modpr, modrp, modnm, modus, modpf, created_at, updated_at) VALUES (:descripcion, :modgl, :modds, :modcf, :modhd, :modbf, :modss, :modin, :modpr, :modrp, :modnm, :modus, :modpf, :created_at, :updated_at)";
        $stmt = $this->conn->prepare($query);
    
        $this->descripcion = htmlspecialchars(strip_tags($data['descripcion']));
        $this->modgl = htmlspecialchars(strip_tags($data['modgl']));
        $this->modds = htmlspecialchars(strip_tags($data['modds']));
        $this->modcf = htmlspecialchars(strip_tags($data['modcf']));
        $this->modhd = htmlspecialchars(strip_tags($data['modhd']));
        $this->modbf = htmlspecialchars(strip_tags($data['modbf']));
        $this->modss = htmlspecialchars(strip_tags($data['modss']));
        $this->modin = htmlspecialchars(strip_tags($data['modin']));
        $this->modpr = htmlspecialchars(strip_tags($data['modpr']));
        $this->modrp = htmlspecialchars(strip_tags($data['modrp']));
        $this->modnm = htmlspecialchars(strip_tags($data['modnm']));
        $this->modus = htmlspecialchars(strip_tags($data['modus']));
        $this->modpf = htmlspecialchars(strip_tags($data['modpf']));
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');
    
        // Vincular valores
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":modgl", $this->modgl);
        $stmt->bindParam(":modds", $this->modds);
        $stmt->bindParam(":modcf", $this->modcf);
        $stmt->bindParam(":modhd", $this->modhd);
        $stmt->bindParam(":modbf", $this->modbf);
        $stmt->bindParam(":modss", $this->modss);
        $stmt->bindParam(":modin", $this->modin);
        $stmt->bindParam(":modpr", $this->modpr);
        $stmt->bindParam(":modrp", $this->modrp);
        $stmt->bindParam(":modnm", $this->modnm);
        $stmt->bindParam(":modus", $this->modus);
        $stmt->bindParam(":modpf", $this->modpf);
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
        $query = "UPDATE " . $this->table_name . " SET descripcion = :descripcion, modgl = :modgl, modds = :modds, modcf = :modcf, modhd = :modhd, modbf = :modbf, modss = :modss, modin = :modin, modpr = :modpr, modrp = :modrp, modnm = :modnm, modus = :modus, modpf = :modpf, updated_at = :updated_at WHERE id = :id";
        $stmt = $this->conn->prepare($query);
    
        $this->id = htmlspecialchars(strip_tags($data['id']));
        $this->descripcion = htmlspecialchars(strip_tags($data['descripcion']));
        $this->modgl = htmlspecialchars(strip_tags($data['modgl']));
        $this->modds = htmlspecialchars(strip_tags($data['modds']));
        $this->modcf = htmlspecialchars(strip_tags($data['modcf']));
        $this->modhd = htmlspecialchars(strip_tags($data['modhd']));
        $this->modbf = htmlspecialchars(strip_tags($data['modbf']));
        $this->modss = htmlspecialchars(strip_tags($data['modss']));
        $this->modin = htmlspecialchars(strip_tags($data['modin']));
        $this->modpr = htmlspecialchars(strip_tags($data['modpr']));
        $this->modrp = htmlspecialchars(strip_tags($data['modrp']));
        $this->modnm = htmlspecialchars(strip_tags($data['modnm']));
        $this->modus = htmlspecialchars(strip_tags($data['modus']));
        $this->modpf = htmlspecialchars(strip_tags($data['modpf']));
        $this->updated_at = date('Y-m-d H:i:s');
    
        // Vincular valores
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":modgl", $this->modgl);
        $stmt->bindParam(":modds", $this->modds);
        $stmt->bindParam(":modcf", $this->modcf);
        $stmt->bindParam(":modhd", $this->modhd);
        $stmt->bindParam(":modbf", $this->modbf);
        $stmt->bindParam(":modss", $this->modss);
        $stmt->bindParam(":modin", $this->modin);
        $stmt->bindParam(":modpr", $this->modpr);
        $stmt->bindParam(":modrp", $this->modrp);
        $stmt->bindParam(":modnm", $this->modnm);
        $stmt->bindParam(":modus", $this->modus);
        $stmt->bindParam(":modpf", $this->modpf);
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
}
?>
