<?php
require_once '../models/subsedesModel.php';
require_once '../config/conexion.php';

class subsedesController{
    private $model;
    private $db;
    
    public function  __construct()
    {
        $this->db = Conexion::getConnection();
        $this->model = new Subsedes($this->db);
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

$sub = new subsedesController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {    
    echo json_encode($sub->ListAll());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $encargado = $_POST['encargado'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $insert = $_POST['insert'];
    $idSubsede = $_POST['idSubsede'];

    $data = [
        'idSubsede' => $idSubsede,
        'nombre' => $nombre,
        'encargado' => $encargado,
        'direccion' => $direccion,
        'telefono' => $telefono,
        'email' => $email
    ];

    if($insert=='true'){
       if ($sub->Create($data)) {
            echo json_encode(['message' => 'Subsedes created successfully']);
        } else {
            echo json_encode(['message' => 'Failed to create subsedes']);
        }
    }
    else{
        if ($sub->Update($data)) {
            echo json_encode(['message' => 'Subsedes created successfully']);
        } else {
            echo json_encode(['message' => 'Failed to create subsedes']);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') { 
    
    parse_str(file_get_contents("php://input"), $data);
    $idSubsede = $data['idSubsede'];  
   
    if ($sub->Delete($idSubsede)) {
        echo json_encode(['message' => 'Subsedes created successfully']);
    } else {
        echo json_encode(['message' => 'Failed to create subsedes']);
    }
}

?>   
