<?php

require_once __DIR__ . "/../models/asesor.php";

class AsesorController
{
    public function index()
    {
        echo json_encode(Asesor::all());
    }

    public function show($id_asesor)
    {
        $asesor = Asesor::find($id_asesor);
        if (!$asesor) {
            http_response_code(404);
            echo json_encode(['mensaje' => 'Asesor no encontrada']);
        } else {
            echo json_encode($asesor);
        }
    }

    public function store($data)
    {
        if (!isset($data['id_asesor']) || !isset($data['nombre']) || !isset($data['especialidad']) || !isset($data['email']) ) {
            http_response_code(400);
            echo json_encode(['mensaje' => 'Datos incompletos']);
            return;
        }
        $asesor = Asesor::create($data);
        http_response_code(201);
        echo json_encode($asesor);
    }

    public function update($id_asesor, $data)
    {
        $asesor = Asesor::update($id_asesor, $data);
        if (!$asesor) {
            http_response_code(404);
            echo json_encode(['mensaje' => 'Asesor no encontrada']);
        } else {
            echo json_encode($asesor);
        }
    }

    public function delete($id)
    {
        $result = Asesor::delete($id);
        if ($result) {
            echo json_encode(['mensaje' => 'Asesor eliminado']);
        } else {
            http_response_code(404);
            echo json_encode(['mensaje' => 'Asesor no encontrado']);
        }
    }
}