<?php
require_once '../models/reportesModel.php';
require_once '../config/conexion.php';

class ReportesController {
    private $model;
    private $db;

public function __construct() {
        $this->db = Conexion::getConnection();
        $this->model = new Ivss($this->db);
    }

    public function becadosNobecados() {
        $resp = $this->model->becadosNobecados();
        return $resp->fetchAll(PDO::FETCH_ASSOC);
    }

    public function becadoscNobecadosPorMunicipios() {
        $resp = $this->model->becadoscNobecadosPorMunicipios();
        return $resp->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function totalPorSubsedes($subsede) {
        $resp = $this->model->totalPorSubsedes($subsede);
        return $resp->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function totalPorSubsedesBecados($subsede) {
        $resp = $this->model->totalPorSubsedesBecados($subsede);
        return $resp->fetchAll(PDO::FETCH_ASSOC);
    }

    public function totalPorSubsedesNoBecados($subsede) {
        $resp = $this->model->totalPorSubsedesNoBecados($subsede);
        return $resp->fetchAll(PDO::FETCH_ASSOC);
    }
        
}

$obj = new ReportesController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode($obj->becadosNobecados());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if($_POST['tipoBusqueda'] == 'subsede'){
        
        if($_POST['tipo'] == 'total'){
            echo json_encode($obj->totalPorSubsedes($_POST['subsede']));
        }
        else if($_POST['tipo'] == 'becados'){
            echo json_encode($obj->totalPorSubsedesBecados($_POST['subsede']));
        }
        else{
            echo json_encode($obj->totalPorSubsedesNoBecados($_POST['subsede']));
        }

    }
    else{
        echo json_encode($obj->becadoscNobecadosPorMunicipios());
    }
    
}


?>