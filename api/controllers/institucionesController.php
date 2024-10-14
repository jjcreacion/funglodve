<?php
require_once '../models/institucionesModel.php';
require_once '../config/conexion.php';

class institucionesController{
    private $model;
    private $db;
    
    public function  __construct()
    {
        $this->db = Conexion::getConnection();
        $this->model = new Instituciones($this->db);
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

$obj = new institucionesController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {    
    echo json_encode($obj->ListAll());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $web = $_POST['web'];
    $contacto = $_POST['contacto'];
    $insert = $_POST['insert'];
    $idinstitucion = $_POST['idinstitucion'];

    $data = [
        'idinstitucion' => $idinstitucion,
        'nombre' => $nombre,
        'direccion' => $direccion,
        'telefono' => $telefono,
        'email' => $email,
        'web' => $web,
        'contacto' => $contacto,
    ];

    if($insert=='true'){
       if ($obj->Create($data)) {
            echo json_encode(['message' => 'Institución created successfully']);
        } else {
            echo json_encode(['message' => 'Failed to create subsedes']);
        }
    }
    else{
        if ($obj->Update($data)) {
            echo json_encode(['message' => 'Institución created successfully']);
        } else {
            echo json_encode(['message' => 'Failed to create Institución']);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') { 
    
    parse_str(file_get_contents("php://input"), $data);
    $idinstitucion = $data['idinstitucion'];  
   
    if ($obj->Delete($idinstitucion)) {
        echo json_encode(['message' => 'Institución created successfully']);
    } else {
        echo json_encode(['message' => 'Failed to create Institución']);
    }
}

?>   
