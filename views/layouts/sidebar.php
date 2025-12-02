
<div class="mini-toolbar">
    
    <div>
        <div class="toolbar-item">
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
    
        <a href="/">
            <img src="<?php echo BASE_URL; ?>assets/images/logo-1.png" alt="INLET Logo" class="logo-img">
         </a>
        
        <div class="lab-name">
            <!-- <strong>INLET</strong>
            Information & Learning Technology Lab -->
        </div>
    </div>
        
        <ul>
            <li class="<?= (isset($current_page) && $current_page == 'dashboard') ? 'active' : ''; ?>">
                <a href="/admin/dashboard">
                    <span class="material-icons-outlined">dashboard</span>
                    Dashboard
                </a>
            </li>
            
            <li class="<?= (isset($current_page) && $current_page == 'konten') ? 'active' : ''; ?>">
                <a href="/admin/konten">
                    <span class="material-icons-outlined">description</span>
                    Kelola Konten
                </a>
            </li>
            
            <li class="<?= (isset($current_page) && $current_page == 'tamu') ? 'active' : ''; ?>">
                <a href="/admin/tamu">
                    <span class="material-icons-outlined">book</span>
                    Buku Tamu
                </a>
            </li>
            
            <li class="<?= (isset($current_page) && $current_page == 'absensi') ? 'active' : ''; ?>">
                <a href="/admin/absensi">
                    <span class="material-icons-outlined">person_add_alt_1</span>
                    Absensi
                </a>
            </li>
            
            <li class="<?= (isset($current_page) && $current_page == 'peminjaman') ? 'active' : ''; ?>">
                <a href="/admin/peminjaman">
                    <span class="material-icons-outlined">note_add</span>
                    Peminjaman
                </a>
            </li>
            
            <li class="<?= (isset($current_page) && $current_page == 'statistik') ? 'active' : ''; ?>">
                <a href="/admin/statistik">
                    <span class="material-icons-outlined">analytics</span>
                    Statistic Pengunjung
                </a>
            </li>
        </ul>
    </div>
    
</div>