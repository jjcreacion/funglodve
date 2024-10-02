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
        return $resp;
    }
}

$sub = new subsedesController();
$sub->ListAll();
 ?>   
