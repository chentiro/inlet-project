<?php
// Catatan: File ini akan di-include di dalam <div class="content-area">
// Pastikan variabel $page_title di Controller diset ke "Kelola Konten"
?>

<div class="card content-card">
    
    <div class="card-header-with-btn">
        <h2>Kelola Konten</h2>
        <a href="/admin/konten/tambah" class="btn btn-primary">
            <span class="material-icons-outlined">add</span>
            Tambah Konten
        </a>
    </div>
    
    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th style="width: 5%;">No.</th>
                    <th style="width: 35%;">Judul</th>
                    <th style="width: 15%;">Status</th>
                    <th style="width: 15%;">Tanggal</th>
                    <th style="width: 20%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1.</td>
                    <td>Judul Konten 1</td>
                    <td>
                        <span class="status-badge publish">Publish</span>
                    </td>
                    <td>11 nov 2025</td>
                    <td class="action-icons">
                        <a href="/konten/1" title="Lihat"><span class="material-icons-outlined">visibility</span></a>
                        <a href="/admin/konten/edit/1" title="Edit"><span class="material-icons-outlined">edit</span></a>
                        <a href="/admin/konten/delete/1" title="Hapus"><span class="material-icons-outlined delete-icon">delete</span></a>
                    </td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Tutorial Pemrograman</td>
                    <td>
                        <span class="status-badge draft">Draft</span>
                    </td>
                    <td>10 nov 2025</td>
                    <td class="action-icons">
                        <a href="/konten/2" title="Lihat"><span class="material-icons-outlined">visibility</span></a>
                        <a href="/admin/konten/edit/2" title="Edit"><span class="material-icons-outlined">edit</span></a>
                        <a href="/admin/konten/delete/2" title="Hapus"><span class="material-icons-outlined delete-icon">delete</span></a>
                    </td>
                </tr>
                
                </tbody>
        </table>
    </div>

</div>