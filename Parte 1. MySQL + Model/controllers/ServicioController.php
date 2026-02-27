<?php
require_once "models/Servicio.php";

class ServicioController {
    public function index() {
        $servicio = new Servicio();
        $datos = $servicio->getAll();
        require "views/servicio/listar.php";
    }

    public function crear() {
        require "views/servicio/editar.php";
    }

    public function editar() {
        $servicio = new Servicio();
        $id = $_GET['id'];
        $item = $servicio->getById($id);
        require "views/servicio/editar.php";
    }

    public function guardar() {
        $servicio = new Servicio();
        if (isset($_POST['id_servicio']) && !empty($_POST['id_servicio'])) {
            $servicio->update($_POST['id_servicio'], $_POST['nombre'], $_POST['precio']);
        } else {
            $servicio->save($_POST['nombre'], $_POST['precio']);
        }
        header("Location: index.php?controller=servicio&action=index");
    }

    public function eliminar() {
        $servicio = new Servicio();
        $servicio->delete($_GET['id']);
        header("Location: index.php?controller=servicio&action=index");
    }

  
}