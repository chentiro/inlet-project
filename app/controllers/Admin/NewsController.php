<?php
// app/controllers/admin/NewsController.php (atau NewsController.php)

// [DEPENDENCY] Memuat Model News
require_once ROOT_PATH . '/app/models/News.php';

class NewsController {
    
    private $newsModel; 
    
    public function __construct() {
        // Instansiasi Model News (asumsi Database.php sudah di-load di dalam News.php)
        $this->newsModel = new News(); 
    }

    // ----------------------------------------------------------------------
    // 1. FUNGSI ADMIN: index() - Menampilkan Daftar Berita (CMS)
    // ----------------------------------------------------------------------
    public function index() {
        $data = [];
        
        // --- Logika Pagination ---
        $current_page = $_GET['page'] ?? 1; 
        $items_per_page = 5; 
        
        $total_items = $this->newsModel->getTotalNewsCount(); 
        $total_pages = ceil($total_items / $items_per_page);
        
        $current_page = max(1, min($current_page, $total_pages)); 
        $start_index = ($current_page - 1) * $items_per_page;
        $offset = $start_index;

        // --- Ambil Data dari Database ---
        $data['news_list'] = $this->newsModel->getNewsPaginated($items_per_page, $offset);

        // --- Kirim Variabel ke View ---
        $data['current_page'] = $current_page;
        $data['total_items'] = $total_items;
        $data['total_pages'] = $total_pages;
        $data['start_index'] = $start_index; 

        // Siapkan Layout
        $page_title = 'Kelola Konten Berita'; 
        $current_page_nav = 'konten'; 

        include ROOT_PATH . '/views/layouts/header_admin.php';
        include ROOT_PATH . '/views/layouts/sidebar.php';
        extract($data); // Membuat variabel data tersedia di View
        include ROOT_PATH . '/views/layouts/admin_wrapper_start.php'; 
        include ROOT_PATH . '/views/admin/news/index.php'; 
        include ROOT_PATH . '/views/layouts/admin_footer.php';
    }

    // ----------------------------------------------------------------------
    // 2. FUNGSI PUBLIK: detail($slug) - Menampilkan Detail Berita
    // ----------------------------------------------------------------------
    public function detail($slug) {
        
        $news_item = $this->newsModel->getNewsBySlug($slug);
        
        // Handler 404
        if (!$news_item) {
            http_response_code(404);
            $page_title = '404 Not Found';
            // Asumsi: Anda memiliki view 404 publik
            // include ROOT_PATH . '/views/layouts/header_public.php';
            // include ROOT_PATH . '/views/404.php'; 
            // include ROOT_PATH . '/views/layouts/footer_public.php';
            echo "404 Berita Tidak Ditemukan"; 
            exit;
        }

        // Data ditemukan
        $data = ['news' => $news_item];
        
        $page_title = $news_item['title']; 
        $current_page_nav = 'news';

        extract($data); 
        
       include ROOT_PATH . '/views/layouts/header_admin.php';
        include ROOT_PATH . '/views/layouts/sidebar.php';
        extract($data); // Membuat variabel data tersedia di View
        include ROOT_PATH . '/views/layouts/admin_wrapper_start.php'; 
        include ROOT_PATH . '/views/admin/news/detail.php'; 
        include ROOT_PATH . '/views/layouts/admin_footer.php';
    }

