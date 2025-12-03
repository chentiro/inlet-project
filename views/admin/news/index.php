<?php
// --- SIMULASI DATA DUMMY DARI MODEL/DATABASE ---
$data_berita = [
    ['id' => 1, 'title' => 'Riset Terbaru: AI dan Pembelajaran Jarak Jauh', 'slug' => 'riset-terbaru-ai-dan-pembelajaran-jarak-jauh', 'published' => 1, 'published_at' => '2025-12-03'],
    ['id' => 2, 'title' => 'Workshop Database Postgre: Jadwal dan Pendaftaran', 'slug' => 'workshop-database-postgre', 'published' => 0, 'published_at' => '2025-11-28'],
    ['id' => 3, 'title' => 'Lowongan Asisten Laboratorium INLET Tahun 2026', 'slug' => 'lowongan-asisten-lab-2026', 'published' => 1, 'published_at' => '2025-11-20'],
    ['id' => 4, 'title' => 'Implementasi Machine Learning untuk Prediksi Kebutuhan Lab', 'slug' => 'ml-prediksi-lab', 'published' => 1, 'published_at' => '2025-11-15'],
    ['id' => 5, 'title' => 'Laporan Kegiatan Studi Banding ke Jakarta', 'slug' => 'laporan-studi-banding-jakarta', 'published' => 0, 'published_at' => '2025-11-10'],
    ['id' => 6, 'title' => 'Pembaruan Fasilitas Jaringan Server Lab', 'slug' => 'pembaruan-fasilitas-jaringan', 'published' => 1, 'published_at' => '2025-11-05'],
    ['id' => 6, 'title' => 'Pembaruan Fasilitas Jaringan Server Lab', 'slug' => 'pembaruan-fasilitas-jaringan', 'published' => 1, 'published_at' => '2025-11-05'],
    ['id' => 6, 'title' => 'Pembaruan Fasilitas Jaringan Server Lab', 'slug' => 'pembaruan-fasilitas-jaringan', 'published' => 1, 'published_at' => '2025-11-05'],
    ['id' => 6, 'title' => 'Pembaruan Fasilitas Jaringan Server Lab', 'slug' => 'pembaruan-fasilitas-jaringan', 'published' => 1, 'published_at' => '2025-11-05'],
    ['id' => 6, 'title' => 'Pembaruan Fasilitas Jaringan Server Lab', 'slug' => 'pembaruan-fasilitas-jaringan', 'published' => 1, 'published_at' => '2025-11-05'],
    ['id' => 6, 'title' => 'Pembaruan Fasilitas Jaringan Server Lab', 'slug' => 'pembaruan-fasilitas-jaringan', 'published' => 1, 'published_at' => '2025-11-05'],
    ['id' => 6, 'title' => 'Pembaruan Fasilitas Jaringan Server Lab', 'slug' => 'pembaruan-fasilitas-jaringan', 'published' => 1, 'published_at' => '2025-11-05'],
    ['id' => 6, 'title' => 'Pembaruan Fasilitas Jaringan Server Lab', 'slug' => 'pembaruan-fasilitas-jaringan', 'published' => 1, 'published_at' => '2025-11-05'],
    ['id' => 6, 'title' => 'Pembaruan Fasilitas Jaringan Server Lab', 'slug' => 'pembaruan-fasilitas-jaringan', 'published' => 1, 'published_at' => '2025-11-05'],
    ['id' => 6, 'title' => 'Pembaruan Fasilitas Jaringan Server Lab', 'slug' => 'pembaruan-fasilitas-jaringan', 'published' => 1, 'published_at' => '2025-11-05'],
    ['id' => 6, 'title' => 'Pembaruan Fasilitas Jaringan Server Lab', 'slug' => 'pembaruan-fasilitas-jaringan', 'published' => 1, 'published_at' => '2025-11-05'],
    ['id' => 6, 'title' => 'Pembaruan Fasilitas Jaringan Server Lab', 'slug' => 'pembaruan-fasilitas-jaringan', 'published' => 1, 'published_at' => '2025-11-05'],
    ['id' => 6, 'title' => 'Pembaruan Fasilitas Jaringan Server Lab', 'slug' => 'pembaruan-fasilitas-jaringan', 'published' => 1, 'published_at' => '2025-11-05'],
    ['id' => 6, 'title' => 'Pembaruan Fasilitas Jaringan Server Lab', 'slug' => 'pembaruan-fasilitas-jaringan', 'published' => 1, 'published_at' => '2025-11-05'],
    ['id' => 6, 'title' => 'Pembaruan Fasilitas Jaringan Server Lab', 'slug' => 'pembaruan-fasilitas-jaringan', 'published' => 1, 'published_at' => '2025-11-05'],
];
// Asumsi: BASE_URL sudah didefinisikan
$data_berita = $data_berita ?? []; 

// SIMULASI LOGIKA PAGINATION DARI CONTROLLER
$current_page = $_GET['page'] ?? 1; // Ambil dari URL atau default 1
$items_per_page = 5;
$total_items = count($data_berita);
$total_pages = ceil($total_items / $items_per_page);

// Memotong data dummy sesuai halaman
$start_index = ($current_page - 1) * $items_per_page;
$display_data = array_slice($data_berita, $start_index, $items_per_page);
?>

<div class="inlet-admin-card">
    
    <div class="inlet-card-header">
        <h2 class="inlet-title">Kelola Berita & Artikel</h2>
        
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
                    <th style="width: 20%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = $start_index + 1; // Mulai nomor dari index yang benar
                if (!empty($display_data)): 
                    foreach ($display_data as $row):
                        // Logika untuk status
                        $is_published = $row['published'] ?? 0;
                        $status_text = ($is_published == 1) ? 'Publish' : 'Draft';
                        $status_class = ($is_published == 1) ? 'is-publish' : 'is-draft';
                        $tanggal_format = date('d M Y', strtotime($row['published_at'] ?? 'now'));
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
                        <a href="<?php echo BASE_URL; ?>news/<?php echo htmlspecialchars($row['slug'] ?? ''); ?>" title="Detail" target="_blank">
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
                        Belum ada data berita. Silakan klik "Tambah Baru".
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