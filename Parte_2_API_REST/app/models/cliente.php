<?php

require_once __DIR__.'config/database.php';

class Cliente {
    private $db;
    public function __construct() {
        $this->db = Database::connect();
    }
    public function getAll() {
        return $this->db->query("SELECT * FROM clientes")->fetchAll();
    }
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM clientes WHERE id_cliente=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    public function save($nombre,$dnie,$email,$telefono) {
        $stmt = $this->db->prepare("INSERT INTO clientes VALUES(NULL,?,?,?,?)");
        $stmt->execute([$nombre,$dnie,$email,$telefono]);
    }
    // public function update($id,$nombre,$email,$clave,$edad) {
    //     $stmt = $this->db->prepare("UPDATE clientes SET nombre=?,email=?,clave=?,edad=? WHERE id=?");
    //     $stmt->execute([$nombre,$email,$clave,$edad,$id]);
    // }
    public function update($nombre,$dnie,$email,$telefono, $id_cliente) {
    $stmt = $this->db->prepare(
        "UPDATE clientes SET nombre=?, dnie=?, email=?, telefono=? WHERE id_cliente=?"
    );
    $stmt->execute([$nombre,$dnie,$email,$telefono, $id_cliente]);
}

    public function delete($id_cliente) {
        $stmt = $this->db->prepare("DELETE FROM clientes WHERE id_cliente=?");
        $stmt->execute([$id_cliente]);
    }

}