    // ----------------------------------------------------------------------
    // 3. FUNGSI ADMIN: create() - Menambah Berita Baru
    // ----------------------------------------------------------------------
    public function create() {
        $data = [];
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // --- A. VALIDASI & PENGAMBILAN DATA ---
            $title = htmlspecialchars($_POST['title'] ?? '');
            $body = $_POST['body'] ?? '';
            $published = isset($_POST['published']) ? 1 : 0; 
            
            if (empty($title)) {
                $data['error'] = "Judul tidak boleh kosong.";
            } else {
                $slug = $this->generateSlug($title);

                // --- B. UPLOAD FILE GAMBAR ---
                $image_filename = null;
                if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    $upload_dir = ROOT_PATH . '/public/assets/images/news/';
                    $file_tmp = $_FILES['image']['tmp_name'];
                    $file_ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                    
                    $image_filename = $slug . '-' . time() . '.' . $file_ext;
                    $target_file = $upload_dir . $image_filename;
                    
                    if (!move_uploaded_file($file_tmp, $target_file)) {
                        $data['error'] = "Gagal memindahkan file gambar.";
                        $image_filename = null; 
                    }
                }
                
                // --- C. PANGGIL MODEL INSERT ---
                if (!isset($data['error'])) {
                    $news_data = [
                        'title' => $title,
                        'slug' => $slug,
                        'body' => $body,
                        'image' => $image_filename,
                        'published' => $published
                    ];

                    if ($this->newsModel->createNews($news_data)) {
                        // Sukses: Redirect ke halaman daftar
                        header('Location: ' . BASE_URL . 'admin/news?status=success_insert');
                        exit;
                    } else {
                        $data['error'] = "Gagal menyimpan data ke database.";
                    }
                }
            }
        } 
        
        // TAMPILKAN FORM (GET Request atau POST Gagal)
        $page_title = 'Tambah Berita Baru'; 
        $current_page_nav = 'konten'; 
        
        include ROOT_PATH . '/views/layouts/header_admin.php';
        include ROOT_PATH . '/views/layouts/sidebar.php';
        extract($data); 
        include ROOT_PATH . '/views/layouts/admin_wrapper_start.php'; 
        include ROOT_PATH . '/views/admin/news/create.php'; 
        include ROOT_PATH . '/views/layouts/admin_footer.php';
    }

    // ----------------------------------------------------------------------
    // 4. FUNGSI HELPER: generateSlug()
    // ----------------------------------------------------------------------
    private function generateSlug($text) {
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        $text = strtolower($text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }

    // app/controllers/admin/NewsController.php

// ... (di dalam class NewsController) ...

/**
 * Menampilkan form untuk mengedit berita yang sudah ada.
 * @param int $id ID berita yang akan diedit (dari URL /admin/news/edit/ID).
 */
public function edit($id) {
    $data = [];
    $id = (int)$id; // Pastikan ID adalah integer

    // ----------------------------------------------------------------------
    // LOGIKA POST (UPDATE)
    // ----------------------------------------------------------------------
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // --- A. PENGAMBILAN DATA ---
        $title = htmlspecialchars($_POST['title'] ?? '');
        $body = $_POST['body'] ?? '';
        $published = isset($_POST['published']) ? 1 : 0; 
        $current_image = $_POST['current_image'] ?? null; // Gambar lama

        if (empty($title)) {
            $data['error'] = "Judul tidak boleh kosong.";
        } else {
            $slug = $this->generateSlug($title);
            $image_filename = $current_image; // Default: pertahankan gambar lama

            // --- B. UPLOAD GAMBAR BARU / HAPUS GAMBAR LAMA ---
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                
                // 1. Proses Upload Gambar Baru
                $upload_dir = ROOT_PATH . '/public/assets/img/news/';
                $file_tmp = $_FILES['image']['tmp_name'];
                $file_ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                $new_image_filename = $slug . '-' . time() . '.' . $file_ext;
                $target_file = $upload_dir . $new_image_filename;
                
                if (move_uploaded_file($file_tmp, $target_file)) {
                    // 2. Upload Sukses: Hapus Gambar Lama jika ada
                    if (!empty($current_image) && file_exists($upload_dir . $current_image)) {
                        unlink($upload_dir . $current_image);
                    }
                    $image_filename = $new_image_filename;
                } else {
                    $data['error'] = "Gagal memindahkan file gambar baru.";
                }
            }

            // --- C. PANGGIL MODEL UPDATE ---
            if (!isset($data['error'])) {
                $news_data = [
                    'title' => $title,
                    'slug' => $slug,
                    'body' => $body,
                    'image' => $image_filename,
                    'published' => $published
                ];

                if ($this->newsModel->updateNews($id, $news_data)) {
                    // Sukses: Redirect ke halaman daftar dengan status sukses
                    header('Location: ' . BASE_URL . 'admin/news?status=success_update');
                    exit;
                } else {
                    $data['error'] = "Gagal memperbarui data di database.";
                }
            }
            
            // Jika POST gagal, kita akan memuat form lagi dengan data lama/error
        } 
    }
    // ----------------------------------------------------------------------
    // LOGIKA GET (DISPLAY FORM)
    // ----------------------------------------------------------------------

    // 1. Ambil Data Berita (untuk GET atau POST yang gagal)
    $news_item = $this->newsModel->getNewsByIdAdmin($id);

    // Handler 404
    if (!$news_item) {
        http_response_code(404);
        echo "404 Berita ID $id Tidak Ditemukan untuk di-Edit.";
        exit;
    }
    
    // Jika POST gagal, data['error'] sudah ada. Jika GET, kita isi data
    if (empty($data['news'])) {
        $data['news'] = $news_item;
    }

    // 2. Load View
    $page_title = 'Edit Berita: ' . $news_item['title']; 
    $current_page_nav = 'konten'; 

    include ROOT_PATH . '/views/layouts/header_admin.php';
    include ROOT_PATH . '/views/layouts/sidebar.php';
    extract($data); 
    include ROOT_PATH . '/views/layouts/admin_wrapper_start.php'; 
    include ROOT_PATH . '/views/admin/news/edit.php'; 
    include ROOT_PATH . '/views/layouts/admin_footer.php';
}

public function delete($id) {
    $id = (int)$id;
    
    // 1. Dapatkan nama file gambar lama untuk dihapus dari server
    $image_to_delete = $this->newsModel->getCurrentImageName($id);
    
    // 2. Panggil Model untuk menghapus record dari database
    if ($this->newsModel->deleteNews($id)) {
        
        // 3. Hapus file gambar dari server jika ada
        if (!empty($image_to_delete)) {
            $upload_dir = ROOT_PATH . '/public/assets/img/news/';
            $file_path = $upload_dir . $image_to_delete;
            
            if (file_exists($file_path)) {
                unlink($file_path); // Hapus file
            }
        }
        
        // Sukses: Redirect ke halaman daftar dengan status sukses
        header('Location: ' . BASE_URL . 'admin/news?status=success_delete');
        exit;
    } else {
        // Gagal: Redirect dengan pesan error
        header('Location: ' . BASE_URL . 'admin/news?status=fail_delete');
        exit;
    }
}
}