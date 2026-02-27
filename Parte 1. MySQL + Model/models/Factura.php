<?php
require_once 'config/database.php';

class Factura
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function getAll(): array
    {
        return $this->db->query("SELECT * FROM factura")->fetchAll();
    }

    public function getById($id): mixed
    {
        $stmt = $this->db->prepare("SELECT * FROM factura WHERE id_factura=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // No hace falta fecha porque esta como CURDATE() en la consulta SQL
    public function save($id_cliente, $id_asesor, $id_servicio, $costo): void
    {
        $stmt = $this->db->prepare("INSERT INTO factura (id_cliente, id_asesor, id_servicio, fecha, costo) VALUES (?,?,?,CURDATE(),?)");
        $stmt->execute([$id_cliente, $id_asesor, $id_servicio, $costo]);
    }

    public function delete($id): void
    {
        $stmt = $this->db->prepare("DELETE FROM factura WHERE id_factura=?");
        $stmt->execute([$id]);
    }

    public function update($id_cliente, $id_asesor, $id_servicio, $costo, $id_factura): void
    {
        $stmt = $this->db->prepare("UPDATE factura  SET id_cliente = ?, id_asesor = ?, id_servicio = ?, fecha = ?, costo = ? WHERE id_factura = ?");
        $stmt->execute([$id_cliente, $id_asesor, $id_servicio, $costo, $id_factura]);
    }
}
