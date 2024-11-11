<?php
require_once '../models/historialOModel.php';
require_once '../config/conexion.php';

class HistorialOController {
    private $model;
    private $db;

    public function __construct() {
        $this->db = Conexion::getConnection();
        $this->model = new HistorialO($this->db);
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

    public function GetById($id){
        return $this->model->GetById($id);
    }
}

$obj = new HistorialOController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['idgloria'];
   echo json_encode($obj->GetById($id));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $entrenador = $_POST['entrenador'];
    $arbitro = $_POST['arbitro'];
    $juez = $_POST['juez'];
    $institucion = $_POST['institucion'];
    $tiempo = $_POST['tiempo'];
    $dirigente = $_POST['dirigente'];
    $dinstitucion = $_POST['dinstitucion'];
    $dtiempo = $_POST['dtiempo'];
    $insert = $_POST['insert'];

    $data = [
        'id' => $id,
        'entrenador' => $entrenador,
        'arbitro' => $arbitro,
        'juez' => $juez,
        'institucion' => $institucion,
        'tiempo' => $tiempo,
        'dirigente' => $dirigente,
        'dinstitucion' => $dinstitucion,
        'dtiempo' => $dtiempo,
    ];

    if ($insert == 'true') {
        if ($obj->Create($data)) {
            echo json_encode(['message' => 'Historial created successfully']);
        } else {
            echo json_encode(['message' => 'Failed to create historial']);
        }
    } else {
        if ($obj->Update($data)) {
            echo json_encode(['message' => 'Historial updated successfully']);
        } else {
            echo json_encode(['message' => 'Failed to update historial']);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $data);
    $id = $data['id'];

    if ($obj->Delete($id)) {
        echo json_encode(['message' => 'Historial deleted successfully']);
    } else {
        echo json_encode(['message' => 'Failed to delete historial']);
    }
}
?>
