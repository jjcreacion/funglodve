<?php
require_once '../models/historialBModel.php';
require_once '../config/conexion.php';

class HistorialBController {
    private $model;
    private $db;

    public function __construct() {
        $this->db = Conexion::getConnection();
        $this->model = new HistorialB($this->db);
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

$obj = new HistorialBController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['idgloria'];
   echo json_encode($obj->GetById($id));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $fecha_i = $_POST['fecha_i'];
    $federado = $_POST['federado'];
    $cual = $_POST['cual'];
    $estado = $_POST['estado'];
    $j_nac = $_POST['j_nac'];
    $ediciones = $_POST['ediciones'];
    $fecha_p = $_POST['fecha_p'];
    $select_nac = $_POST['select_nac'];
    $insert = $_POST['insert'];

    $data = [
        'id' => $id,
        'fecha_i' => $fecha_i,
        'federado' => $federado,
        'cual' => $cual,
        'estado' => $estado,
        'j_nac' => $j_nac,
        'ediciones' => $ediciones,
        'fecha_p' => $fecha_p,
        'select_nac' => $select_nac,
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
