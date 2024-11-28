<?php
require_once '../models/viviendaModel.php';
require_once '../config/conexion.php';

class ViviendaController {
    private $model;
    private $db;

    public function __construct() {
        $this->db = Conexion::getConnection();
        $this->model = new Vivienda($this->db);
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

    public function Delete($id_gloria) {
        return $this->model->delete($id_gloria);
    }

    public function GetById($id_gloria) {
        return $this->model->GetById($id_gloria);
    }
}

$obj = new ViviendaController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id_gloria = $_GET['idgloria'];
    echo json_encode($obj->GetById($id_gloria));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_gloria = $_POST['id_gloria'];
    $posee = $_POST['posee'];
    $ubicacion = $_POST['ubicacion'];
    $condiciones = $_POST['condiciones'];
    $especifique = $_POST['especifique'];
    $tipo = $_POST['tipo'];
    $anyos = $_POST['anyos'];
    $insert = $_POST['insert'];

    $data = [
        'id_gloria' => $id_gloria,
        'posee' => $posee,
        'ubicacion' => $ubicacion,
        'condiciones' => $condiciones,
        'especifique' => $especifique,
        'tipo' => $tipo,
        'anyos' => $anyos,
    ];

    if ($insert == 'true') {
        if ($obj->Create($data)) {
            echo json_encode(['message' => 'Vivienda record created successfully']);
        } else {
            echo json_encode(['message' => 'Failed to create vivienda record']);
        }
    } else {
        if ($obj->Update($data)) {
            echo json_encode(['message' => 'Vivienda record updated successfully']);
        } else {
            echo json_encode(['message' => 'Failed to update vivienda record']);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $data);
    $id_gloria = $data['id_gloria'];

    if ($obj->Delete($id_gloria)) {
        echo json_encode(['message' => 'Vivienda record deleted successfully']);
    } else {
        echo json_encode(['message' => 'Failed to delete vivienda record']);
    }
}
?>
