<section class="guest-book-container">
    <h1 class="page-title">BUKU TAMU INLET LAB</h1>
    <p class="page-subtitle">Mohon isi formulir di bawah ini sebelum memulai kunjungan Anda.</p>

    <form action="/guest-book/submit" method="POST" class="standard-form">
        
        <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text" id="name" name="name" required placeholder="Contoh: Budi Santoso">
        </div>

        <div class="form-group">
            <label for="institution">Asal Institusi/Instansi (atau Jurusan)</label>
            <input type="text" id="institution" name="institution" required placeholder="Contoh: Politeknik Negeri Malang / Teknik Informatika">
        </div>

        <div class="form-group">
            <label for="phone_number">Nomor Kontak (WhatsApp)</label>
            <input type="tel" id="phone_number" name="phone_number" placeholder="Contoh: 0812xxxxxxxx">
        </div>

        <div class="form-group">
            <label for="purpose">Tujuan Kunjungan</label>
            <textarea id="purpose" name="purpose" rows="4" required placeholder="Contoh: Konsultasi tugas akhir tentang IoT dengan Bapak/Ibu X"></textarea>
        </div>
        
        <div class="form-action">
            <button type="submit" class="btn-primary">Kirim & Mulai Kunjungan</button>
        </div>
        
    </form>
</section>