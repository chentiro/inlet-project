<?php

class LoginController {
    public function index() {
        include '../views/layouts/header.php';
        include '../views/admin/login.php';
        include '../views/layouts/footer.php';
    }

    public function store() {
        // Hapus output buffer jika ada (praktik yang baik sebelum mengirim header Location)
        if (ob_get_length()) {
            ob_end_clean();
        }
        
        // Definisikan BASE_URL (Jika belum global)
        // define('BASE_URL', 'http://inlet-project.test/');
        
        // Redirect ke route Admin Dashboard
        $dashboard_url = BASE_URL . 'admin/dashboard'; 
        
        header('Location: ' . $dashboard_url);
        exit(); // Penting untuk menghentikan eksekusi script setelah redirect
    }
}