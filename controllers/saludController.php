<?php
require_once '../models/saludModel.php';
require_once '../config/conexion.php';

class SaludController {
    private $model;
    private $db;

    public function __construct() {
        $this->db = Conexion::getConnection();
        $this->model = new Salud($this->db);
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

    public function GetById($id_gloria){
        return $this->model->GetById($id_gloria);
    }
}

$obj = new SaludController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id_gloria = $_GET['idgloria'];
    echo json_encode($obj->GetById($id_gloria));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_gloria = $_POST['id_gloria'];
    $enfermedad = $_POST['enfermedad'];
    $especifique = $_POST['especifique'];
    $diagnostico = $_POST['diagnostico'];
    $tratamiento = $_POST['tratamiento'];
    $cumple = $_POST['cumple'];
    $institucion = $_POST['institucion'];
    $discapacitado = $_POST['discapacitado'];
    $indique = $_POST['indique'];
    $insert = $_POST['insert'];

    $data = [
        'id_gloria' => $id_gloria,
        'enfermedad' => $enfermedad,
        'especifique' => $especifique,
        'diagnostico' => $diagnostico,
        'tratamiento' => $tratamiento,
        'cumple' => $cumple,
        'institucion' => $institucion,
        'discapacitado' => $discapacitado,
        'indique' => $indique,
    ];

    if ($insert == 'true') {
        if ($obj->Create($data)) {
            echo json_encode(['message' => 'Salud record created successfully']);
        } else {
            echo json_encode(['message' => 'Failed to create salud record']);
        }
    } else {
        if ($obj->Update($data)) {
            echo json_encode(['message' => 'Salud record updated successfully']);
        } else {
            echo json_encode(['message' => 'Failed to update salud record']);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $data);
    $id_gloria = $data['id_gloria'];

    if ($obj->Delete($id_gloria)) {
        echo json_encode(['message' => 'Salud record deleted successfully']);
    } else {
        echo json_encode(['message' => 'Failed to delete salud record']);
    }
}
?>
