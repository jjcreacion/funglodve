<?php
require_once '../models/dependientesModel.php';
require_once '../config/conexion.php';

class DependientesController {
    private $model;
    private $db;
    
    public function __construct() {
        $this->db = Conexion::getConnection();
        $this->model = new Dependiente($this->db);
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

$dependiente = new DependientesController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['idgloria'];
    echo json_encode($dependiente->GetById($id));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'id_gloria' => $_POST['idGloria'],
        'id_dependiente'=> $_POST['idDependiente'],
        'nombre' => $_POST['nombreDep'],
        'parentesco' => $_POST['parentescoDep'],
        'grado' => $_POST['gradoDep'],
        'ocupacion' => $_POST['ocupacionDep'],
        'ingreso' => $_POST['ingresoDep'],
        'telefono' => $_POST['telefonoDep'],
        'f_nac' => $_POST['f_nacDep']
    ];
    
    $insert = $_POST['insert'];
    
    if ($insert == 'true') {
        if ($dependiente->Create($data)) {
            echo json_encode(['message' => 'Dependiente creado exitosamente']);
        } else {
            echo json_encode(['message' => 'Error al crear el dependiente']);
        }
    } else {
        $data['id'] = $_POST['id'];
        if ($dependiente->Update($data)) {
            echo json_encode(['message' => 'Dependiente actualizado exitosamente']);
        } else {
            echo json_encode(['message' => 'Error al actualizar el dependiente']);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $data);
    $idDependiente = $data['idDependiente'];  

    if ($dependiente->Delete($idDependiente)) {
        echo json_encode(['message' => 'Dependiente eliminado exitosamente']);
    } else {
        echo json_encode(['message' => 'Error al eliminar el dependiente']);
    }
}
?>
