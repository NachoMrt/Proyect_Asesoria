<?php

require_once __DIR__ . "/../models/Factura.php";

class AsesorController {
    public function index() {
        $u = new Asesor();
        $clientes = $u->getAll();
        require 'views/asesores.php';
    }
    public function crear() {
        /*  La PRIMERA VEZ :
                NO hay POST -> $_POST está vacío -> El if($_POST) NO entra -> Ejecuta el require
            La SEGUNDA VEZ:
                Ahora SÍ hay POST -> $_POST contiene nombre y email -> El if($_POST) SÍ entra ;
                    Guarda en BD y Redirige al listado
        */
        if($_POST){
            (new Asesor())->save($_POST['nombre'],$_POST['especialidad'],$_POST['email']);
            header("Location: index.php");
        }
        require 'views/crear_asesor.php';
    }
    public function editar() {
        // En DOS pasos como método anterior de crear()
        $u = new Asesor();
        if($_POST){
            $u->update($_POST['nombre'],$_POST['especialidad'],$_POST['email'],$_POST['id_asesor']);
            header("Location: index.php");
        }
        $data = $u->getById($_GET['id_asesor']);
        require 'views/editar_asesor.php';
    }
    public function eliminar() {
        (new Asesor())->delete($_GET['id_asesor']);
        header("Location: index.php");
    }
}




