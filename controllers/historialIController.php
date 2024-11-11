<?php
require_once '../models/historialIModel.php';
require_once '../config/conexion.php';

class HistorialIController {
    private $model;
    private $db;

    public function __construct() {
        $this->db = Conexion::getConnection();
        $this->model = new HistorialI($this->db);
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

$obj = new HistorialIController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode($obj->ListAll());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $csuda = $_POST['csuda'];
    $ccentro = $_POST['ccentro'];
    $clatino = $_POST['clatino'];
    $cboliva = $_POST['cboliva'];
    $cpana = $_POST['cpana'];
    $cibero = $_POST['cibero'];
    $cligas = $_POST['cligas'];
    $cmundiales = $_POST['cmundiales'];
    $invitacionales = $_POST['invitacionales'];
    $jsuda = $_POST['jsuda'];
    $jcentro = $_POST['jcentro'];
    $jlatino = $_POST['jlatino'];
    $jboliva = $_POST['jboliva'];
    $jpana = $_POST['jpana'];
    $jalba = $_POST['jalba'];
    $jjoo = $_POST['jjoo'];
    $insert = $_POST['insert'];

    $data = [
        'id' => $id,
        'csuda' => $csuda,
        'ccentro' => $ccentro,
        'clatino' => $clatino,
        'cboliva' => $cboliva,
        'cpana' => $cpana,
        'cibero' => $cibero,
        'cligas' => $cligas,
        'cmundiales' => $cmundiales,
        'invitacionales' => $invitacionales,
        'jsuda' => $jsuda,
        'jcentro' => $jcentro,
        'jlatino' => $jlatino,
        'jboliva' => $jboliva,
        'jpana' => $jpana,
        'jalba' => $jalba,
        'jjoo' => $jjoo,
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
