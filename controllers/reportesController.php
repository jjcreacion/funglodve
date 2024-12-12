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
}

$obj = new ReportesController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode($obj->becadosNobecados());
}


?>