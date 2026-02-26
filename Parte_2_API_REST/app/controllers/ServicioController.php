<?php

require_once __DIR__ . "/../models/Servicio.php";

class ServicioController
{
    public function index()
    {
        echo json_encode(Servicio::all());
    }

    public function show($id)
    {
        $servicio = Servicio::find($id);
        if (!$servicio) {
            http_response_code(404);
            echo json_encode(['mensaje' => 'Servicio no encontrada']);
        } else {
            echo json_encode($servicio);
        }
    }

    public function store($data)
    {
        if (!isset($data['nombre_servicio']) || !isset($data['precio'])) {
            http_response_code(400);
            echo json_encode(['mensaje' => 'Datos incompletos']);
            return;
        }
        $servicio = Servicio::create($data);
        http_response_code(201);
        echo json_encode($servicio);
    }

    public function update($id, $data)
    {
        $servicio = Servicio::update($id, $data);
        if (!$servicio) {
            http_response_code(404);
            echo json_encode(['mensaje' => 'Servicio no encontrada']);
        } else {
            echo json_encode($servicio);
        }
    }

    public function delete($id)
    {
        $result = Servicio::delete($id);
        if ($result) {
            echo json_encode(['mensaje' => 'Servicio eliminado']);
        } else {
            http_response_code(404);
            echo json_encode(['mensaje' => 'Servicio no encontrado']);
        }
    }
}