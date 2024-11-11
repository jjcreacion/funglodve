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
    public $fecha_nac;
    public $ocupacion;
    public $disciplina;
    public $subsede;
    public $e_civil;
    public $tipo;
    public $grado;
    public $ingreso;
    public $municipio;
    public $estado;
    public $created_at;
    public $updated_at; 

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        
        $query = "INSERT INTO " . $this->table_name . " (cedula, nombre, apellido, direccion, telefono, email, fecha_nac, ocupacion, disciplina, sub_sede, e_civil, tipo, grado, ingreso, municipio, estado, created_at, updated_at) VALUES (:cedula, :nombre, :apellido, :direccion, :telefono, :email, :fecha_nac, :ocupacion, :disciplina, :sub_sede, :e_civil, :tipo, :grado, :ingreso, :municipio, :estado, :created_at, :updated_at)";
        $stmt = $this->conn->prepare($query);

        $this->cedula = htmlspecialchars(strip_tags($data['cedula']));
        $this->nombre = htmlspecialchars(strip_tags($data['nombre']));
        $this->apellido = htmlspecialchars(strip_tags($data['apellido']));
        $this->direccion = htmlspecialchars(strip_tags($data['direccion']));
        $this->telefono = htmlspecialchars(strip_tags($data['telefono']));
        $this->email = htmlspecialchars(strip_tags($data['email']));
        $this->fecha_nac = htmlspecialchars(strip_tags($data['fecha_nac']));
        $this->ocupacion = htmlspecialchars(strip_tags($data['ocupacion']));
        $this->disciplina = htmlspecialchars(strip_tags($data['disciplina']));
        $this->subsede = htmlspecialchars(strip_tags($data['subsede']));
        $this->e_civil = htmlspecialchars(strip_tags($data['e_civil']));
        $this->tipo = htmlspecialchars(strip_tags($data['tipo']));
        $this->grado = htmlspecialchars(strip_tags($data['grado']));
        $this->ingreso = htmlspecialchars(strip_tags($data['f_ingreso']));
        $this->municipio = htmlspecialchars(strip_tags($data['municipio']));
        $this->estado = htmlspecialchars(strip_tags($data['estado']));
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');
            
        // Vincular valores
        $stmt->bindParam(":cedula", $this->cedula);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":apellido", $this->apellido);
        $stmt->bindParam(":direccion", $this->direccion);
        $stmt->bindParam(":telefono", $this->telefono);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":fecha_nac", $this->fecha_nac);
        $stmt->bindParam(":ocupacion", $this->ocupacion);
        $stmt->bindParam(":disciplina", $this->disciplina);
        $stmt->bindParam(":sub_sede", $this->subsede);
        $stmt->bindParam(":e_civil", $this->e_civil);     
        $stmt->bindParam(":tipo", $this->tipo);
        $stmt->bindParam(":grado", $this->grado);
        $stmt->bindParam(":ingreso", $this->ingreso);
        $stmt->bindParam(":municipio", $this->municipio);
        $stmt->bindParam(":estado", $this->estado);
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

    public function GetById($id){
        $sql = "SELECT * FROM glorias WHERE id = :id"; // Espacio entre 'glorias' y 'WHERE'
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function GetByCedula($cedula){
        $sql = "SELECT * FROM glorias WHERE cedula = :cedula"; // Espacio entre 'glorias' y 'WHERE'
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':cedula', $cedula, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($data) {
        $query = "UPDATE " . $this->table_name . " SET 
                cedula = :cedula,
                nombre = :nombre,
                apellido = :apellido,
                direccion = :direccion,
                telefono = :telefono,
                email = :email,
                fecha_nac = :fecha_nac,
                ocupacion = :ocupacion,
                disciplina = :disciplina,
                sub_sede = :sub_sede,
                e_civil = :e_civil,
                tipo = :tipo,
                grado = :grado,
                ingreso = :ingreso,
                municipio = :municipio,
                estado = :estado,
                updated_at = :updated_at
              WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $this->id = htmlspecialchars(strip_tags($data['idgloria']));
        $this->cedula = htmlspecialchars(strip_tags($data['cedula']));
        $this->nombre = htmlspecialchars(strip_tags($data['nombre']));
        $this->apellido = htmlspecialchars(strip_tags($data['apellido']));
        $this->direccion = htmlspecialchars(strip_tags($data['direccion']));
        $this->telefono = htmlspecialchars(strip_tags($data['telefono']));
        $this->email = htmlspecialchars(strip_tags($data['email']));
        $this->fecha_nac = htmlspecialchars(strip_tags($data['fecha_nac']));
        $this->ocupacion = htmlspecialchars(strip_tags($data['ocupacion']));
        $this->disciplina = htmlspecialchars(strip_tags($data['disciplina']));
        $this->subsede = htmlspecialchars(strip_tags($data['subsede']));
        $this->e_civil = htmlspecialchars(strip_tags($data['e_civil']));
        $this->tipo = htmlspecialchars(strip_tags($data['tipo']));
        $this->grado = htmlspecialchars(strip_tags($data['grado']));
        $this->ingreso = htmlspecialchars(strip_tags($data['f_ingreso']));
        $this->municipio = htmlspecialchars(strip_tags($data['municipio']));
        $this->estado = htmlspecialchars(strip_tags($data['estado']));
        $this->updated_at = date('Y-m-d H:i:s');
            
        // Vincular valores
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":cedula", $this->cedula);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":apellido", $this->apellido);
        $stmt->bindParam(":direccion", $this->direccion);
        $stmt->bindParam(":telefono", $this->telefono);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":fecha_nac", $this->fecha_nac);
        $stmt->bindParam(":ocupacion", $this->ocupacion);
        $stmt->bindParam(":disciplina", $this->disciplina);
        $stmt->bindParam(":sub_sede", $this->subsede);
        $stmt->bindParam(":e_civil", $this->e_civil);     
        $stmt->bindParam(":tipo", $this->tipo);
        $stmt->bindParam(":grado", $this->grado);
        $stmt->bindParam(":ingreso", $this->ingreso);
        $stmt->bindParam(":municipio", $this->municipio);
        $stmt->bindParam(":estado", $this->estado);
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
