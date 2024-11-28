<?php
require_once '../models/alimentacionModel.php';
require_once '../config/conexion.php';

class AlimentacionController {
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

    public function Delete($id_gloria) {
        return $this->model->delete($id_gloria);
    }

    public function GetById($id_gloria) {
        return $this->model->GetById($id_gloria);
    }
}

$obj = new AlimentacionController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id_gloria = $_GET['idgloria'];
    echo json_encode($obj->GetById($id_gloria));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_gloria = $_POST['id_gloria'];
    $balanceada = $_POST['balanceada'];
    $dieta = $_POST['dieta'];
    $lcasa = $_POST['lcasa'];
    $lfundacion = $_POST['lfundacion'];
    $lotro = $_POST['lotro'];
    $insert = $_POST['insert'];

    $data = [
        'id_gloria' => $id_gloria,
        'balanceada' => $balanceada,
        'dieta' => $dieta,
        'lcasa' => $lcasa,
        'lfundacion' => $lfundacion,
        'lotro' => $lotro,
    ];

    if ($insert == 'true') {
        if ($obj->Create($data)) {
            echo json_encode(['message' => 'Alimentacion record created successfully']);
        } else {
            echo json_encode(['message' => 'Failed to create alimentacion record']);
        }
    } else {
        if ($obj->Update($data)) {
            echo json_encode(['message' => 'Alimentacion record updated successfully']);
        } else {
            echo json_encode(['message' => 'Failed to update alimentacion record']);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $data);
    $id_gloria = $data['id_gloria'];

    if ($obj->Delete($id_gloria)) {
        echo json_encode(['message' => 'Alimentacion record deleted successfully']);
    } else {
        echo json_encode(['message' => 'Failed to delete alimentacion record']);
    }
}
?>
