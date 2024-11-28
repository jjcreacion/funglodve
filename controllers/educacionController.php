<?php
require_once '../models/educacionModel.php';
require_once '../config/conexion.php';

class EducacionController {
    private $model;
    private $db;

    public function __construct() {
        $this->db = Conexion::getConnection();
        $this->model = new Educacion($this->db);
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

$obj = new EducacionController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id_gloria = $_GET['idgloria'];
    echo json_encode($obj->GetById($id_gloria));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_gloria = $_POST['id_gloria'];
    $grado = $_POST['grado'];
    $estudia = $_POST['estudia'];
    $indique = $_POST['indique'];
    $mision = $_POST['mision'];
    $cual = $_POST['cual'];
    $insert = $_POST['insert'];

    $data = [
        'id_gloria' => $id_gloria,
        'grado' => $grado,
        'estudia' => $estudia,
        'indique' => $indique,
        'mision' => $mision,
        'cual' => $cual,
    ];

    if ($insert == 'true') {
        if ($obj->Create($data)) {
            echo json_encode(['message' => 'Educacion record created successfully']);
        } else {
            echo json_encode(['message' => 'Failed to create educacion record']);
        }
    } else {
        if ($obj->Update($data)) {
            echo json_encode(['message' => 'Educacion record updated successfully']);
        } else {
            echo json_encode(['message' => 'Failed to update educacion record']);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $data);
    $id_gloria = $data['id_gloria'];

    if ($obj->Delete($id_gloria)) {
        echo json_encode(['message' => 'Educacion record deleted successfully']);
    } else {
        echo json_encode(['message' => 'Failed to delete educacion record']);
    }
}
?>
