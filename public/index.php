<?php
// public/index.php

// 1. Define Project Root
define('ROOT_PATH', dirname(__DIR__) . '/'); 

// 2. Load Env (Penting untuk Config Database)
require_once ROOT_PATH . 'app/core/Env.php';
if (file_exists(ROOT_PATH . '.env')) {
    loadEnv(ROOT_PATH . '.env');
}

// 3. Define BASE_URL (Ambil dari .env atau Default)
$baseUrl = isset($_ENV['BASE_URL']) ? $_ENV['BASE_URL'] : 'http://localhost/inlet-project/public';
define('BASE_URL', $baseUrl);

// --- LOGIKA ROUTING PINTAR (FIX 404) ---
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$scriptName = dirname($_SERVER['SCRIPT_NAME']);

// Trik: Hapus folder path (inlet-project/public) dari URL agar dapat 'home' yang bersih
// str_ireplace membuatnya case-insensitive (huruf besar/kecil tidak masalah)
$urlPath = str_ireplace($scriptName, '', $requestUri);
$url = trim($urlPath, '/'); 

// Pecah URL jadi segmen
$segments = explode('/', $url);

// Controller Default: Home (Jika kosong, panggil Home)
$controllerName = empty($segments[0]) ? 'Home' : ucfirst($segments[0]); 

// Tentukan Lokasi File Controller
$controllerFile = ROOT_PATH . 'app/controllers/' . $controllerName . 'Controller.php';

// 4. EKSEKUSI CONTROLLER
if (file_exists($controllerFile)) {
    require_once $controllerFile;
    
    // Pastikan nama class controller sesuai standar (pake "Controller")
    $controllerClass = $controllerName . 'Controller';
    $controller = new $controllerClass();
    
    // Method Default: index
    $methodName = isset($segments[1]) && !empty($segments[1]) ? $segments[1] : 'index';
    
    if (method_exists($controller, $methodName)) {
        $params = array_slice($segments, 2);
        call_user_func_array([$controller, $methodName], $params);
    } else {
        http_response_code(404);
        echo "<h1>404: Method '$methodName' Tidak Ditemukan</h1>";
    }
} else {
    // Debugging: Tampilkan kenapa 404 muncul (Biar kamu tahu dia nyari file apa)
    http_response_code(404);
    echo "<div style='font-family:sans-serif; text-align:center; padding:50px;'>";
    echo "<h1 style='color:red;'>404 Not Found</h1>";
    echo "<h3>Sistem tidak bisa menemukan file Controller.</h3>";
    echo "<p>URL bersih yang dibaca: <strong>" . htmlspecialchars($url) . "</strong></p>";
    echo "<p>Mencari file di: <strong>" . htmlspecialchars($controllerFile) . "</strong></p>";
    echo "</div>";
}