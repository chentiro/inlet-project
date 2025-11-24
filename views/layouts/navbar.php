<nav class="navbar">
    <div class="navbar-brand">
        <a href="/">
            <img src="<?php echo BASE_URL; ?>assets/images/logo-3.png" alt="INLET Logo" class="logo-img">
            <span class="logo-text"></span>
        </a>
    </div>

    <button class="hamburger-toggle" aria-expanded="false" aria-label="Toggle navigation">
        <i class="material-icons">menu</i>
    </button>
    <div class="navbar-links" id="menu-links">
    <ul>
        <li><a href="/"> Home</a></li>
        
        <li>
            <details class="dropdown">
                <summary>Tentang Kami <i class="material-icons-outlined">expand_more</i></summary>
                <ul class="dropdown-menu">
                    <li><a href="/profil"><i class="material-icons-outlined">apartment</i> Profil & Sejarah</a></li>
                    <li><a href="/tim"><i class="material-icons-outlined">group</i> Tim INLET</a></li>
                    <li><a href="/fasilitas"><i class="material-icons-outlined">build</i> Fasilitas</a></li>
                    <li><a href="/kontak"><i class="material-icons-outlined">call</i> Kontak</a></li>
                </ul>
            </details>
        </li>
        
        <li>
            <details class="dropdown">
                <summary>Portofolio <i class="material-icons-outlined">expand_more</i></summary>
                <ul class="dropdown-menu">
                    <li><a href="/riset"><i class="material-icons-outlined">science</i> Riset & Publikasi</a></li>
                    <li><a href="/kegiatan"><i class="material-icons-outlined">campaign</i> Kegiatan & Berita</a></li>
                    <li><a href="/galeri"><i class="material-icons-outlined">photo_library</i> Galeri</a></li>
                </ul>
            </details>
        </li>
        
        <li>
            <details class="dropdown">
                <summary>Layanan <i class="material-icons-outlined">expand_more</i></summary>
                <ul class="dropdown-menu">
                    <li><a href="/buku-tamu"><i class="material-icons-outlined">login</i> Buku Tamu</a></li>
                    <li><a href="/peminjaman"><i class="material-icons-outlined">event_available</i> Peminjaman</a></li>
                    <li><a href="/absensi"><i class="material-icons-outlined">camera_alt</i> Absensi Mhs</a></li>
                </ul>
            </details>
        </li>
        
    </ul>
</div>
</div>
</nav>