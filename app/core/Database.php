<?php
// core/Database.php

// --- Konfigurasi Database (Sesuaikan dengan milik Anda!) ---
define('DB_HOST', 'localhost');
define('DB_USER', 'postgres');
define('DB_PASS', 'admin1234');
define('DB_NAME', 'db_inlet');
define('DB_CHARSET', 'utf8mb4');
// --------------------------------------------------------

class Database {
    private static $instance = null;
    private $pdo;
    private $dsn;
    
    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // core/Database.php

private function __construct() {
    // UBAH BARIS INI: Dari "mysql:host..." menjadi "pgsql:host..."
    $this->dsn = "pgsql:host=" . DB_HOST . ";dbname=" . DB_NAME; 
    
    // DB_CHARSET dan option PDO::ATTR_EMULATE_PREPARES tidak diperlukan untuk DSN pgsql
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    try {
        $this->pdo = new PDO($this->dsn, DB_USER, DB_PASS, $options);
    } catch (PDOException $e) {
        die("Koneksi Database Gagal: " . $e->getMessage());
    }
}

    public function getConnection() {
        return $this->pdo;
    }
}