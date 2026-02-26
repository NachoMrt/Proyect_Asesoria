<?php
class Factura
{
    public $id_factura;
    public $id_cliente;
    public $id_asesor;
    public $id_servicio;
    public $fecha;
    public $costo;

    public function __construct($id_cliente, $id_asesor, $id_servicio, $costo, $fecha = null, $id_factura = null)
    {
        $this->id_factura = $id_factura;
        $this->id_cliente = $id_cliente;
        $this->id_asesor = $id_asesor;
        $this->id_servicio = $id_servicio;
        $this->fecha = $fecha ?? date("Y-m-d");
        $this->costo = $costo;
    }
}
