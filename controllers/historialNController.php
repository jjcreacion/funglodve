<?php
require_once '../models/historialNModel.php';
require_once '../config/conexion.php';

class HistorialCController {
    private $model;
    private $db;

    public function __construct() {
        $this->db = Conexion::getConnection();
        $this->model = new HistorialC($this->db);
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

$obj = new HistorialCController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['idgloria'];
   echo json_encode($obj->GetById($id));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $distrital = $_POST['distrital'];
    $estatal = $_POST['estatal'];
    $interclubes = $_POST['interclubes'];
    $cnacionales = $_POST['cnacionales'];
    $jnacionales = $_POST['jnacionales'];
    $insert = $_POST['insert'];

    $data = [
        'id' => $id,
        'distrital' => $distrital,
        'estatal' => $estatal,
        'interclubes' => $interclubes,
        'cnacionales' => $cnacionales,
        'jnacionales' => $jnacionales,
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
