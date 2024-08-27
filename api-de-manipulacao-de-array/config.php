<?php
    date_default_timezone_set('America/Sao_Paulo');

    define('FILE_CITY', '../src/data/database.txt');
    define('FILE_REVIEWS', '../src/data/assessments.txt');

    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *"); 
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); 
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
?>