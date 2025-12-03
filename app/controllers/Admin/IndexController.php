<?php


class IndexController {
    public function index() {
        
        include '../views/layouts/header_admin.php';
        include '../views/layouts/sidebar.php';
        include '../views/layouts/admin_wrapper_start.php'; // KUNCI KEBERHASILAN LAYOUT
        include '../views/admin/dashboard.php'; // Atau konten spesifik lain
        include '../views/layouts/admin_footer.php';
    }
}