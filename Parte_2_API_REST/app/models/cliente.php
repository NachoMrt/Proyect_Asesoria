<?php

require_once __DIR__ . '/../Core/database.php';

class Cliente {

    public static function all() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM clientes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id_cliente) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM clientes WHERE id_cliente = ?");
        $stmt->execute([$id_cliente]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO clientes (nombre,dnie,email,telefono) VALUES (?, ?, ?, ?)");
        $stmt->execute([$data['nombre'], $data['dnie'], $data['email'],$data['telefono'] ]);
        return self::find($db->lastInsertId());
    }

    public static function update($id_cliente, $data) {
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE clientes SET nombre = ?, dnie = ?, email = ?, telefono = ? WHERE id_cliente = ?");
        $stmt->execute([$data['nombre'],$data['dnie'], $data['email'],$data['telefono'], $id_cliente]);
        return self::find($id_cliente);
    }

    public static function delete($id_cliente) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM clientes WHERE id_cliente = ?");
        return $stmt->execute([$id_cliente]);
    }

}


