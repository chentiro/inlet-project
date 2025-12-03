<?php
// File: app/core/Database.php

class Database {
    private $dbh; // Database Handler (Koneksi PDO)
    private $stmt; // Statement yang disiapkan
    
    public function __construct() {
        // Ambil nilai dari environment (Wajib: Asumsi file .env sudah di-load)
        $dbHost = getenv('DB_HOST') ?? 'localhost';
        $dbPort = getenv('DB_PORT') ?? '5432';
        $dbName = getenv('DB_NAME') ?? 'db_inlet';
        $dbUser = getenv('DB_USER') ?? 'postgres';
        $dbPass = getenv('DB_PASS') ?? 'admin1234'; 

        // Data Source Name (DSN) untuk PostgreSQL
        $dsn = 'pgsql:host=' . $dbHost . ';port=' . $dbPort . ';dbname=' . $dbName;

        $option = [
            // Koneksi tetap (Persistent connection)
            PDO::ATTR_PERSISTENT => true, 
            // Mode error: Exception (Terbaik untuk debugging)
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $dbUser, $dbPass, $option);
            // Tambahan: Set Charset untuk kompatibilitas
            $this->dbh->exec("SET NAMES 'utf8'"); 
        } catch(PDOException $e) {
            // Tangani kegagalan koneksi
            die('Koneksi PostgreSQL Gagal: ' . $e->getMessage());
        }
    }

    // Metode untuk menyiapkan prepared statement (Sama dengan prepare() di PDO)
    public function query($query) {
        $this->stmt = $this->dbh->prepare($query);
    }
    
    // Metode untuk binding value (Type checking sudah bagus)
    public function bind($param, $value, $type = null) {
        if(is_null($type)) {
            switch(true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute() {
        return $this->stmt->execute();
    }

    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount() {
        return $this->stmt->rowCount();
    }
    
    // Koreksi untuk PostgreSQL: Menerima nama sequence opsional
    public function lastInsertId($sequenceName = null) {
        return $this->dbh->lastInsertId($sequenceName);
    }
}
?>