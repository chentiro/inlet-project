<section class="loan-form-container">
    <h1 class="page-title">FORMULIR PEMINJAMAN FASILITAS & PERALATAN</h1>
    <p class="page-subtitle">Pastikan Anda telah membaca S&K Peminjaman Lab INLET.</p>

    <form action="/peminjaman/store" method="POST" class="standard-form">
        
        <fieldset class="form-section">
            <legend>Informasi Peminjam</legend>
            <div class="form-group">
                <label for="user_name">Nama Lengkap</label>
                <input type="text" id="user_name" name="user_name" required placeholder="Nama Lengkap Sesuai KTM/KTP">
            </div>
            <div class="form-group">
                <label for="nim">NIM / NIP / ID Instansi</label>
                <input type="text" id="nim" name="nim" required placeholder="Contoh: 2341000000">
            </div>
            <div class="form-group">
                <label for="phone_number">Nomor Kontak (WhatsApp)</label>
                <input type="tel" id="phone_number" name="phone_number" required>
            </div>
        </fieldset>

        <fieldset class="form-section">
            <legend>Detail Peminjaman</legend>
            <div class="form-group">
                <label for="item_id">Pilih Barang / Fasilitas</label>
                <select id="item_id" name="item_id" required>
                    <option value="">-- Pilih --</option>
                    <option value="1">VR Headset Oculus (Stok: 3)</option>
                    <option value="2">Drone DJI Mavic (Stok: 1)</option>
                    <option value="3">Ruang Rapat A (Stok: 1)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="quantity">Jumlah Unit Dipinjam</label>
                <input type="number" id="quantity" name="quantity" required min="1" max="5" placeholder="Maks. 5 unit">
            </div>
            <div class="form-group">
                <label for="loan_date">Tanggal Mulai Pinjam</label>
                <input type="date" id="loan_date" name="loan_date" required>
            </div>
            <div class="form-group">
                <label for="return_date_expected">Tanggal Pengembalian (Maksimal 7 Hari)</label>
                <input type="date" id="return_date_expected" name="return_date_expected" required>
            </div>
            <div class="form-group">
                <label for="purpose">Tujuan Penggunaan Barang</label>
                <textarea id="purpose" name="purpose" rows="4" required placeholder="Contoh: Praktikum Jaringan, Penelitian Tugas Akhir, Kebutuhan Acara Kampus"></textarea>
            </div>
        </fieldset>
        
        <div class="form-action">
            <button type="submit" class="btn-primary">Ajukan Peminjaman</button>
        </div>
        
    </form>
</section>