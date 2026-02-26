<?php

require_once __DIR__ . '/../config/database.php';

class Factura {
        public static function all() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM factura");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM factura WHERE id_factura = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO factura (id_cliente, id_asesor, id_servicio,fecha,costo) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$data['id_cliente'], $data['id_asesor'], $data['id_servicio'], $data['fecha'],$data['costo']]);
        return self::find($db->lastInsertId());
    }

    public static function update($id, $data) {
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE factura SET id_cliente = ?, id_asesor = ?, id_servicio = ?,  fecha = ?, costo = ? WHERE id_factura = ?");
        $stmt->execute([$data['id_cliente'], $data['id_asesor'],$data['id_servicio'],$data['fecha'], $data['costo'], $id]);
        return self::find($id);
    }

    public static function delete($id) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM factura WHERE id_factura = ?");
        return $stmt->execute([$id]);
    }

}