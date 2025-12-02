<?php

class KontenController {
    public function index() {
        // --- DATA LAYOUT DINAMIS ---
        $page_title = 'Kelola Konten'; // Diperlukan untuk judul halaman dan breadcrumb
        $current_page = 'konten';      // Diperlukan untuk mengaktifkan menu sidebar
        // ---------------------------
        
        // Panggil Views
        include '../views/layouts/header_admin.php';
        include '../views/layouts/sidebar.php';
        include '../views/layouts/admin_wrapper_start.php'; 
        include '../views/admin/kelola_konten.php'; 
        include '../views/layouts/admin_footer.php';
    }
}