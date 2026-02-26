<?php
require_once "models/Cliente.php";

class ClienteController {

    public function index() {
        $cliente = new Cliente();
        $datos = $cliente->obtenerTodos();
        require "views/cliente/listar.php";
    }

    public function crear() {
        require "views/cliente/crear.php";
    }

    public function guardar() {
        $cliente = new Cliente();
        $cliente->insertar(
            $_POST['nombre'],
            $_POST['dnie'],
            $_POST['email'],
            $_POST['telefono']
        );
        header("Location: index.php?controller=cliente&action=index");
    }
}
