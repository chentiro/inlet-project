<?php
// app/controllers/RisetController.php

class RisetController {
    
    // Metode untuk menampilkan daftar riset (/riset)
    public function index() {
        // [Kode Dummy Data Index dari sesi sebelumnya ada di sini]
        // ...
        
        // Muat Views
        include ROOT_PATH . 'views/layouts/header.php';
        include ROOT_PATH . 'views/layouts/navbar.php';
        include ROOT_PATH . 'views/public/riset_list.php'; 
        include ROOT_PATH . 'views/layouts/footer.php';
    }

    // Metode untuk menampilkan detail riset (/riset/detail/ID)
    public function detail($riset_id) {
        // 1. DUMMY DATA (Menggantikan hasil dari RisetModel->getById($riset_id))
        $riset = [
            'id' => $riset_id,
            'judul' => 'Implementasi Jaringan Saraf Tiruan untuk Prediksi Cuaca di Malang Raya (ID: ' . $riset_id . ')',
            'penulis' => 'Dr. Purnomo, S.T., M.Kom. & Tim INLET',
            'tahun' => 2024,
            'kategori' => 'AI & IoT',
            'abstrak' => 'Studi kasus ini membahas penggunaan Convolutional Neural Network (CNN) dalam menganalisis data time-series iklim. Hasilnya menunjukkan peningkatan akurasi prakiraan cuaca sebesar 15% dibandingkan metode tradisional. Ini merupakan bagian dari proyek besar Learning Engineering Lab INLET.',
            'konten' => 'Isi konten lengkap penelitian, metodologi, dan hasil yang akan menjadi teks panjang di halaman detail.',
            'path_file' => 'files/riset_cuaca_2024.pdf' // Path file di server
        ];
        
        // 2. Muat Views menggunakan ROOT_PATH
        include ROOT_PATH . 'views/layouts/header.php';
        include ROOT_PATH . 'views/layouts/navbar.php';
        
        // Memuat View Detail
        include ROOT_PATH . 'views/public/riset_detail.php'; 
        
        include ROOT_PATH . 'views/layouts/footer.php';
    }
}