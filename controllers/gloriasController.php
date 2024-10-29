<?php
require_once '../models/gloriasModel.php';
require_once '../config/conexion.php';

class gloriasController{
    private $model;
    private $db;
    
    public function  __construct()
    {
        $this->db = Conexion::getConnection();
        $this->model = new Glorias($this->db);
    }

    public function ListAll(){
        $resp= $this->model->read();
        return $resp->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Create($data) {
        return $this->model->create($data);
    }

    public function Update($data) {
        return $this->model->update($data);
    }
    
    public function Delete($id) {
        return $this->model->delete($id);
    }

    public function GetById($id){
        return $this->model->GetById($id);
    }
}

$glo = new gloriasController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {    
    if (isset($_GET['idgloria'])) {
        $id = $_GET['idgloria'];
       echo json_encode($glo->GetById($id));
    } else {
        echo json_encode($glo->ListAll());
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $insert = $_POST['insert'];
    $idgloria = $_POST['idgloria'];
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $ocupacion = $_POST['ocupacion'];
    $e_civil = $_POST['e_civil'];
    $fecha_nac = $_POST['fecha_nac'];
    $subsede = $_POST['subsede'];
    $estado = $_POST['estado'];
    $municipio = $_POST['municipio'];
    $disciplina = $_POST['disciplina'];
    $tipo = $_POST['tipo'];
    $grado = $_POST['grado'];
    $f_ingreso = $_POST['f_ingreso'];  
   
    $data = [
        'idgloria' => $idgloria,
        'insert' => $insert,
        'cedula' => $cedula,
        'nombre' => $nombre,
        'apellido' => $apellido,
        'direccion' => $direccion,
        'email' => $email,
        'telefono' => $telefono,
        'ocupacion' => $ocupacion,
        'e_civil' => $e_civil,
        'fecha_nac' => $fecha_nac,
        'subsede' => $subsede,
        'estado' => $estado,
        'municipio' => $municipio,
        'disciplina' => $disciplina,
        'tipo' => $tipo,
        'grado' => $grado,
        'f_ingreso' => $f_ingreso,
    ];


    if($insert=='true'){
       if ($glo->Create($data)) {
            echo json_encode(['message' => 'Glorias created successfully']);
        } else {
            echo json_encode(['message' => 'Failed to create Glorias']);
        }
    }
    else{
        if ($glo->Update($data)) {
            echo json_encode(['message' => 'Glorias created successfully']);
        } else {
            echo json_encode(['message' => 'Failed to update Glorias']);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') { 
    
    parse_str(file_get_contents("php://input"), $data);
    $idgloria = $data['idgloria'];  
   
    if ($glo->Delete($idgloria)) {
        echo json_encode(['message' => 'Proyectos created successfully']);
    } else {
        echo json_encode(['message' => 'Failed to create Proyectos']);
    }
}

?>   
