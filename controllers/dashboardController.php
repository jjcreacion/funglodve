<?
require_once 'modelos/DashboardModel.php';

class DashboardController {
    private $modelo;

    public function __construct() {
        $this->modelo = new DashboardModel();
    }

    public function mostrarVista() {
        $datos = $this->modelo->obtenerDatos();
        require 'vistas/index.php';
    }
}
