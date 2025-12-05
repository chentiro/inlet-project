<section id="hero-banner" class="hero-section text-center d-flex align-items-center">
    <div class="container">
        
        <div class="hero-content">
            <div class="mobile-hero-image-container">
                <img src="<?php echo BASE_URL; ?>assets/images/gallery/15.jpg" alt="Hero Image Mobile" class="img-fluid">
            </div>

            
            <div class="inlet-alignment-container">
    <span class="inlet-acronym">InLet</span>
    <span class="inlet-fullname">( Information & Learning Technology Lab )</span>
</div>
            <p class="hero-slogan">
                Mendorong Kolaborasi dan Riset Mahasiswa dalam Teknologi Pembelajaran.
            </p>

            <a href="riset-publikasi.php" class="btn btn-primary btn-lg shadow-sm">
                Our Project
            </a>
        </div>
    </div>
</section>

<section class="quick-stats-container">
    <div class="stats-grid">
        
        <div class="stat-card">
            <i class="material-icons-outlined">science</i>
            <h3 class="stat-number">7</h3>
            <p class="stat-label">Riset & Publikasi</p>
        </div>

        <div class="stat-card">
            <i class="material-icons-outlined">groups</i>
            <h3 class="stat-number">15</h3>
            <p class="stat-label">Anggota Tim Aktif</p>
        </div>

        <div class="stat-card">
            <i class="material-icons-outlined">visibility</i>
            <h3 class="stat-number">50</h3>
            <p class="stat-label">Kunjungan Lab</p>
        </div>
        
    </div>
</section>

<section class="about-us-container">
    <h2 class="section-title">About Us</h2>
    <p class="about-description">
        Lab Information and Learning Engineering Technology (INLET) adalah pusat riset dan inovasi teknologi pembelajaran di Politeknik Negeri Malang. 
        Kami mengintegrasikan empat pilar keahlian utama untuk mendukung proses belajar, penelitian, dan kolaborasi industri.
    </p>

    <div class="focus-grid">
        
        <div class="focus-item">
            <div class="focus-icon-title">
                <img src="<?php echo BASE_URL; ?>assets/images/4-main/1.png" alt="IE Logo" class="focus-logo">
                <h3>Information Engineering</h3>
            </div>
            <p>Fokus pada perancangan dan implementasi <b><i>Sistem Informasi Cerdas</i></b> dan <b><i>knowledge management</i></b> untuk mendukung pengambilan keputusan akademis dan operasional.</p>
        </div>

        <div class="focus-item">
            <div class="focus-icon-title">
                <img src="<?php echo BASE_URL; ?>assets/images/4-main/2.png" alt="IE Logo" class="focus-logo">
                <h3>Learning Engineering</h3>
            </div>
            <p>Menciptakan <b><i>Strategi Pembelajaran Adaptif</i></b> dan kerangka kerja berbasis data untuk mengoptimalkan pengalaman belajar dan meningkatkan efektivitas kurikulum.</p>
        </div>

        <div class="focus-item">
            <div class="focus-icon-title">
                <img src="<?php echo BASE_URL; ?>assets/images/4-main/3.png" alt="IE Logo" class="focus-logo">
                <h3>Information Technology</h3>
            </div>
            <p>Menyediakan <b><i>Infrastruktur Digital dan Komputasi</i></b> yang stabil, aman, dan mutakhir sebagai fondasi untuk pengembangan riset dan aplikasi teknologi di lingkungan Lab.</p>
        </div>
        
        <div class="focus-item">
            <div class="focus-icon-title">
                <img src="<?php echo BASE_URL; ?>assets/images/4-main/4.png" alt="IE Logo" class="focus-logo">
                <h3>Learning Technology</h3>
            </div>
            <p>Mengembangkan <b><i>Aplikasi dan Alat Pembelajaran Inovatif</i></b> (seperti Gamifikasi dan AR/VR) untuk menciptakan pengalaman belajar yang menarik dan imersif bagi pengguna.</p>
        </div>
    </div>
    
    <div class="about-cta">
        <a href="/profil" class="btn-primary">Baca Lebih Lanjut Mengenai Visi & Misi</a>
    </div>
</section>

<section class="research-snippet-container">
    <h2 class="section-title">Our Research</h2>
    <p class="about-description">
        Featuring recent projects and research from Lab INLET, including student innovations 
        and relevant results in educational technology.
    </p>

    <div class="research-grid">
        
        <?php // TIGA CARD INI AKAN DI-LOOP OLEH PHP MODEL ?>
        
        <div class="research-card">
            <img src="<?php echo BASE_URL; ?>assets/images/learning-application/pseudo-learn.png" alt="Learning Application">
            <h3 class="research-title">PseudoLearn Application</h3>
            <p class="research-abstract">
                Media pembelajaran rekonstruksi algoritma berbasis pseudocode dengan pendekatan Element Fill-in-Blank pada pemrograman Java.
            </p>
            <a href="/riset/detail/1" class="btn-read-more">Baca Detail</a>
        </div>

        <div class="research-card">
            <img src="<?php echo BASE_URL; ?>assets/images/learning-application/viat-map.png" alt="Learning Application">
            <h3 class="research-title">Viat Map Application</h3>
            <p class="research-abstract">
                VIAT-map is an application that supports reading comprehension by highlighting the logical structure of a text through the Toulmin Argument Model (claim, ground, and warrant).
            </p>
            <a href="/riset/detail/2" class="btn-read-more">Baca Detail</a>
        </div>

        <div class="research-card">
            <img src="<?php echo BASE_URL; ?>assets/images/learning-application/codeasy.jpg" alt="Learning Application">
            <h3 class="research-title">Codeasy</h3>
            <p class="research-abstract">
                Codeasy adalah platform belajar Data Science berbasis Machine Learning yang membantu menguasai Python dan Business Intelligence melalui penilaian otomatis dan analisis kognitif berbasis Taksonomi Bloom.
            </p>
            <a href="/riset/detail/3" class="btn-read-more">Baca Detail</a>
        </div>
        
    </div>

    <div class="research-cta">
        <a href="/riset" class="btn-primary">Lihat Semua Publikasi</a>
    </div>
</section>