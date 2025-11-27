<section class="page-header">
    <div class="content-wrapper">
        <p class="breadcrumb">
            <a href="<?php echo BASE_URL; ?>">Home</a> 
            
            <i class="material-icons-outlined" style="font-size: 0.9rem;">chevron_right</i>
            
            <strong>Portfolio</strong> 
            <i class="material-icons-outlined" style="font-size: 0.9rem;">chevron_right</i>
            <a href="<?php echo BASE_URL; ?>galeri">Galery</a> 
            
        </p>

        <h1 class="page-title">Galery</h1>
    </div>
</section>

<section class="galeri-container">
    <div class="content-wrapper">
        
        <div class="photo-grid">
            
            <?php // PHP LOOP akan di sini, menggunakan $galeri_data ?>
            
            <div class="gallery-item" data-type="photo">
                <img src="<?php echo BASE_URL; ?>assets/images/gallery/1.jpg" alt="Foto Workshop TI">
                <p class="caption">Workshop Mikrokontroler, 2024</p>
            </div>
            
            <div class="gallery-item" data-type="video">
                <img src="<?php echo BASE_URL; ?>assets/images/gallery/2.jpg" alt="Thumbnail Video Riset">
                <!-- <i class="material-icons-outlined play-icon">play_circle_filled</i> -->
                <p class="caption">Dokumentasi Proyek Drones</p>
            </div>

            <div class="gallery-item" data-type="video">
                <img src="<?php echo BASE_URL; ?>assets/images/gallery/17.jpg" alt="Thumbnail Video Riset">
                <!-- <i class="material-icons-outlined play-icon">play_circle_filled</i> -->
                <p class="caption">Dokumentasi Proyek Drones</p>
            </div>
            
            </div>
        
        <div class="galeri-load-more">
            <button class="btn-primary">Tampilkan Lebih Banyak Foto</button>
        </div>
        
    </div>
</section>