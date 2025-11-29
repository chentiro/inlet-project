<section class="page-header">
    <div class="content-wrapper">
        <p class="breadcrumb">
            <a href="<?php echo BASE_URL; ?>">Home</a> 
            
            <i class="material-icons-outlined" style="font-size: 0.9rem;">chevron_right</i>
            
            <strong>About Us</strong> 
            <i class="material-icons-outlined" style="font-size: 0.9rem;">chevron_right</i>
            <a href="<?php echo BASE_URL; ?>fasilitas">Fasilitas & Peralatan</a> 
            
        </p>

        <h1 class="page-title">Fasilitas & Peralatan</h1>
    </div>
</section>

<section class="fasilitas-directory-container">
    <div class="content-wrapper">
        
        <div class="fasilitas-controls">
            <div class="search-bar">
                <i class="material-icons-outlined">search</i>
                <input type="text" placeholder="Cari Ruangan atau Nama Alat..." id="fasilitas-search">
            </div>
            
            <div class="filter-buttons">
                <button class="btn-filter active" data-type="all">Semua Aset</button>
                <button class="btn-filter" data-type="ruangan">Ruangan</button>
                <button class="btn-filter" data-type="peralatan">Peralatan Utama</button>
            </div>
        </div>

        <div class="fasilitas-grid">
    
    <?php // PHP LOOP akan di sini, menggunakan $fasilitas_data ?>
    
 <div class="fasilitas-card">
    <img src="<?php echo BASE_URL; ?>assets/images/news/visiting-scientist-program.jpg" alt="Foto Fasilitas" class="fasilitas-img">
    <div class="fasilitas-info">
        
        <div class="name-status-row">
            <h3 class="fasilitas-name">Ruang Server</h3>
            <p class="fasilitas-status available">Tersedia</p> 
        </div>
        
        <p class="fasilitas-type">Ruangan | Kapasitas Maks. 20 Orang</p>
        <a href="/peminjaman/ruang-server" class="btn-primary-small">Ajukan Pinjaman</a>
    </div>
</div>

<div class="fasilitas-card">
    <img src="<?php echo BASE_URL; ?>assets/images/news/visiting-scientist-program.jpg" alt="Foto Fasilitas" class="fasilitas-img">
    <div class="fasilitas-info">
        
        <div class="name-status-row">
            <h3 class="fasilitas-name">Ruang Server</h3>
            <p class="fasilitas-status available">Tersedia</p> 
        </div>
        
        <p class="fasilitas-type">Ruangan | Kapasitas Maks. 20 Orang</p>
        <a href="/peminjaman/ruang-server" class="btn-primary-small">Ajukan Pinjaman</a>
    </div>
</div>

<div class="fasilitas-card">
    <img src="<?php echo BASE_URL; ?>assets/images/news/visiting-scientist-program.jpg" alt="Foto Fasilitas" class="fasilitas-img">
    <div class="fasilitas-info">
        
        <div class="name-status-row">
            <h3 class="fasilitas-name">Ruang Server</h3>
            <p class="fasilitas-status available">Tersedia</p> 
        </div>
        
        <p class="fasilitas-type">Ruangan | Kapasitas Maks. 20 Orang</p>
        <a href="/peminjaman/ruang-server" class="btn-primary-small">Ajukan Pinjaman</a>
    </div>
</div>
    
</div>
        
        <div class="team-load-more">
            <button class="btn-primary">Tampilkan Aset Lainnya</button>
        </div>
        
    </div>
</section>