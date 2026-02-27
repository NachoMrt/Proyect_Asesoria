<?php

require_once __DIR__ . "/../models/Factura.php";

class ClienteController {
    public function index() {
        $u = new Cliente();
        $clientes = $u->getAll();
        require 'views/clientes.php';
    }
    public function crear() {
        /*  La PRIMERA VEZ :
                NO hay POST -> $_POST está vacío -> El if($_POST) NO entra -> Ejecuta el require
            La SEGUNDA VEZ:
                Ahora SÍ hay POST -> $_POST contiene nombre y email -> El if($_POST) SÍ entra ;
                    Guarda en BD y Redirige al listado
        */
        if($_POST){
            (new Cliente())->save($_POST['nombre'],$_POST['dnie'],$_POST['email'],$_POST['telefono']);
            header("Location: index.php");
        }
        require 'views/crear_cliente.php';
    }
    public function editar() {
        // En DOS pasos como método anterior de crear()
        $u = new Cliente();
        if($_POST){
            $u->update($_POST['nombre'],$_POST['dnie'],$_POST['email'],$_POST['telefono'],$_POST['id_cliente']);
            header("Location: index.php");
        }
        $data = $u->getById($_GET['id_cliente']);
        require 'views/editar_cliente.php';
    }
    public function eliminar() {
        (new Cliente())->delete($_GET['id_cliente']);
        header("Location: index.php");
    }

}




