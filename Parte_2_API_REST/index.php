<?php
if (isset($_GET['api']) && $_GET['api'] === 'productos') {

    require_once ROOT_PATH . "/app/Controllers/ClienteController.php";

    $api = new ClienteController();
    $api->handleRequest();
    exit;
}