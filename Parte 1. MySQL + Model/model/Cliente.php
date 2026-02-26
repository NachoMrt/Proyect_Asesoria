<?php
class Cliente
{
    public $id_cliente;
    public $nombre;
    public $dnie;
    public $email;
    public $telefono;

    public function __construct($nombre, $dnie, $email, $telefono, $id_cliente = null)
    {
        $this->id_cliente = $id_cliente;
        $this->nombre = $nombre;
        $this->dnie = $dnie;
        $this->email = $email;
        $this->telefono = $telefono;
    }
}

