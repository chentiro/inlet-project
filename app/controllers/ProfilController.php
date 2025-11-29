<?php
// app/controllers/ProfilController.php

class ProfilController {
    public function index() {
        // Konten Profil sifatnya statis (atau diambil dari satu baris DB config).
        // Kita hanya perlu memuat views.
        
        // Asumsi ROOT_PATH sudah didefinisikan di index.php
        include ROOT_PATH . 'views/layouts/header.php';
        include ROOT_PATH . 'views/layouts/navbar.php';
        
        // Memuat View Profil & Sejarah
        include ROOT_PATH . 'views/public/profil.php'; 
        
        include ROOT_PATH . 'views/layouts/footer.php';
    }
}