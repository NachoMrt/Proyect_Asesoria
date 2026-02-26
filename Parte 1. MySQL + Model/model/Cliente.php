
<?php

require_once 'config/database.php';

class Cliente
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function getAll()
    {
        return $this->db->query("SELECT * FROM clientes")->fetchAll();
    }
    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM clientes WHERE id_cliente=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    public function save($nombre, $email, $dnie, $telefono)
    {
        $stmt = $this->db->prepare("INSERT INTO clientes VALUES(NULL,?,?,?,?)");
        $stmt->execute([$nombre, $dnie, $email, $telefono]);
    }
    public function update($id, $nombre, $email, $dnie, $telefono)
    {
        $stmt = $this->db->prepare("UPDATE clientes SET nombre=?,email=?, dnie=?, telefono=? WHERE id_cliente=?");
        $stmt->execute([$nombre, $dnie, $email, $telefono, $id]);
    }
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM clientes WHERE id_cliente=?");
        $stmt->execute([$id]);
    }
}
