<?php
require_once "./models/Cliente.php";

class ClienteController
{

    public function index()
    {
        $cliente = new Cliente();
        $datos = $cliente->getAll();
        require "views/cliente/listar.php";
    }

    public function crear()
    {
        require "views/cliente/crear.php";
    }

    public function guardar()
    {
        $cliente = new Cliente();
        $cliente->save(
            $_POST['nombre'],
            $_POST['dnie'],
            $_POST['email'],
            $_POST['telefono']
        );
        header("Location: index.php?controller=cliente&action=index");
    }

    public function eliminar()
    {
        $cliente = new Cliente();
        $cliente->delete($_GET['id']);
        header("Location: index.php?controller=cliente&action=index");
    }

    public function editar()
    {
        $cliente = new Cliente();
        $cliente->update(
            $_POST['id_cliente'],
            $_POST['nombre'],
            $_POST['email'],
            $_POST['dnie'],
            $_POST['telefono']
        );
    }
}
