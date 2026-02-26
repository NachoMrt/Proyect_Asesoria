<?php
require_once 'config/database.php';

class Asesor
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getAll(): array
    {
        return $this->db->query("SELECT * FROM asesor")->fetchAll();
    }

    public function getById($id): mixed
    {
        $stmt = $this->db->prepare("SELECT * FROM asesor WHERE id_asesor=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function save($nombre, $especialidad, $email): void
    {
        $stmt = $this->db->prepare("INSERT INTO asesor (nombre, especialidad, email) VALUES (?,?,?)");
        $stmt->execute([$nombre, $especialidad, $email]);
    }

    public function update($id, $nombre, $especialidad, $email): void
    {
        $stmt = $this->db->prepare("UPDATE asesor SET nombre=?, especialidad=?, email=? WHERE id_asesor=?");
        $stmt->execute([$nombre, $especialidad, $email, $id]);
    }

    public function delete($id): void
    {
        $stmt = $this->db->prepare("DELETE FROM asesor WHERE id_asesor=?");
        $stmt->execute([$id]);
    }
}
