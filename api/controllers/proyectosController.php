<?php
require_once '../models/proyectosModel.php';
require_once '../config/conexion.php';

class proyectosController{
    private $model;
    private $db;
    
    public function  __construct()
    {
        $this->db = Conexion::getConnection();
        $this->model = new Proyectos($this->db);
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
}

$pro = new proyectosController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {    
    echo json_encode($pro->ListAll());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $insert = $_POST['insert'];
    $idproyecto = $_POST['idproyecto'];
    $ubicacion = $_POST['ubicacion'];
    $encargado = $_POST['encargado'];
    $trabajadores = $_POST['trabajadores'];
    $actividad = $_POST['actividad'];
    $f_inicio = $_POST['f_inicio'];
    $f_fin = $_POST['f_fin'];
    $institucion = $_POST['institucion'];
    $subsede = $_POST['subsede'];
   
    $data = [
        'idproyecto' => $idproyecto,
        'insert' => $insert,
        'nombre' => $nombre,
        'ubicacion' => $ubicacion,
        'encargado' => $encargado,
        'trabajadores' => $trabajadores,
        'actividad' => $actividad,
        'f_inicio' => $f_inicio,
        'f_fin' => $f_fin,
        'institucion' => $institucion,
        'subsede' => $subsede
    ];

    if($insert=='true'){
       if ($pro->Create($data)) {
            echo json_encode(['message' => 'Proyectos created successfully']);
        } else {
            echo json_encode(['message' => 'Failed to create Proyectos']);
        }
    }
    else{
        if ($pro->Update($data)) {
            echo json_encode(['message' => 'Proyectos created successfully']);
        } else {
            echo json_encode(['message' => 'Failed to create Proyectos']);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') { 
    
    parse_str(file_get_contents("php://input"), $data);
    $idproyecto = $data['idproyecto'];  
   
    if ($pro->Delete($idproyecto)) {
        echo json_encode(['message' => 'Proyectos created successfully']);
    } else {
        echo json_encode(['message' => 'Failed to create Proyectos']);
    }
}

?>   
