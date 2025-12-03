<div class="mini-toolbar">
    
    <div class="mini-toolbar-top-icons">
        <div class="toolbar-item sidebar-toggle-btn">
            <span class="material-icons-outlined">menu</span>
        </div>
        
        <div class="toolbar-item" style="padding-top: 10px;">
            <img src="<?php echo BASE_URL; ?>assets/images/our-team/farid-angga.jpg" alt="Admin Profile" class="profile-img">
        </div>
        
        <div class="toolbar-item">
            <span class="material-icons-outlined">notifications</span>
        </div>
        <div class="toolbar-item">
            <span class="material-icons-outlined">settings</span>
        </div>
    </div>
    
    <div class="mini-toolbar-bottom">
        <div class="toolbar-item">
            <span class="material-icons-outlined">logout</span>
        </div>
    </div>

</div>

<div class="sidebar">
    <div class="sidebar-top">
        <div class="sidebar-header">
            <a href="<?php echo BASE_URL; ?>admin/dashboard"> 
                <img src="<?php echo BASE_URL; ?>assets/images/logo-1.png" alt="INLET Logo" class="logo-img">
            </a>
            </div>
        
        <ul class="main-menu"> <li class="<?= (isset($current_page) && $current_page == 'dashboard') ? 'active' : ''; ?>">
                <a href="<?php echo BASE_URL; ?>admin/dashboard">
                    <span class="material-icons-outlined">dashboard</span>
                    Dashboard
                </a>
            </li>

            <?php 
            // Cek apakah salah satu submenu konten aktif
            $konten_pages = ['news', 'events', 'announcements'];
            $is_konten_active = isset($current_page) && in_array($current_page, $konten_pages); 
            ?>
            <li class="has-submenu menu-toggle-target <?= $is_konten_active ? 'active expanded' : ''; ?>">
                <a href="#" class="menu-toggle">
                    <span class="material-icons-outlined">description</span>
                    Konten
                    <span class="material-icons-outlined expand-icon">expand_more</span>
                </a>
                <ul class="submenu">
                    <li class="<?= (isset($current_page) && $current_page == 'news') ? 'active' : ''; ?>">
                        <a href="<?php echo BASE_URL; ?>admin/news">
                            <span class="material-icons-outlined">article</span> Berita
                        </a>
                    </li>
                    <li class="<?= (isset($current_page) && $current_page == 'events') ? 'active' : ''; ?>">
                        <a href="<?php echo BASE_URL; ?>admin/events">
                            <span class="material-icons-outlined">event</span> Acara
                        </a>
                    </li>
                    <li class="<?= (isset($current_page) && $current_page == 'announcements') ? 'active' : ''; ?>">
                        <a href="<?php echo BASE_URL; ?>admin/announcements">
                            <span class="material-icons-outlined">campaign</span> Pengumuman
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="<?= (isset($current_page) && $current_page == 'tamu') ? 'active' : ''; ?>">
                <a href="<?php echo BASE_URL; ?>admin/tamu">
                    <span class="material-icons-outlined">book</span>
                    Buku Tamu
                </a>
            </li>
            
            <li class="<?= (isset($current_page) && $current_page == 'absensi') ? 'active' : ''; ?>">
                <a href="<?php echo BASE_URL; ?>admin/absensi">
                    <span class="material-icons-outlined">person_add_alt_1</span>
                    Absensi
                </a>
            </li>
            
            <li class="<?= (isset($current_page) && $current_page == 'peminjaman') ? 'active' : ''; ?>">
                <a href="<?php echo BASE_URL; ?>admin/peminjaman">
                    <span class="material-icons-outlined">note_add</span>
                    Peminjaman
                </a>
            </li>
            
            <li class="<?= (isset($current_page) && $current_page == 'statistik') ? 'active' : ''; ?>">
                <a href="<?php echo BASE_URL; ?>admin/statistik">
                    <span class="material-icons-outlined">analytics</span>
                    Pengunjung
                </a>
            </li>
        </ul>
    </div>
    
</div>