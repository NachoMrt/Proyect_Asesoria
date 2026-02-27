<?php

require_once __DIR__.'config/database.php';

class Asesor {
    private $db;
    public function __construct() {
        $this->db = Database::connect();
    }
    public function getAll() {
        return $this->db->query("SELECT * FROM asesores")->fetchAll();
    }
    public function getById($id_asesor) {
        $stmt = $this->db->prepare("SELECT * FROM asesores WHERE id_asesor=?");
        $stmt->execute([$id_asesor]);
        return $stmt->fetch();
    }
    public function save($nombre,$especialidad,$email) {
        $stmt = $this->db->prepare("INSERT INTO asesores VALUES(NULL,?,?,?)");
        $stmt->execute([$nombre,$especialidad,$email]);
    }
   
    public function update($nombre,$especialidad,$email, $id_asesor) {
    $stmt = $this->db->prepare(
        "UPDATE asesores SET nombre=?, especialidad=?, email=? WHERE id_asesor=?"
    );
    $stmt->execute([$nombre,$especialidad,$email, $id_asesor]);
}

    public function delete($id_asesor) {
        $stmt = $this->db->prepare("DELETE FROM asesores WHERE id_asesor=?");
        $stmt->execute([$id_asesor]);
    }

}




