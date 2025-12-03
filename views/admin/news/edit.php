<?php
// ASUMSI: Variabel $news sudah tersedia dari Controller (NewsController::edit($id))
$news = $news ?? []; 
$id = $news['id'] ?? 0; 

// Pre-populate fields with existing data
$old_title = htmlspecialchars($news['title'] ?? '');
$old_body = htmlspecialchars($news['body'] ?? '');
$old_image = htmlspecialchars($news['image'] ?? '');
$is_published = (bool)($news['published'] ?? 0);
$old_published_checked = $is_published ? 'checked' : '';

// Ambil pesan error/status (jika ada setelah POST gagal)
$error_message = $error ?? null; 
?>

<div class="inlet-admin-card">
    <div class="inlet-card-header">
        <h2 class="inlet-title">Edit Berita: <?php echo $old_title; ?></h2>
    </div>

    <div class="inlet-card-body">
        
        <?php if (!empty($error_message)): ?>
            <div class="alert alert-danger">
                <strong>Gagal!</strong> <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo BASE_URL; ?>admin/news/edit/<?php echo $id; ?>" method="POST" enctype="multipart/form-data" class="inlet-form">
            
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="form-group">
                <label for="title">Judul Berita <span style="color: red;">*</span></label>
                <input type="text" name="title" id="title" class="form-control" required 
                       value="<?php echo $old_title; ?>">
            </div>
            
            <div class="form-group">
                <label for="body">Isi Konten <span style="color: red;">*</span></label>
                <textarea name="body" id="body" class="form-control" rows="15" required><?php echo $old_body; ?></textarea>
            </div>
            
            <div class="form-group">
                <label>Gambar Saat Ini:</label>
                <?php if (!empty($old_image)): ?>
                    <img src="<?php echo BASE_URL; ?>assets/img/news/<?php echo $old_image; ?>" alt="Gambar Saat Ini" 
                         style="max-width: 200px; height: auto; display: block; margin-bottom: 10px; border: 1px solid #ddd;">
                    <small class="form-text text-muted">Abaikan kolom di bawah jika tidak ingin mengganti gambar.</small>
                    <input type="hidden" name="current_image" value="<?php echo $old_image; ?>">
                <?php else: ?>
                    <small class="form-text text-muted">Belum ada gambar utama.</small>
                <?php endif; ?>
                
                <label for="image" style="margin-top: 10px;">Ganti Gambar (Max. 2MB)</label>
                <input type="file" name="image" id="image" class="form-control-file" accept="image/*">
            </div>

            <div class="form-group form-group-checkbox">
                <input type="checkbox" name="published" id="published" value="1" 
                       <?php echo $old_published_checked; ?>>
                <label for="published">Publikasikan Sekarang</label>
                <small class="form-text text-muted">Status saat ini: **<?php echo $is_published ? 'PUBLISH' : 'DRAFT'; ?>**</small>
            </div>

            <div class="form-group form-actions">
                <button type="submit" class="inlet-btn inlet-btn-primary">
                    <span class="material-icons-outlined">save</span> Simpan Perubahan
                </button>
                <a href="<?php echo BASE_URL; ?>admin/news" class="inlet-btn inlet-btn-secondary">Batal</a>
            </div>

        </form>
    </div>
</div>