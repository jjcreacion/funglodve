<?php
require_once '../models/nominasModel.php';
require_once '../config/conexion.php';

class NominasController{
    private $model;
    private $db;
    
    public function __construct() {
        $this->db = Conexion::getConnection();
        $this->model = new Nominas($this->db);
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

$nomina = new NominasController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode($nomina->ListAll());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idnomina = $_POST['idnomina'];
    $descripcion = $_POST['descripcion'];
    $institucion = $_POST['institucion'];
    $periodicidad = $_POST['periodicidad'];
    $tipo = $_POST['tipo'];
    $insert = $_POST['insert'];

    $data = [
        'idnomina' => $idnomina,
        'descripcion' => $descripcion,
        'institucion' => $institucion,
        'periodicidad' => $periodicidad,
        'tipo' => $tipo
    ];

    if($insert == 'true'){
        if ($nomina->Create($data)) {
            echo json_encode(['message' => 'Nómina creada exitosamente']);
        } else {
            echo json_encode(['message' => 'Error al crear la nómina']);
        }
    } else {
        if ($nomina->Update($data)) {
            echo json_encode(['message' => 'Nómina actualizada exitosamente']);
        } else {
            echo json_encode(['message' => 'Error al actualizar la nómina']);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $data);
    $idnomina = $data['idnomina'];  
   
    if ($nomina->Delete($idnomina)) {
        echo json_encode(['message' => 'Nómina eliminada exitosamente']);
    } else {
        echo json_encode(['message' => 'Error al eliminar la nómina']);
    }
}

?>
