<?php

class Uploads extends Controller {

    public function index() {
        $this->json(['message' => 'Upload service ready. Use POST method.']);
    }

    public function image() {
        if (!isset($_FILES['file'])) {
            $this->json(['status' => 'error', 'message' => 'Tidak ada file yang diupload'], 400);
        }

        $file = $_FILES['file'];
        
        if ($file['error'] !== UPLOAD_ERR_OK) {
            $this->json(['status' => 'error', 'message' => 'Upload error code: ' . $file['error']], 500);
        }

        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
        $fileType = mime_content_type($file['tmp_name']); // Cek MIME type asli

        if (!in_array($fileType, $allowedTypes)) {
            $this->json(['status' => 'error', 'message' => 'Hanya file JPG, PNG, atau WEBP yang diperbolehkan'], 400);
        }

        $maxSize = 2 * 1024 * 1024; // 2MB dalam bytes
        if ($file['size'] > $maxSize) {
            $this->json(['status' => 'error', 'message' => 'Ukuran file maksimal 2MB'], 400);
        }

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newName = time() . '_' . rand(100, 999) . '.' . $ext;
        
        $uploadDir = 'uploads/';
        $targetPath = $uploadDir . $newName;

        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            
            $this->json([
                'status' => 'success',
                'message' => 'Upload berhasil',
                'file_name' => $newName,
                'file_path' => $targetPath, 
                'full_url' => BASEURL . '/' . $targetPath // Helper buat frontend langsung preview
            ]);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal memindahkan file ke folder uploads'], 500);
        }
    }
    
    public function document() {
        if (!isset($_FILES['file'])) {
            $this->json(['status' => 'error', 'message' => 'Tidak ada file'], 400);
        }

        $file = $_FILES['file'];
        $allowedTypes = ['application/pdf'];
        $fileType = mime_content_type($file['tmp_name']);

        if (!in_array($fileType, $allowedTypes)) {
            $this->json(['status' => 'error', 'message' => 'Hanya file PDF yang diperbolehkan'], 400);
        }
        
        if ($file['size'] > 5 * 1024 * 1024) {
             $this->json(['status' => 'error', 'message' => 'Ukuran PDF maksimal 5MB'], 400);
        }

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newName = 'doc_' . time() . '_' . rand(100, 999) . '.' . $ext;
        $targetPath = 'uploads/' . $newName;

        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            $this->json([
                'status' => 'success',
                'file_name' => $newName,
                'file_path' => $targetPath
            ]);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal upload dokumen'], 500);
        }
    }
}