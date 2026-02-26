<?php
if (isset($_GET['api']) && $_GET['api'] === 'productos') {

    require_once ROOT_PATH . "/app/Controllers/ApiProductoController.php";

    $api = new ApiProductoController();
    $api->handleRequest();
    exit;
}