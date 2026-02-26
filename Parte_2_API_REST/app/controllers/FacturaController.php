<?php

require_once __DIR__ . "/../models/Factura.php";

class FacturaController
{
    public function index()
    {
        echo json_encode(Factura::all());
    }

    public function show($id)
    {
        $factura = Factura::find($id);
        if (!$factura) {
            http_response_code(404);
            echo json_encode(['mensaje' => 'Factura no encontrada']);
        } else {
            echo json_encode($factura);
        }
    }

    public function store($data)
    {
        if (!isset($data['id_cliente']) || !isset($data['id_asesor']) || !isset($data['id_servicio']) || !isset($data['fecha']) || !isset($data['costo'])) {
            http_response_code(400);
            echo json_encode(['mensaje' => 'Datos incompletos']);
            return;
        }
        $factura = Factura::create($data);
        http_response_code(201);
        echo json_encode($factura);
    }

    public function update($id, $data)
    {
        $factura = Factura::update($id, $data);
        if (!$factura) {
            http_response_code(404);
            echo json_encode(['mensaje' => 'Factura no encontrada']);
        } else {
            echo json_encode($factura);
        }
    }

    public function delete($id)
    {
        $result = Factura::delete($id);
        if ($result) {
            echo json_encode(['mensaje' => 'Factura eliminado']);
        } else {
            http_response_code(404);
            echo json_encode(['mensaje' => 'Factura no encontrado']);
        }
    }
}