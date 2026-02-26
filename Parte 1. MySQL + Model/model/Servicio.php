<?php
class Servicio
{
    public $id_servicio;
    public $nombre_servicio;
    public $precio;

    public function __construct($nombre_servicio, $precio, $id_servicio = null)
    {
        $this->id_servicio = $id_servicio;
        $this->nombre_servicio = $nombre_servicio;
        $this->precio = $precio;
    }
}
