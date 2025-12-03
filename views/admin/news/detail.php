<?php
// ASUMSI: Variabel $news sudah tersedia di scope ini.
$news = $news ?? []; 

// Ambil data yang dibutuhkan, fallback ke string kosong jika null
$title = htmlspecialchars($news['title'] ?? 'Berita Tidak Ditemukan');
$body = $news['body'] ?? 'Konten tidak tersedia.';
$image_name = htmlspecialchars($news['image'] ?? ''); 
$published_at = $news['created_at'] ?? $news['published_at'] ?? 'now'; 
$author = htmlspecialchars($news['author'] ?? 'Admin INLET'); 
$is_published = (bool)($news['published'] ?? 0); // Ambil status published (BOOLEAN)

// Konfigurasi Path Gambar
$image_full_path = BASE_URL . 'assets/img/news/' . $image_name; 
?>

<div class="main-content-public">
    <div class="article-container">
        
        <?php if (!$is_published): ?>
            <div class="alert alert-warning" style="padding: 15px; background: #fef3c7; border: 1px solid #fcd34d; margin-bottom: 20px;">
                <strong>⚠️ DRAFT MODE:</strong> Berita ini belum dipublikasikan dan hanya terlihat oleh Administrator.
                <a href="<?php echo BASE_URL; ?>admin/news/edit/<?php echo $news['id'] ?? 0; ?>" style="margin-left: 10px; color: #b45309; font-weight: bold;">[Edit & Publikasikan]</a>
            </div>
        <?php endif; ?>
        
        <div class="breadcrumb-public">
            <a href="<?php echo BASE_URL; ?>" class="route-link">Home</a> / 
            <a href="<?php echo BASE_URL; ?>news" class="route-link">Berita</a> /
            <span><?php echo htmlspecialchars(substr($title, 0, 40)) . '...'; ?></span>
        </div>
        
        <h1 class="article-title">
            <?php echo $title; ?>
        </h1>
        
        <div class="article-meta">
            Oleh: **<?php echo $author; ?>** | 
            Dipublikasikan: 
            <strong><?php echo date('d F Y', strtotime($published_at)); ?></strong>
            <?php if (!$is_published): ?>
                <span style="color: #ef4444; font-weight: bold; margin-left: 10px;">(DRAFT)</span>
            <?php endif; ?>
        </div>

        <?php if (!empty($image_name)): ?>
            <div class="article-image-wrapper">
                <img src="<?php echo $image_full_path; ?>" 
                     alt="<?php echo $title; ?>" 
                     class="article-hero-image">
            </div>
        <?php endif; ?>

        <div class="article-body">
            <?php 
            echo nl2br($body); 
            ?>
        </div>

        <div class="article-actions">
            <a href="<?php echo BASE_URL; ?>admin/news" class="btn-back-to-news">
                ← Kembali ke Daftar Kelola Berita
            </a>
        </div>
    </div>
</div>