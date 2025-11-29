<section class="page-header" style="padding-top: 7rem;">
    <div class="riset-content-wrapper"> 
        <p class="breadcrumb">
        <a href="/riset">Portofolio</a> 
        <i class="material-icons-outlined">chevron_right</i>
        <?php echo htmlspecialchars($riset['judul']); ?>
    </p>
    </div>
</section>

<section class="research-detail-content">
    
    <h1 class="detail-title"><?php echo htmlspecialchars($riset['judul']); ?></h1>
    
    <div class="meta-info">
        <p><strong>Penulis:</strong> <?php echo htmlspecialchars($riset['penulis']); ?></p>
        <p><strong>Tahun:</strong> <?php echo $riset['tahun']; ?> | 
           <strong>Kategori:</strong> <?php echo htmlspecialchars($riset['kategori']); ?></p>
    </div>
    
    <hr>

    <div class="abstract-section">
        <h2>Abstrak</h2>
        <p><?php echo nl2br(htmlspecialchars($riset['abstrak'])); ?></p>
    </div>
    
    <div class="main-content-section">
        <h3>Metodologi Penelitian</h3>
        <p>
            Teks metodologi akan diletakkan di sini. Pastikan padding dan line-height CSS nyaman dibaca.
        </p>
        
        <h3>Hasil dan Kesimpulan</h3>
        <p>
            Teks hasil lengkap penelitian yang menjelaskan temuan-temuan utama.
        </p>
    </div>

    <div class="detail-actions">
        <a href="/download/riset/<?php echo $riset['id']; ?>" class="btn-primary">
            <i class="material-icons-outlined">download</i> Unduh Dokumen Lengkap (PDF)
        </a>
    </div>
</section>