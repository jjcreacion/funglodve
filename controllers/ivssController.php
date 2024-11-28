<?php
require_once '../models/ivssModel.php';
require_once '../config/conexion.php';

class IvssController {
    private $model;
    private $db;

    public function __construct() {
        $this->db = Conexion::getConnection();
        $this->model = new Ivss($this->db);
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

$obj = new IvssController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id_gloria = $_GET['idgloria'];
    echo json_encode($obj->GetById($id_gloria));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_gloria = $_POST['id_gloria'];
    $cotiza = $_POST['cotiza'];
    $semanas = $_POST['semanas'];
    $estado = $_POST['estado'];
    $empresa = $_POST['empresa'];
    $anyos = $_POST['anyos'];
    $insert = $_POST['insert'];

    $data = [
        'id_gloria' => $id_gloria,
        'cotiza' => $cotiza,
        'semanas' => $semanas,
        'estado' => $estado,
        'empresa' => $empresa,
        'anyos' => $anyos,
    ];

    if ($insert == 'true') {
        if ($obj->Create($data)) {
            echo json_encode(['message' => 'Ivss record created successfully']);
        } else {
            echo json_encode(['message' => 'Failed to create Ivss record']);
        }
    } else {
        if ($obj->Update($data)) {
            echo json_encode(['message' => 'Ivss record updated successfully']);
        } else {
            echo json_encode(['message' => 'Failed to update Ivss record']);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $data);
    $id_gloria = $data['id_gloria'];

    if ($obj->Delete($id_gloria)) {
        echo json_encode(['message' => 'Ivss record deleted successfully']);
    } else {
        echo json_encode(['message' => 'Failed to delete Ivss record']);
    }
}
?>
