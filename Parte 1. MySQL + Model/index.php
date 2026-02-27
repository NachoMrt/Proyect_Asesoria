<?php
if (isset($_GET['api']) && $_GET['api'] === 'productos') {

    require_once ROOT_PATH . "/app/Controllers/ApiProductoController.php";

    $api = new ApiProductoController();
    $api->handleRequest();
    exit;
} ?>
<?php

// 1- Selecciono el controlador:
// Lee ?c= de la URL.
// Si no existe, usa Usuario por defecto.
$controller = $_GET['controller'] ?? 'cliente';
// 2- Selecciono la acción:
// Lee ?a= de la URL.
// Si no existe, llama a index().
$accion = $_GET['action'] ?? 'index';


require_once './controllers/' . ucfirst($controller) . 'Controller.php';


// 3- Carga el controlador:
// Incluye el archivo del controlador elegido.


// 4- Crea la instancia:
// Construye el nombre de la clase dinámicamente.
// Crea el objeto controlador.
$controllerName = $controller . 'Controller';
$controller = new $controllerName();
// 5- Ejecuta la acción:
// Llama al método indicado (index, crear, editar, etc.).
$controller->$accion();
