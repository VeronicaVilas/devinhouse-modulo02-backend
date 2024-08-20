<?php
require_once '../config.php';
require_once '../controller/PlaceController.php';

$method = $_SERVER['REQUEST_METHOD'];
$controller = new PlaceController();

if ($method === 'POST') {
    $controller->create();
}
?>