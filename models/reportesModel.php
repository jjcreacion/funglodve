<?php
class Ivss {
    private $conn;
  
    public function __construct($db) {
        $this->conn = $db;
    }

    public function becadosNobecados() {
        $query = "SELECT s.nombre AS descripcion_subsede,
            s.id as id_subsede,
            COUNT(g.id) AS total_glorias,
            COUNT(DISTINCT b.id_gloria) AS total_becados,
            COUNT(g.id) - COUNT(DISTINCT b.id_gloria) AS total_no_becados
            FROM glorias g JOIN subsedes s ON CAST(g.sub_sede AS INTEGER) = s.id
            LEFT JOIN beneficios b ON g.id = CAST(b.id_gloria AS INTEGER)
            GROUP BY s.nombre;";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function becadoscNobecadosPorMunicipios() {
        $query = "SELECT s.nombre AS descripcion_subsede,
            COUNT(g.id) AS total_glorias,
            COUNT(DISTINCT b.id_gloria) AS total_becados,
            COUNT(g.id) - COUNT(DISTINCT b.id_gloria) AS total_no_becados
            FROM glorias g JOIN subsedes s ON CAST(g.sub_sede AS INTEGER) = s.id
            LEFT JOIN beneficios b ON g.id = CAST(b.id_gloria AS INTEGER)
            GROUP BY s.nombre;";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    
    public function totalPorSubsedes($subsede) {
        $subsede = (int)$subsede;
        $query = "SELECT * FROM glorias WHERE sub_sede = :subsede ORDER BY nombre";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':subsede', $subsede, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }
    
    public function totalPorSubsedesBecados($subsede) {
        $subsede = (int)$subsede;
        $query = "
            SELECT DISTINCT g.* 
            FROM glorias g
            JOIN beneficios b ON g.id = CAST(b.id_gloria AS INTEGER)
            WHERE g.sub_sede = :subsede 
            ORDER BY g.nombre";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':subsede', $subsede, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }    

    public function totalPorSubsedesNoBecados($subsede) {
        $subsede = (int)$subsede;
        $query = "
            SELECT DISTINCT * 
            FROM glorias 
            WHERE sub_sede = :subsede 
            AND id NOT IN (SELECT CAST(id_gloria AS INTEGER) FROM beneficios) 
            ORDER BY nombre";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':subsede', $subsede, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }
    
     
}
?>
