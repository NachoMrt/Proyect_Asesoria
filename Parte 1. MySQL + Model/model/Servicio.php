<?php
require_once 'config/database.php';

class Servicio
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getAll(): array
    {
        return $this->db->query("SELECT * FROM servicios")->fetchAll();
    }

    public function getById($id): mixed
    {
        $stmt = $this->db->prepare("SELECT * FROM servicios WHERE id_servicio=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function save($nombre, $precio): void
    {
        $stmt = $this->db->prepare("INSERT INTO servicios (nombre_servicio, precio) VALUES (?,?)");
        $stmt->execute([$nombre, $precio]);
    }

    public function update($id, $nombre, $precio): void
    {
        $stmt = $this->db->prepare("UPDATE servicios SET nombre_servicio=?, precio=? WHERE id_servicio=?");
        $stmt->execute([$nombre, $precio, $id]);
    }

    public function delete($id): void
    {
        $stmt = $this->db->prepare("DELETE FROM servicios WHERE id_servicio=?");
        $stmt->execute([$id]);
    }
}
