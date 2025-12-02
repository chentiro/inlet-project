<?php
// public/index.php

// WAJIB: Define Project Root Global dan load .env
define('ROOT_PATH', dirname(__DIR__) . '/'); 
define('BASE_URL', 'http://inlet-project.test/'); // Sesuaikan
require_once ROOT_PATH . 'app/core/Env.php';
loadEnv(ROOT_PATH . '.env'); 

// 1. Ambil dan Bersihkan URL Path
$url = $_SERVER['REQUEST_URI'];
$url = trim(parse_url($url, PHP_URL_PATH), '/'); // Lebih aman mengambil path

// Pecah URL menjadi segmen (misal: ['riset', 'detail', '1'])
$segments = explode('/', $url);
$controllerName = empty($segments[0]) ? 'Home' : ucfirst($segments[0]); // Default Home

$controllerFile = ROOT_PATH . 'app/controllers/' . $controllerName . 'Controller.php';

// 2. LOGIKA ROUTING (Implementasi Sederhana)
if (file_exists($controllerFile)) {
    require_once $controllerFile;
    
    // Tentukan Nama Controller Class (e.g., HomeController)
    $controllerClass = $controllerName . 'Controller';
    $controller = new $controllerClass();
    
    // Tentukan Method yang akan dipanggil (default: index)
    $methodName = isset($segments[1]) && !empty($segments[1]) ? $segments[1] : 'index';
    
    if (method_exists($controller, $methodName)) {
        // Panggil Controller->Method dengan parameter tambahan (jika ada)
        $params = array_slice($segments, 2);
        call_user_func_array([$controller, $methodName], $params);
        
    } else {
        http_response_code(404);
        echo "<h1>404 Not Found: Method Tidak Ditemukan</h1>";
    }
    
} else {
    // Controller tidak ditemukan (misal: /halaman-yang-tidak-ada)
    http_response_code(404);
    echo "<h1>404 Not Found: Halaman Tidak Ditemukan</h1>";
}