<?php

require_once __DIR__ . '/../controllers/FacturaController.php';
require_once __DIR__ . '/../controllers/ServicioController.php';
require_once __DIR__ . '/../controllers/AsesorController.php';
require_once __DIR__ . '/../controllers/ClienteController.php';

class Router
{
    private $controllerF;
    private $controllerS;
    private $controllerA;
    private $controllerC;


    public function __construct()
    {
        $this->controllerF = new FacturaController();
        $this->controllerS = new ServicioController();
        $this->controllerA = new AsesorController();
        $this->controllerC = new ClienteController();
    }

    public function route($method, $uri, $data = null)
    {
        $parts = explode('/', trim($uri, '/'));

        if ($parts[0] != 'facturas' && $parts[0] != 'asesores' && $parts[0] != 'clientes' && $parts[0] != 'servicios') {
            http_response_code(404);
            echo json_encode(['mensaje' => 'Ruta no encontrada']);
            return;
        }

        $id = $parts[1] ?? null;

        if ($parts[0] === 'facturas') {
            switch ($method) {
                case 'GET':
                    $id ? $this->controllerF->show($id) : $this->controllerF->index();
                    break;
                case 'POST':
                    $this->controllerF->store($data);
                    break;
                case 'PUT':
                    if (!$id) {
                        http_response_code(400);
                        echo json_encode(['mensaje' => 'ID requerido']);
                        return;
                    }
                    $this->controllerF->update($id, $data);
                    break;
                case 'DELETE':
                    if (!$id) {
                        http_response_code(400);
                        echo json_encode(['mensaje' => 'ID requerido']);
                        return;
                    }
                    $this->controllerF->delete($id);
                    break;
                default:
                    http_response_code(405);
                    echo json_encode(['mensaje' => 'Método no permitido']);
            }

        }

        if ($parts[0] === 'servicios') {
            switch ($method) {
                case 'GET':
                    $id ? $this->controllerS->show($id) : $this->controllerS->index();
                    break;
                case 'POST':
                    $this->controllerS->store($data);
                    break;
                case 'PUT':
                    if (!$id) {
                        http_response_code(400);
                        echo json_encode(['mensaje' => 'ID requerido']);
                        return;
                    }
                    $this->controllerS->update($id, $data);
                    break;
                case 'DELETE':
                    if (!$id) {
                        http_response_code(400);
                        echo json_encode(['mensaje' => 'ID requerido']);
                        return;
                    }
                    $this->controllerS->delete($id);
                    break;
                default:
                    http_response_code(405);
                    echo json_encode(['mensaje' => 'Método no permitido']);
            }
        }

        if ($parts[0] === 'asesores') {
            switch ($method) {
                case 'GET':
                    $id ? $this->controllerA->show($id) : $this->controllerA->index();
                    break;
                case 'POST':
                    $this->controllerA->store($data);
                    break;
                case 'PUT':
                    if (!$id) {
                        http_response_code(400);
                        echo json_encode(['mensaje' => 'ID requerido']);
                        return;
                    }
                    $this->controllerA->update($id, $data);
                    break;
                case 'DELETE':
                    if (!$id) {
                        http_response_code(400);
                        echo json_encode(['mensaje' => 'ID requerido']);
                        return;
                    }
                    $this->controllerA->delete($id);
                    break;
                default:
                    http_response_code(405);
                    echo json_encode(['mensaje' => 'Método no permitido']);
            }
        }

        if ($parts[0] === 'clientes') {
            switch ($method) {
                case 'GET':
                    $id ? $this->controllerC->show($id) : $this->controllerC->index();
                    break;
                case 'POST':
                    $this->controllerC->store($data);
                    break;
                case 'PUT':
                    if (!$id) {
                        http_response_code(400);
                        echo json_encode(['mensaje' => 'ID requerido']);
                        return;
                    }
                    $this->controllerC->update($id, $data);
                    break;
                case 'DELETE':
                    if (!$id) {
                        http_response_code(400);
                        echo json_encode(['mensaje' => 'ID requerido']);
                        return;
                    }
                    $this->controllerC->delete($id);
                    break;
                default:
                    http_response_code(405);
                    echo json_encode(['mensaje' => 'Método no permitido']);
            }
        }
    }
}