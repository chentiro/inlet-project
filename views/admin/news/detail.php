<?php
// --- SIMULASI DATA DUMMY DARI MODEL/DATABASE ---
// Asumsi: Data ini diambil berdasarkan slug dari URL
$news_data = [
    'title' => 'Riset Terbaru: AI dan Pembelajaran Jarak Jauh',
    'image_url' => 'assets/images/news/ai_research_hero.jpg', // Ubah path BASE_URL jika perlu
    'published_at' => '2025-12-03 10:30:00',
    'body' => "Laboratorium INLET mengumumkan hasil riset terbarunya mengenai implementasi Kecerdasan Buatan (AI) untuk meningkatkan efektivitas pembelajaran jarak jauh (PJJ).<br><br>Riset ini fokus pada personalisasi materi ajar dan sistem evaluasi adaptif, yang bertujuan untuk mengurangi angka DO (Drop Out) pada mahasiswa semester awal. Hasil pengujian menunjukkan peningkatan signifikan pada retensi materi sebesar 15%.",
    'author' => 'Tim Riset INLET'
];

// Pastikan BASE_URL ditambahkan ke path gambar
$image_full_path = BASE_URL . $news_data['image_url'];
?>

<div class="main-content-public">
    <div class="article-container">
        
        <div class="breadcrumb-public">
            <a href="<?php echo BASE_URL; ?>" class="route-link">Home</a> / 
            <a href="<?php echo BASE_URL; ?>news" class="route-link">Berita</a> /
            <span><?php echo htmlspecialchars(substr($news_data['title'], 0, 40)) . '...'; ?></span>
        </div>
        
        <h1 class="article-title">
            <?php echo htmlspecialchars($news_data['title']); ?>
        </h1>
        
        <div class="article-meta">
            Oleh: **<?php echo htmlspecialchars($news_data['author']); ?>** | 
            Dipublikasikan: 
            <strong><?php echo date('d F Y', strtotime($news_data['published_at'])); ?></strong>
        </div>

        <div class="article-image-wrapper">
            <img src="<?php echo htmlspecialchars($image_full_path); ?>" 
                 alt="<?php echo htmlspecialchars($news_data['title']); ?>" 
                 class="article-hero-image">
            
        </div>

        <div class="article-body">
            <?php echo nl2br($news_data['body']); ?>
            
            <p>***</p>
            
            <h2>Tujuan Penelitian</h2>
            <p>Tujuan utama dari penelitian ini adalah menciptakan model AI prediktif yang dapat mengidentifikasi mahasiswa yang berisiko tinggi gagal di tahap awal perkuliahan. Model ini menggunakan data historis absensi, nilai tugas, dan aktivitas forum online.</p>
            
            <h3>Implikasi</h3>
            <p>Diharapkan penemuan ini dapat diimplementasikan di seluruh fakultas untuk memberikan intervensi yang disesuaikan kepada mahasiswa, seperti sesi bimbingan tambahan atau modul belajar yang lebih mudah dicerna.</p>
        </div>

        <div class="article-actions">
            <a href="<?php echo BASE_URL; ?>news" class="btn-back-to-news">
                ← Kembali ke Daftar Berita
            </a>
        </div>
    </div>
</div>