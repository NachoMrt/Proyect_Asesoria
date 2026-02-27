<?php

header('Content-Type: application/json');
require_once __DIR__ . '/../app/config/Router.php';

$method = $_SERVER['REQUEST_METHOD'];   
$uri = $_SERVER['REQUEST_URI'];   
$uri = preg_replace('#^/Certificado/Proyect_Asesoria/Parte_2_API_REST/public(/index\.php)?#', '', $uri);
$uri = trim($uri, '/'); 

$data = json_decode(file_get_contents('php://input'), true);

$router = new Router();  
$router->route($method, $uri, $data);


/*
    GET: http://localhost/Certificado/Proyect_Asesoria/Parte_2_API_REST/public/index.php/factura
    GET: http://localhost/Certificado/Proyect_Asesoria/Parte_2_API_REST/public/index.php/factura/1 
    POST: http://localhost/Certificado/Proyect_Asesoria/Parte_2_API_REST/public/index.php/factura
        Headers:
            Content-Type: application/json
        Body ejemplo:
            {
                "id_cliente": "1",
                "id_asesor": "3",
                "id_servicio": "2",
                "fecha": "2026-01-27",
                "costo": "178",
            }
    PUT: http://localhost/Certificado/Proyect_Asesoria/Parte_2_API_REST/public/index.php/factura/1    
        Lo mismo Headers y Body
    DELETE: http://localhost/Certificado/Proyect_Asesoria/Parte_2_API_REST/public/index.php/factura/1  
*/