<?php
    require_once '../config.php';
    require_once './app/Http/Controllers/ReviewController.php';

    $method = $_SERVER['REQUEST_METHOD'];
    $controller = new ReviewController();

    if ($method === 'POST') {
        $controller->create();
    } else if ($method === 'GET' && !isset($_GET['id'])) {
        $controller->list();
    }
?>
