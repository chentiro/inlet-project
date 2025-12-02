<?php
// public/index.php

// === WAJIB: DEFENISI & SETUP GLOBAL ===
define('ROOT_PATH', dirname(__DIR__) . '/'); 
// Sesuaikan BASE_URL dengan domain lokal Anda
define('BASE_URL', 'http://inlet-project.test/'); 

// Asumsi file ini ada dan mendefinisikan variabel lingkungan
require_once ROOT_PATH . 'app/core/Env.php';
// loadEnv(ROOT_PATH . '.env'); // Uncomment jika menggunakan .env

// 1. Ambil dan Bersihkan URL Path dari .htaccess
// Memerlukan RewriteRule ^(.*)$ index.php?url=$1 [QSA,L]
$url = $_GET['url'] ?? ''; 
$url = trim($url, '/');
$segments = explode('/', $url);

// 2. Tentukan Path, Controller, Method, dan Parameter
$controllerPath = 'app/controllers/'; // Default path
$controllerName = 'Home'; // Default Controller
$methodName = 'index'; // Default Method
$params = [];

// Penanganan Routing Admin
if (!empty($segments) && strtolower($segments[0]) === 'admin') {
    // Jika ada prefix 'admin', hapus segmen tersebut
    array_shift($segments); 
    // Controller Admin berada di folder/namespace 'Admin/'
    $controllerPath .= 'Admin/'; 
    
    // Controller default Admin adalah Dashboard
    $controllerName = empty($segments[0]) ? 'Dashboard' : ucfirst(array_shift($segments));
} else {
    // Routing Publik
    $controllerName = empty($segments[0]) ? 'Home' : ucfirst(array_shift($segments));
}

// Tentukan Class, File, Method, dan Parameter
$controllerClass = $controllerName . 'Controller';
$controllerFile = ROOT_PATH . $controllerPath . $controllerClass . '.php';

$methodName = isset($segments[0]) && !empty($segments[0]) ? $segments[0] : 'index'; 
$params = array_slice($segments, 1);

// 3. Eksekusi Controller
if (file_exists($controllerFile)) {
    require_once $controllerFile;
    
    // Instansiasi Controller (Contoh: new Admin\KelolaKontenController())
    // Note: Jika Anda menggunakan namespace, Anda perlu logic namespace di sini.
    $controller = new $controllerClass();

    if (method_exists($controller, $methodName)) {
        call_user_func_array([$controller, $methodName], $params);
    } else {
        http_response_code(404);
        echo "<h1>404 Not Found: Method '$methodName' Tidak Ditemukan</h1>";
    }
    
} else {
    // Controller (Halaman) tidak ditemukan
    http_response_code(404);
    echo "<h1>404 Not Found: Halaman '$controllerName' Tidak Ditemukan</h1>";
}