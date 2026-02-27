<?php

require_once __DIR__ . "/../models/cliente.php";

class ClienteController
{
    public function index()
    {
        echo json_encode(Cliente::all());
    }

    public function show($id_cliente)
    {
        $cliente = Cliente::find($id_cliente);
        if (!$cliente) {
            http_response_code(404);
            echo json_encode(['mensaje' => 'Cliente no encontrada']);
        } else {
            echo json_encode($cliente);
        }
    }

    public function store($data)
    {
        if (!isset($data['id_cliente']) || !isset($data['nombre']) || !isset($data['dnie']) || !isset($data['email']) || !isset($data['edad']) ) {
            http_response_code(400);
            echo json_encode(['mensaje' => 'Datos incompletos']);
            return;
        }
        $cliente = Cliente::create($data);
        http_response_code(201);
        echo json_encode($cliente);
    }

    public function update($id_cliente, $data)
    {
        $cliente = Cliente::update($id_cliente, $data);
        if (!$cliente) {
            http_response_code(404);
            echo json_encode(['mensaje' => 'Cliente no encontrada']);
        } else {
            echo json_encode($cliente);
        }
    }

    public function delete($id)
    {
        $result = Cliente::delete($id);
        if ($result) {
            echo json_encode(['mensaje' => 'Cliente eliminado']);
        } else {
            http_response_code(404);
            echo json_encode(['mensaje' => 'Cliente no encontrado']);
        }
    }
}