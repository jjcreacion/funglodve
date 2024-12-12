<?php
class Ivss {
    private $conn;
  
    public function __construct($db) {
        $this->conn = $db;
    }

    public function becadosNobecados() {
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

    
    
}
?>
