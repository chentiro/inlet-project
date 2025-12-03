<?php
// app/controllers/AuthController.php

// [Dependency]: Memuat Model User
require_once ROOT_PATH . '/app/models/User.php'; 

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
        // Mulai session di sini (atau di entry point index.php)
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Menampilkan form login (GET) dan memproses autentikasi (POST).
     */
    public function login() {
        // Jika user sudah login, redirect ke dashboard
        if (isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . 'admin/dashboard'); 
            exit;
        }

        $data = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $credential = trim($_POST['credential'] ?? '');
            $password = $_POST['password'] ?? '';

            $user = $this->userModel->findUserByCredentials($credential);

            if ($user && password_verify($password, $user['password_hash'])) {
                
                // --- SUKSES AUTENTIKASI ---
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                
                // Redirect ke halaman Admin Index
                header('Location: ' . BASE_URL . 'admin/dashboard'); 
                exit;

            } else {
                $data['error'] = "Username/Email atau password salah.";
            }
        }

        // Tampilkan Form Login
        $page_title = 'Login Admin INLET';
        
        extract($data); 
        include ROOT_PATH . '/views/auth/login.php'; 
    }
    
    /**
     * Keluar dari sesi (Logout).
     */
    public function logout() {
        session_unset();
        session_destroy();
        header('Location: ' . BASE_URL . 'auth/login'); 
        exit;
    }
}