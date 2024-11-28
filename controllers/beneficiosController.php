<?php
require_once '../models/beneficiosModel.php';
require_once '../config/conexion.php';

class beneficiosController {
    private $model;
    private $db;

    public function __construct() {
        $this->db = Conexion::getConnection();
        $this->model = new Alimentacion($this->db);
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

    public function Delete($id_gloria,$id_nomina) {
        return $this->model->delete($id_gloria,$id_nomina);
    }

    public function GetById($id) {
        return $this->model->GetById($id);
    }
}

$obj = new beneficiosController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    echo json_encode($obj->GetById($id));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_gloria = $_POST['id_gloria'];
    $id_nomina = $_POST['id_nomina'];
    $insert = $_POST['insert'];

    $data = [
        'id_gloria' => $id_gloria,
        'id_nomina' => $id_nomina,
    ];

    if ($insert == 'true') {
        if ($obj->Create($data)) {
            echo json_encode(['message' => 'Beneficio created successfully']);
        } else {
            echo json_encode(['message' => 'Failed to create beneficio']);
        }
    } else {
        if ($obj->Update($data)) {
            echo json_encode(['message' => 'Beneficios record updated successfully']);
        } else {
            echo json_encode(['message' => 'Failed to update beneficios record']);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $data);
    $id_gloria = $data['id_gloria'];
    $id_nomina = $data['id_nomina'];

    if ($obj->Delete($id_gloria,$id_nomina)) {
        echo json_encode(['message' => 'Beneficios record deleted successfully']);
    } else {
        echo json_encode(['message' => 'Failed to delete beneficios record']);
    }
}
?>
