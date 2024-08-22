<?php
require_once '../config.php';
require_once '../controller/PlaceController.php';

$method = $_SERVER['REQUEST_METHOD'];
$controller = new PlaceController();

if ($method === 'POST') {
    $controller->create();
} else if ($method === 'GET' && !isset($_GET['id'])) {
    $controller->list();
} else if ($method === 'GET' && $_GET['id']) {
    $controller->listOne();
} else if ($method === 'DELETE') {
    $controller->delete();
}
?>