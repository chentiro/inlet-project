<?php

require_once __DIR__ . '/../app/core/Env.php';
loadEnv(__DIR__ . '/../.env');
define('BASE_URL', 'http://inlet-project.test/');
define('ROOT_PATH', dirname(__DIR__) . '/');


// 1. Ambil URL Path yang diminta
$url = $_SERVER['REQUEST_URI'];
$url = trim($url, '/'); 

// 2. Routing Sederhana (MVP)
if (empty($url)) {
    require_once '../app/controllers/HomeController.php';
    $controller = new HomeController();
    $controller->index(); 
} else {
    http_response_code(404);
    echo "<h1>404 Not Found</h1>";
}