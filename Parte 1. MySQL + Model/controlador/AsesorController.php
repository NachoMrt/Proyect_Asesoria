<?php
require_once "models/Asesor.php";

class AsesorController {
    public function index() {
        $asesor = new Asesor();
        $datos = $asesor->getAll();
        require "views/asesor/listar.php";
    }

    public function crear() {
        require "views/asesor/crear.php";
    }

    public function guardar() {
        $asesor = new Asesor();
        if (isset($_POST['id_asesor']) && !empty($_POST['id_asesor'])) {
            $asesor->update($_POST['id_asesor'], $_POST['nombre'], $_POST['especialidad'], $_POST['email']);
        } else {
            $asesor->save($_POST['nombre'], $_POST['especialidad'], $_POST['email']);
        }
        header("Location: index.php?controller=asesor&action=index");
    }

    public function editar() {
        $asesor = new Asesor();
        $id = $_GET['id'];
        $item = $asesor->getById($id);
        require "views/asesor/crear.php";
    }

    public function eliminar() {
        $asesor = new Asesor();
        $asesor->delete($_GET['id']);
        header("Location: index.php?controller=asesor&action=index");
    }
}