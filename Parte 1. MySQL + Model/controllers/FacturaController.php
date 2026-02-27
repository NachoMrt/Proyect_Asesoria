<?php
require_once "models/Factura.php";
require_once "models/Cliente.php";
require_once "models/Asesor.php";
require_once "models/Servicio.php";

class FacturaController {
    public function index() {
        $factura = new Factura();
        $datos = $factura->getAll();
        require "views/factura/listar.php";
    }

    public function crear() {
        $c = new Cliente(); $clientes = $c->getAll();
        $a = new Asesor();  $asesores = $a->getAll();
        $s = new Servicio(); $servicios = $s->getAll();
        require "views/factura/crear.php";
    }

    public function guardar() {
        $factura = new Factura();
        $factura->save($_POST['id_cliente'], $_POST['id_asesor'], $_POST['id_servicio'], $_POST['costo']);
        header("Location: index.php?controller=factura&action=index");
    }

    public function eliminar() {
        $factura = new Factura();
        $factura->delete($_GET['id']);
        header("Location: index.php?controller=factura&action=index");
    }
}