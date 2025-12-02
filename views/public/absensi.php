<section class="attendance-container">
    <h1 class="page-title">ABSENSI MASUK LAB INLET</h1>
    <p class="page-subtitle">Mohon masukkan NIM dan ambil foto Anda sebagai bukti kehadiran.</p>

    <form action="/absensi/store" method="POST" class="standard-form">
        
        <div class="form-group">
            <label for="nim">NIM Mahasiswa</label>
            <input type="text" id="nim" name="nim" required placeholder="Masukkan NIM Anda" maxlength="15">
        </div>

        <div class="camera-area" style="text-align: center; margin-bottom: 20px;">
            <video id="video-stream" width="320" height="240" autoplay style="border: 2px solid #3498db; border-radius: 8px;"></video>
            <canvas id="canvas-capture" width="320" height="240" style="display: none;"></canvas>
            <input type="hidden" name="photo_data" id="photo-data">
        </div>
        
        <div class="form-action">
            <button type="button" id="start-camera-btn" class="btn-secondary">Aktifkan Kamera</button>
            <button type="button" id="capture-btn" class="btn-primary" disabled>Ambil Foto & Absen</button>
        </div>
        
    </form>
</section>

<script>
    const video = document.getElementById('video-stream');
    const canvas = document.getElementById('canvas-capture');
    const captureButton = document.getElementById('capture-btn');
    const startCameraButton = document.getElementById('start-camera-btn');
    const photoDataInput = document.getElementById('photo-data');
    const form = document.querySelector('.standard-form');
    let stream = null;

    // 1. FUNGSI AKTIVASI KAMERA
    startCameraButton.addEventListener('click', async () => {
        try {
            // Meminta akses ke kamera
            stream = await navigator.mediaDevices.getUserMedia({ video: true });
            video.srcObject = stream;
            video.style.display = 'block'; // Tampilkan video
            captureButton.disabled = false;
            startCameraButton.style.display = 'none'; // Sembunyikan tombol mulai
        } catch (err) {
            console.error("Error mengakses kamera: ", err);
            alert("Gagal mengakses kamera. Pastikan izin kamera diberikan.");
        }
    });

    // 2. FUNGSI MENGAMBIL FOTO
    captureButton.addEventListener('click', () => {
        const context = canvas.getContext('2d');
        // Gambar frame dari video ke canvas
        context.drawImage(video, 0, 0, 320, 240);
        
        // Konversi gambar canvas ke format Base64 dan simpan di hidden input
        const dataURL = canvas.toDataURL('image/jpeg');
        photoDataInput.value = dataURL;
        
        // Hentikan stream kamera setelah foto diambil
        if (stream) {
            stream.getTracks().forEach(track => track.stop());
        }
        
        // Submit Form
        form.submit();
    });
</script>