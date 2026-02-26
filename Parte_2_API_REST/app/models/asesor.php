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
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM asesores WHERE id_asesor=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    public function save($nombre,$especialidad,$email) {
        $stmt = $this->db->prepare("INSERT INTO asesores VALUES(NULL,?,?,?)");
        $stmt->execute([$nombre,$especialidad,$email]);
    }
    // public function update($id,$nombre,$email,$clave,$edad) {
    //     $stmt = $this->db->prepare("UPDATE asesores SET nombre=?,email=?,clave=?,edad=? WHERE id=?");
    //     $stmt->execute([$nombre,$email,$clave,$edad,$id]);
    // }
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




