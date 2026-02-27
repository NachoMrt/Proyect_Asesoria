
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
        return $this->db->query("SELECT * FROM cliente")->fetchAll();
    }
    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM cliente WHERE id_cliente=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    public function save($nombre, $dnie, $email, $telefono)
    {
        $stmt = $this->db->prepare("INSERT INTO cliente VALUES(NULL,?,?,?,?)");
        $stmt->execute([$nombre, $dnie, $email, $telefono]);
    }
    public function update($id, $nombre, $email, $dnie, $telefono)
    {
        $stmt = $this->db->prepare("UPDATE cliente SET nombre=?,email=?, dnie=?, telefono=? WHERE id_cliente=?");
        $stmt->execute([$nombre, $email, $dnie, $telefono, $id]);
    }
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM cliente WHERE id_cliente=?");
        $stmt->execute([$id]);
    }
}
