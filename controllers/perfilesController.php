<?php
require_once '../models/perfilesModel.php';
require_once '../config/conexion.php';

class PerfilesController {
    private $model;
    private $db;
    
    public function __construct() {
        $this->db = Conexion::getConnection();
        $this->model = new Perfiles($this->db);
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

$obj = new PerfilesController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {    
    echo json_encode($obj->ListAll());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descripcion = $_POST['descripcion'];
    $modgl = $_POST['modgl'];
    $modds = $_POST['modds'];
    $modcf = $_POST['modcf'];
    $modhd = $_POST['modhd'];
    $modbf = $_POST['modbf'];
    $modss = $_POST['modss'];
    $modin = $_POST['modin'];
    $modpr = $_POST['modpr'];
    $modrp = $_POST['modrp'];
    $modnm = $_POST['modnm'];
    $modus = $_POST['modus'];
    $modpf = $_POST['modpf'];
    $insert = $_POST['insert'];
    $id = $_POST['id'];

    $data = [
        'id' => $id,
        'descripcion' => $descripcion,
        'modgl' => $modgl,
        'modds' => $modds,
        'modcf' => $modcf,
        'modhd' => $modhd,
        'modbf' => $modbf,
        'modss' => $modss,
        'modin' => $modin,
        'modpr' => $modpr,
        'modrp' => $modrp,
        'modnm' => $modnm,
        'modus' => $modus,
        'modpf' => $modpf,
    ];

    if ($insert == 'true') {
        if ($obj->Create($data)) {
            echo json_encode(['message' => 'Perfil creado con éxito']);
        } else {
            echo json_encode(['message' => 'Error al crear el perfil']);
        }
    } else {
        if ($obj->Update($data)) {
            echo json_encode(['message' => 'Perfil actualizado con éxito']);
        } else {
            echo json_encode(['message' => 'Error al actualizar el perfil']);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') { 
    parse_str(file_get_contents("php://input"), $data);
    $id = $data['idperfil'];  
   
    if ($obj->Delete($id)) {
        echo json_encode(['message' => 'Perfil eliminado con éxito']);
    } else {
        echo json_encode(['message' => 'Error al eliminar el perfil']);
    }
}
