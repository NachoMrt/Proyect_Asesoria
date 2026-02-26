<?php
class Asesor
{
    public $id_asesor;
    public $nombre;
    public $especialidad;
    public $email;

    public function __construct($nombre, $especialidad, $email, $id_asesor = null)
    {
        $this->id_asesor = $id_asesor;
        $this->nombre = $nombre;
        $this->especialidad = $especialidad;
        $this->email = $email;
    }
}
