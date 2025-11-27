<section class="page-header">
    <div class="content-wrapper">
        <p class="breadcrumb">
            <a href="<?php echo BASE_URL; ?>">Home</a> 
            
            <i class="material-icons-outlined" style="font-size: 0.9rem;">chevron_right</i>
            
            <strong>About Us</strong> 
            <i class="material-icons-outlined" style="font-size: 0.9rem;">chevron_right</i>
            <a href="<?php echo BASE_URL; ?>kontak">Kontak</a> 
            
        </p>

        <h1 class="page-title">Kontak</h1>
    </div>
</section>

<section class="kontak-content-container">
    <div class="content-wrapper">
        <div class="kontak-grid">
        <div class="kontak-info">
                <h2>Hubungi Kami</h2>
                
                <div class="contact-item">
                    <i class="material-icons-outlined">mail_outline</i>
                    <p><strong>Email:</strong> inlet@polinema.ac.id</p>
                </div>
                <div class="contact-item">
                    <i class="material-icons-outlined">phone</i>
                    <p><strong>Telepon:</strong> (0341) 404424 (ext. 222)</p>
                </div>
                <div class="contact-item">
                    <i class="material-icons-outlined">location_on</i>
                    <p><strong>Alamat:</strong> Jl. Soekarno Hatta No. 9, Gedung Teknik Sipil Lt. 8, Polinema.</p>
                </div>
                
                <div class="map-placeholder">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.5304466406096!2d112.6119694741674!3d-7.944006892080219!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd629dfd58aaf95%3A0xe72a182dfd18e01c!2sGedung%20Teknik%20Sipil%2C%20Teknik%20Informatika%20%26%20Magister%20Terapan%2C%20POLITEKNIK%20NEGERI%20MALANG!5e0!3m2!1sid!2sid!4v1764264900758!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            
            <div class="kontak-form">
                <h2>Kirim Pesan</h2>
                <form action="/kontak/kirim" method="POST" class="contact-form">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="subjek">Subjek</label>
                        <input type="text" id="subjek" name="subjek" required>
                    </div>
                    <div class="form-group">
                        <label for="pesan">Pesan Anda</label>
                        <textarea id="pesan" name="pesan" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn-primary">Kirim Pesan</button>
                </form>
            </div>
            
            
        </div>
    </div>
</section>