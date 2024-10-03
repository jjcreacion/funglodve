<?php
require_once "../models/subsedesModel.php";
require_once '../config/conexion.php';

class subsedesController{
    private $model;
    private $db;
    
    public function  __construct()
    {
        $this->db = Conexion::getConnection();
        $this->model = new Subsedes($this->db);
    }

    public function ListAll(){
        $resp= $this->model->read();
        return $resp->fetchAll(PDO::FETCH_ASSOC);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sub = new subsedesController();
    echo json_encode($sub->ListAll());
}

?>   
