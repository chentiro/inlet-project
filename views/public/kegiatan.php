<section class="page-header">
    <div class="content-wrapper">
        <p class="breadcrumb">
            <a href="<?php echo BASE_URL; ?>">Home</a> 
            
            <i class="material-icons-outlined" style="font-size: 0.9rem;">chevron_right</i>
            
            <strong>About Us</strong> 
            <i class="material-icons-outlined" style="font-size: 0.9rem;">chevron_right</i>
            <a href="<?php echo BASE_URL; ?>kegiatan">Kegiatan & Berita</a> 
            
        </p>

        <h1 class="page-title">Kegiatan & Berita</h1>
    </div>
</section>

<section class="kegiatan-directory-container">
    <div class="content-wrapper">
        
        <div class="kegiatan-controls">
            <div class="filter-buttons">
                <button class="btn-filter active" data-type="all">Semua</button>
                <button class="btn-filter" data-type="berita">Berita</button>
                <button class="btn-filter" data-type="agenda">Agenda</button>
                <button class="btn-filter" data-type="pengumuman">Pengumuman</button>
            </div>
        </div>

        <div class="kegiatan-grid">
    
    <div class="kegiatan-card">
        <img src="<?php echo BASE_URL; ?>assets/images/news/icast-2024.jpg" alt="Foto Kegiatan Konferensi" class="kegiatan-img">
        <div class="kegiatan-info">
            <p class="kegiatan-meta">
                <i class="material-icons-outlined">calendar_today</i> 20 Nov 2023 | 
                <span class="kegiatan-type">Berita</span>
            </p>
            <h3 class="kegiatan-title">Full Paper Presentation: ICCE 2023 di Matsue, Japan</h3>
            <p class="kegiatan-snippet">
                Anggota Lab INLET berhasil mempresentasikan paper di Konferensi Internasional ICCE, menyoroti aplikasi TI dalam pendidikan.
            </p>
            <a href="/kegiatan/detail/1" class="btn-read-more">Baca Selengkapnya</a>
        </div>
    </div>
    
    <div class="kegiatan-card">
        <img src="<?php echo BASE_URL; ?>assets/images/news/ectel-2024.jpg" alt="Foto Pengumuman Rekrutmen" class="kegiatan-img">
        <div class="kegiatan-info">
            <p class="kegiatan-meta">
                <i class="material-icons-outlined">calendar_today</i> 15 Jan 2024 | 
                <span class="kegiatan-type">Pengumuman</span>
            </p>
            <h3 class="kegiatan-title">Dibuka: Rekrutmen Asisten Laboratorium Periode Semester Genap 2024</h3>
            <p class="kegiatan-snippet">
                Kesempatan bagi mahasiswa untuk bergabung sebagai asisten Lab INLET. Persyaratan pendaftaran dan jadwal seleksi tersedia di laman ini.
            </p>
            <a href="/kegiatan/detail/2" class="btn-read-more">Baca Selengkapnya</a>
        </div>
    </div>

    <div class="kegiatan-card">
        <img src="<?php echo BASE_URL; ?>assets/images/news/icce-2023.jpg" alt="Foto Workshop TI" class="kegiatan-img">
        <div class="kegiatan-info">
            <p class="kegiatan-meta">
                <i class="material-icons-outlined">calendar_today</i> 05 Des 2023 | 
                <span class="kegiatan-type">Agenda</span>
            </p>
            <h3 class="kegiatan-title">Workshop IoT dan Sensorik Dasar untuk Aplikasi Monitoring Lingkungan</h3>
            <p class="kegiatan-snippet">
                Acara workshop terbuka untuk umum yang membahas implementasi sensor dan pemrograman mikrokontroler ESP32 untuk proyek monitoring.
            </p>
            <a href="/kegiatan/detail/3" class="btn-read-more">Baca Selengkapnya</a>
        </div>
    </div>

</div>
        
        <div class="kegiatan-load-more">
            <button class="btn-primary">Tampilkan Lebih Banyak</button>
        </div>
        
    </div>
</section>