<?php
require_once '../models/usuariosModel.php';
require_once '../config/conexion.php';

class usuariosController {
    private $model;
    private $db;
    
    public function __construct() {
        $this->db = Conexion::getConnection();
        $this->model = new Usuarios($this->db);
    }

    public function ListAll() {
        $resp = $this->model->read();
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

$obj = new usuariosController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {    
    echo json_encode($obj->ListAll());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    $perfil = $_POST['perfil'];
    $id = $_POST['idusuario'];
    $insert = $_POST['insert'];

    $data = [
        'id' => $id,
        'nombre' => $nombre,
        'password' => $password,
        'perfil' => $perfil,
    ];

    if ($insert == 'true') {
        if ($obj->Create($data)) {
            echo json_encode(['message' => 'Usuario created successfully']);
        } else {
            echo json_encode(['message' => 'Failed to create usuario']);
        }
    } else {
        if ($obj->Update($data)) {
            echo json_encode(['message' => 'Usuario updated successfully']);
        } else {
            echo json_encode(['message' => 'Failed to update usuario']);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') { 
    parse_str(file_get_contents("php://input"), $data);
    $id = $data['idusuario'];  
   
    if ($obj->Delete($id)) {
        echo json_encode(['message' => 'Usuario deleted successfully']);
    } else {
        echo json_encode(['message' => 'Failed to delete usuario']);
    }
}
?>
