<?php

class News extends Controller {

    public function index() {
        $news = $this->model('NewsModel')->getAll();
        $this->json([
            'status' => 'success',
            'data' => $news
        ]);
    }

    public function detail($id) {
        $news = $this->model('NewsModel')->getById($id);
        if($news) {
            $this->json(['status' => 'success', 'data' => $news]);
        } else {
            $this->json(['status' => 'error', 'message' => 'Berita tidak ditemukan'], 404);
        }
    }

    public function store() {
        $input = json_decode(file_get_contents('php://input'), true);

        if(empty($input['title']) || empty($input['content'])) {
            $this->json(['status' => 'error', 'message' => 'Judul dan Konten wajib diisi'], 400);
        }

        $input['author_id'] = 1; 
        $input['thumbnail'] = isset($input['thumbnail']) ? $input['thumbnail'] : 'default.jpg';

        if($this->model('NewsModel')->create($input)) {
            $this->json(['status' => 'success', 'message' => 'Berita berhasil dibuat']);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal membuat berita'], 500);
        }
    }

    public function update() {
        $input = json_decode(file_get_contents('php://input'), true);
        
        if(!isset($input['id'])) {
            $this->json(['status' => 'error', 'message' => 'ID Berita wajib ada'], 400);
        }

        if($this->model('NewsModel')->update($input)) {
            $this->json(['status' => 'success', 'message' => 'Berita berhasil diupdate']);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal update'], 500);
        }
    }
    
    public function delete($id) {
        if($this->model('NewsModel')->delete($id)) {
            $this->json(['status' => 'success', 'message' => 'Berita berhasil dihapus']);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal menghapus'], 500);
        }
    }
}