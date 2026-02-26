<?php

require_once __DIR__ . '/../config/database.php';

class Servicio {
        public static function all() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM servicios");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM servicios WHERE id_servicio = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO servicios (nombre_servicio, precio) VALUES (?, ?)");
        $stmt->execute([$data['nombre_servicio'], $data['precio']]);
        return self::find($db->lastInsertId());
    }

    public static function update($id, $data) {
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE servicios SET nombre_servicio = ?, precio = ? WHERE id_servicio = ?");
        $stmt->execute([$data['nombre_servicio'], $data['precio'], $id]);
        return self::find($id);
    }

    public static function delete($id) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM servicios WHERE id_servicio = ?");
        return $stmt->execute([$id]);
    }

}