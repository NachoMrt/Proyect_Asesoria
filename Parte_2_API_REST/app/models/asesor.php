<?php

require_once __DIR__ . '/../Core/database.php';

class Asesor {

    public static function all() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM asesores");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id_asesor) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM asesores WHERE id_asesor = ?");
        $stmt->execute([$id_asesor]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO asesores (nombre, especialidad, email) VALUES (?, ?, ?)");
        $stmt->execute([$data['nombre'], $data['especialidad'], $data['email']]);
        return self::find($db->lastInsertId());
    }

    public static function update($id_asesor, $data) {
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE asesores SET nombre = ?, especialidad = ?, email = ? WHERE id_asesor = ?");
        $stmt->execute([$data['nombre'],$data['especialidad'], $data['email'], $id_asesor]);
        return self::find($id_asesor);
    }

    public static function delete($id_asesor) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM asesores WHERE id_asesor = ?");
        return $stmt->execute([$id_asesor]);
    }

}



