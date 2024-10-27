<?php
class Glorias {
    private $conn;
    private $table_name = "glorias";

    public $id;
    public $cedula;
    public $nombre;
    public $apellido;
    public $direccion;
    public $telefono;
    public $email;
    public $f_nac;
    public $ocupacion;
    public $disciplina;
    public $subsede;
    public $estado;
    public $tipo;
    public $grado;
    public $ingreso;
    public $municipio;


    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
       /* $query = "INSERT INTO " . $this->table_name . " (nombre, ubicacion, encargado, trabajadores, actividad, f_inicio, f_fin, institucion, subsede, created_at, updated_at) VALUES (:nombre, :ubicacion, :encargado, :trabajadores, :actividad, :f_inicio, :f_fin, :institucion, :subsede, :created_at, :updated_at)";
        $stmt = $this->conn->prepare($query);
    
        $this->nombre = htmlspecialchars(strip_tags($data['nombre']));
        $this->ubicacion = htmlspecialchars(strip_tags($data['ubicacion']));
        $this->encargado = htmlspecialchars(strip_tags($data['encargado']));
        $this->trabajadores = htmlspecialchars(strip_tags($data['trabajadores']));
        $this->actividad = htmlspecialchars(strip_tags($data['actividad']));
        $this->f_inicio = htmlspecialchars(strip_tags($data['f_inicio']));
        $this->f_fin = htmlspecialchars(strip_tags($data['f_fin']));
        $this->institucion = htmlspecialchars(strip_tags($data['institucion']));
        $this->subsede = htmlspecialchars(strip_tags($data['subsede']));
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');
    
        // Vincular valores
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":ubicacion", $this->ubicacion);
        $stmt->bindParam(":encargado", $this->encargado);
        $stmt->bindParam(":trabajadores", $this->trabajadores);
        $stmt->bindParam(":actividad", $this->actividad);
        $stmt->bindParam(":f_inicio", $this->f_inicio);
        $stmt->bindParam(":f_fin", $this->f_fin);
        $stmt->bindParam(":institucion", $this->institucion);
        $stmt->bindParam(":subsede", $this->subsede);
        $stmt->bindParam(":created_at", $this->created_at);
        $stmt->bindParam(":updated_at", $this->updated_at);
    
        if ($stmt->execute()) {
            return true;
        }
        return false;*/
    }
    

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function update($data) {
        /*$query = "UPDATE " . $this->table_name . " SET nombre = :nombre, encargado = :encargado, ubicacion = :ubicacion, trabajadores = :trabajadores, actividad = :actividad, f_inicio = :f_inicio, f_fin = :f_fin, updated_at = :updated_at, institucion = :institucion, subsede = :subsede WHERE id = :id";
        $stmt = $this->conn->prepare($query);
    
        $this->id = htmlspecialchars(strip_tags($data['idproyecto']));
        $this->nombre = htmlspecialchars(strip_tags($data['nombre']));
        $this->ubicacion = htmlspecialchars(strip_tags($data['ubicacion']));
        $this->encargado = htmlspecialchars(strip_tags($data['encargado']));
        $this->trabajadores = htmlspecialchars(strip_tags($data['trabajadores']));
        $this->actividad = htmlspecialchars(strip_tags($data['actividad']));
        $this->f_inicio = htmlspecialchars(strip_tags($data['f_inicio']));
        $this->f_fin = htmlspecialchars(strip_tags($data['f_fin']));
        $this->institucion = htmlspecialchars(strip_tags($data['institucion']));
        $this->subsede = htmlspecialchars(strip_tags($data['subsede']));
        $this->updated_at = date('Y-m-d H:i:s');
    
        // Vincular valores
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":ubicacion", $this->ubicacion);
        $stmt->bindParam(":encargado", $this->encargado);
        $stmt->bindParam(":trabajadores", $this->trabajadores);
        $stmt->bindParam(":actividad", $this->actividad);
        $stmt->bindParam(":f_inicio", $this->f_inicio);
        $stmt->bindParam(":f_fin", $this->f_fin);
        $stmt->bindParam(":institucion", $this->institucion);
        $stmt->bindParam(":subsede", $this->subsede);
        $stmt->bindParam(":updated_at", $this->updated_at);
                
        if ($stmt->execute()) {
            return true;
        }
        return false;
        if ($stmt->execute()) {
            return true;
        }
        return false;*/
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
