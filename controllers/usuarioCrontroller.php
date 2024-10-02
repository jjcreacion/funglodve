<?php
require_once '../models/UsuarioModel.php';
require_once '../views/UsuarioView.php';

class UsuarioController {
    private $modelo;
    private $vista;

    public function __construct($nombre) {
        $this->modelo = new UsuarioModel($nombre);
        $this->vista = new UsuarioView();
    }

    public function mostrarUsuario() {
        $nombre = $this->modelo->getNombre();
        $this->vista->mostrarNombre($nombre);
    }
}
?>
