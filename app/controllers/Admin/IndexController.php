<?php
// app/controllers/IndexController.php (Atau di mana pun Controller ini berada)

class IndexController {
    
    public function __construct() {
        // [Penting]: Session harus dimulai sebelum digunakan
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    public function index() {
        
        // 1. MEKANISME SESSION CHECK (Pengaman)
        if (!isset($_SESSION['user_id'])) {
            // Jika ID user belum ada di session, user belum login.
            
            // Redirect ke halaman Login
            header('Location: ' . BASE_URL . 'auth/login');
            exit; // Hentikan eksekusi script setelah redirect
        }
        
        // [OPSIONAL]: Tambahkan pengecekan role jika hanya admin yang boleh akses
        if ($_SESSION['role'] !== 'admin') {
            // Misalnya, redirect ke halaman error atau halaman user biasa
            header('Location: ' . BASE_URL . 'access/denied'); 
            exit; 
        }

        // 2. LOAD TAMPILAN ADMIN (Hanya jika lolos pengecekan)
        
        // Siapkan Layout (Anda bisa mendefinisikan page_title di sini)
        $page_title = 'Dashboard Utama INLET'; 
        
        include ROOT_PATH . '/views/layouts/header_admin.php'; // Asumsi ROOT_PATH sudah ada
        include ROOT_PATH . '/views/layouts/sidebar.php';
        include ROOT_PATH . '/views/layouts/admin_wrapper_start.php'; 
        include ROOT_PATH . '/views/admin/dashboard.php'; 
        include ROOT_PATH . '/views/layouts/admin_footer.php';
    }
}