<?php
// app/models/News.php

require_once ROOT_PATH . 'app\core\Database.php';

class News {
    private $db;
    private $table = 'news'; 
    
    public function __construct() {
        // Baris ini sekarang berfungsi karena Database.php sudah di-include di atas
        $this->db = Database::getInstance()->getConnection(); 
    }
    
    // Metode untuk mengambil berita terbaru (Public)
    public function getLatestNews($limit = 5) {
        $sql = "SELECT id, title, slug, image, created_at, SUBSTRING(body, 1, 150) AS body_excerpt
                FROM {$this->table} 
                WHERE published = 1 
                ORDER BY created_at DESC 
                LIMIT :limit";
        // ... (Implementasi PDO seperti sebelumnya) ...
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Metode untuk mengambil detail satu berita (Public)
    // app/models/News.php (Query BARU, menggunakan TRUE)

public function getNewsBySlug($slug) {
    // Pastikan Anda menggunakan Prepared Statement yang benar (seperti $this->db->prepare)
    
    // Gunakan TRUE (literal boolean PostgreSQL) sebagai ganti 1
    $sql = "SELECT * FROM news WHERE slug = :slug AND published = TRUE"; 
    
    $stmt = $this->db->prepare($sql);

    // Asumsi Anda menggunakan execute dengan array:
    $stmt->execute([':slug' => $slug]); 

    return $stmt->fetch();
}

    // Metode untuk mengambil SEMUA berita (Admin Index)
    public function getAllNewsAdmin() {
        $sql = "SELECT id, title, slug, published, created_at, updated_at 
                FROM {$this->table} 
                ORDER BY created_at DESC";
        // ... (Implementasi PDO seperti sebelumnya) ...
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    // Metode untuk Menyimpan data berita baru (Admin Create)
    // app/models/News.php (Metode createNews)

    public function createNews($data) {
        // Hapus 'id' dari daftar kolom dan VALUES
        $sql = "INSERT INTO {$this->table} (title, slug, body, image, published)
            VALUES (:title, :slug, :body, :image, :published)";

        $stmt = $this->db->prepare($sql);

        // Binding values
        $stmt->bindValue(':title', $data['title'], PDO::PARAM_STR);
        $stmt->bindValue(':slug', $data['slug'], PDO::PARAM_STR);
        $stmt->bindValue(':body', $data['body'], PDO::PARAM_STR);
        $stmt->bindValue(':image', $data['image'], PDO::PARAM_STR);

        // Binding BOOLEAN
        $published_bool = (bool)$data['published']; 
        $stmt->bindValue(':published', $published_bool, PDO::PARAM_BOOL); 

        return $stmt->execute(); // Baris ini seharusnya menyelesaikan error
    }
    // app/models/News.php

// ... (di dalam class News) ...

/**
 * Mengambil data berita dengan batasan (limit) dan offset (pagination).
 * @param int $limit Jumlah item per halaman.
 * @param int $offset Indeks awal data yang akan diambil.
 * @return array Data berita yang difilter.
 */
public function getNewsPaginated($limit, $offset) {
    // Fungsi count(*) harus mendapatkan total item TANPA limit/offset.
    // Kita akan buat fungsi terpisah untuk total items.
    
    $sql = "SELECT id, title, slug, published, created_at AS published_at
            FROM {$this->table} 
            ORDER BY created_at DESC
            LIMIT :limit OFFSET :offset"; // Menggunakan sintaks LIMIT dan OFFSET
    
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetchAll();
}

/**
 * Mengambil total jumlah record berita untuk perhitungan pagination.
 */
public function getTotalNewsCount() {
    $sql = "SELECT COUNT(*) FROM {$this->table}";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    
    return (int) $stmt->fetchColumn(); // Ambil nilai dari kolom pertama
}



/**
 * Mengambil detail berita berdasarkan ID untuk tampilan Admin (semua status).
 * @param int $id ID dari berita yang dicari.
 */
public function getNewsByIdAdmin($id) {
    $sql = "SELECT * FROM news WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':id', (int) $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(); 
}

public function updateNews($id, $data) {
    // Pastikan Anda mengupdate kolom 'updated_at' secara manual atau di DB trigger
    $sql = "UPDATE {$this->table} SET 
                title = :title, 
                slug = :slug, 
                body = :body, 
                image = :image, 
                published = :published, 
                updated_at = NOW() 
            WHERE id = :id";
    
    $stmt = $this->db->prepare($sql);

    // Binding values
    $stmt->bindValue(':title', $data['title'], PDO::PARAM_STR);
    $stmt->bindValue(':slug', $data['slug'], PDO::PARAM_STR);
    $stmt->bindValue(':body', $data['body'], PDO::PARAM_STR);
    $stmt->bindValue(':image', $data['image'], PDO::PARAM_STR);
    
    // Binding BOOLEAN dan ID
    $published_bool = (bool)$data['published']; 
    $stmt->bindValue(':published', $published_bool, PDO::PARAM_BOOL); 
    $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
    
    return $stmt->execute();
}

/**
 * Helper untuk mendapatkan nama gambar saat ini (digunakan di Controller untuk menghapus file lama)
 */
public function getCurrentImageName($id) {
    $sql = "SELECT image FROM {$this->table} WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchColumn(); // Ambil hanya satu kolom
}

public function deleteNews($id) {
    // 1. Dapatkan koneksi (asumsi $this->db adalah PDO instance)
    
    $sql = "DELETE FROM {$this->table} WHERE id = :id";
    
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
    
    return $stmt->execute();
}
}