<?php
// Catatan: Semua variabel di bawah ($news_list, $total_pages, $current_page, dll.)
// diasumsikan sudah tersedia di scope ini karena di-pass atau di-extract dari Controller.

// Hitung indeks awal untuk penomoran (Diasumsikan items_per_page juga di-pass dari Controller)
$items_per_page = 5; // Gunakan nilai yang sama dengan di Controller
$start_index = ($current_page - 1) * $items_per_page;

$no = $start_index + 1;
$news_list = $news_list ?? []; // Pastikan variabel ada, meskipun kosong
$total_items = $total_items ?? 0;
$total_pages = $total_pages ?? 1;

?>

<div class="inlet-admin-card">
    
    <div class="inlet-card-header">
        <h2 class="inlet-title">Berita & Artikel</h2>
        
        <a href="<?php echo BASE_URL; ?>admin/news/create" class="inlet-btn inlet-btn-primary">
            <span class="material-icons-outlined">add</span>
            Tambah Baru
        </a>
    </div>
    
    <div class="inlet-table-container">
        <table class="inlet-data-table">
            <thead>
                <tr>
                    <th style="width: 5%;">No.</th>
                    <th style="width: 35%;">Judul Konten</th>
                    <th style="width: 15%;">Status</th>
                    <th style="width: 15%;">Tanggal Publikasi</th>
                    <th style="width: 20%;" class="inlet-col-action">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if (!empty($news_list)): 
                    foreach ($news_list as $row):
                        // Variabel dari Database (published: 1 atau 0)
                        $is_published = $row['published'] ?? 0;
                        $status_text = ($is_published == 1) ? 'Publish' : 'Draft';
                        $status_class = ($is_published == 1) ? 'is-publish' : 'is-draft';
                        
                        // Perhatikan: Kita menggunakan 'created_at' dari Model, tapi View Anda menggunakan 'published_at'
                        // Saya akan menggunakan 'published_at' sesuai View Anda. Pastikan nama kolom di DB konsisten.
                        $tanggal_format = date('d M Y', strtotime($row['published_at'] ?? $row['created_at'] ?? 'now'));
                ?>
                <tr>
                    <td data-label="No."><?php echo $no++; ?>.</td> 

                    <td data-label="Judul Konten"><?php echo htmlspecialchars($row['title'] ?? 'N/A'); ?></td> 

                    <td data-label="Status">
                        <span class="inlet-badge <?php echo $status_class; ?>">
                            <?php echo $status_text; ?>
                        </span>
                    </td>

                    <td data-label="Tanggal Publikasi"><?php echo $tanggal_format; ?></td>
                    
                    <td data-label="Aksi" class="inlet-action-icons">
    <a href="<?php echo BASE_URL; ?>admin/news/detail/<?php echo htmlspecialchars($row['slug'] ?? ''); ?>" title="Detail" target="_blank">
        <span class="material-icons-outlined">visibility</span>
    </a>
    
    <a href="<?php echo BASE_URL; ?>admin/news/edit/<?php echo $row['id'] ?? 0; ?>" title="Update">
        <span class="material-icons-outlined">edit</span>
    </a>
    <a href="<?php echo BASE_URL; ?>admin/news/delete/<?php echo $row['id'] ?? 0; ?>" title="Delete" class="inlet-delete-link" onclick="return confirm('Yakin ingin menghapus berita ini?');">
        <span class="material-icons-outlined inlet-icon-delete">delete</span>
    </a>
</td>
                </tr>
                <?php 
                    endforeach;
                else: 
                ?>
                <tr>
                    <td colspan="5" style="text-align: center; color: var(--color-text-grey);">
                        Belum ada data berita yang ditemukan.
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="pagination-container">
    <ul class="pagination">
    <?php
    // --- Tombol Sebelumnya (Previous) ---
    $prev_page = max(1, $current_page - 1);
    $is_prev_disabled = ($current_page <= 1) ? 'disabled' : '';
    ?>
    <li class="page-item <?php echo $is_prev_disabled; ?>">
        <a class="page-link" href="<?php echo BASE_URL; ?>admin/news?page=<?php echo $prev_page; ?>" title="Halaman Sebelumnya">
            <span class="material-icons-outlined">chevron_left</span>
        </a>
    </li>

    <?php 
    // --- Nomor Halaman (Looping) ---
    for ($i = 1; $i <= $total_pages; $i++):
        $is_active = ($i == $current_page) ? 'active' : '';
    ?>
        <li class="page-item <?php echo $is_active; ?>">
            <a class="page-link" href="<?php echo BASE_URL; ?>admin/news?page=<?php echo $i; ?>">
                <?php echo $i; ?>
            </a>
        </li>
    <?php endfor; ?>

    <?php 
    // --- Tombol Berikutnya (Next) ---
    $next_page = min($total_pages, $current_page + 1);
    $is_next_disabled = ($current_page >= $total_pages) ? 'disabled' : '';
    ?>
    <li class="page-item <?php echo $is_next_disabled; ?>">
        <a class="page-link" href="<?php echo BASE_URL; ?>admin/news?page=<?php echo $next_page; ?>" title="Halaman Berikutnya">
            <span class="material-icons-outlined">chevron_right</span>
        </a>
    </li>
</ul>
</div>