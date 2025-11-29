<?php
// app/controllers/KegiatanController.php

// (Asumsi Model sudah di-require untuk data real)

class KegiatanController {
    
    // Metode untuk menampilkan daftar kegiatan (/kegiatan)
    public function index() {
        // [Gunakan Dummy Data atau Model call untuk $kegiatan_data]
        
        include ROOT_PATH . 'views/layouts/header.php';
        include ROOT_PATH . 'views/layouts/navbar.php';
        include ROOT_PATH . 'views/public/kegiatan.php'; // List Page
        include ROOT_PATH . 'views/layouts/footer.php';
    }

    // Metode untuk menampilkan detail kegiatan (/kegiatan/detail/ID)
    public function detail($id) {
        // [Gunakan Dummy Data atau Model call untuk mengambil 1 item kegiatan]
        $kegiatan = ['id' => $id, 'judul' => 'Contoh Berita ID ' . $id, 'tanggal' => '27 Nov 2025', 'tipe' => 'Berita', 'gambar_path' => 'images/kegiatan/default.jpg', 'konten_lengkap' => '<p>Ini adalah isi lengkap dari berita tersebut...</p>'];
        
        include ROOT_PATH . 'views/layouts/header.php';
        include ROOT_PATH . 'views/layouts/navbar.php';
        include ROOT_PATH . 'views/public/kegiatan_detail.php'; // Detail Page
        include ROOT_PATH . 'views/layouts/footer.php';
    }
}