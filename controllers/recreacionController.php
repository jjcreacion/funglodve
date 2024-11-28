<?php
require_once '../models/recreacionModel.php';
require_once '../config/conexion.php';

class RecreacionController {
    private $model;
    private $db;

    public function __construct() {
        $this->db = Conexion::getConnection();
        $this->model = new Recreacion($this->db);
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

$obj = new RecreacionController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id_gloria = $_GET['idgloria'];
    echo json_encode($obj->GetById($id_gloria));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_gloria = $_POST['id_gloria'];
    $pertenece = $_POST['pertenece'];
    $indique = $_POST['indique'];
    $pasear = $_POST['pasear'];
    $jugar = $_POST['jugar'];
    $compartir = $_POST['compartir'];
    $playa = $_POST['playa'];
    $cine = $_POST['cine'];
    $otro = $_POST['otro'];
    $cantar = $_POST['cantar'];
    $bailar = $_POST['bailar'];
    $actuar = $_POST['actuar'];
    $recitar = $_POST['recitar'];
    $escribir = $_POST['escribir'];
    $pintar = $_POST['pintar'];
    $cotro = $_POST['cotro'];
    $insert = $_POST['insert'];

    $data = [
        'id_gloria' => $id_gloria,
        'pertenece' => $pertenece,
        'indique' => $indique,
        'pasear' => $pasear,
        'jugar' => $jugar,
        'compartir' => $compartir,
        'playa' => $playa,
        'cine' => $cine,
        'otro' => $otro,
        'cantar' => $cantar,
        'bailar' => $bailar,
        'actuar' => $actuar,
        'recitar' => $recitar,
        'escribir' => $escribir,
        'pintar' => $pintar,
        'cotro' => $cotro,
    ];

    if ($insert == 'true') {
        if ($obj->Create($data)) {
            echo json_encode(['message' => 'Recreacion record created successfully']);
        } else {
            echo json_encode(['message' => 'Failed to create recreacion record']);
        }
    } else {
        if ($obj->Update($data)) {
            echo json_encode(['message' => 'Recreacion record updated successfully']);
        } else {
            echo json_encode(['message' => 'Failed to update recreacion record']);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $data);
    $id_gloria = $data['id_gloria'];

    if ($obj->Delete($id_gloria)) {
        echo json_encode(['message' => 'Recreacion record deleted successfully']);
    } else {
        echo json_encode(['message' => 'Failed to delete recreacion record']);
    }
}
?>
