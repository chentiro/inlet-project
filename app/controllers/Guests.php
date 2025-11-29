<?php
class Guests extends Controller {
    public function index() {
        $data = $this->model('Guestbook')->getAll();
        $this->json(['status' => 'success', 'data' => $data]);
    }

    public function detail($id) {
        $data = $this->model('Guestbook')->getById($id);
        $this->json(['status' => 'success', 'data' => $data]);
    }

    public function store() {
        $input = json_decode(file_get_contents('php://input'), true);
        
        if(empty($input['name']) || empty($input['purpose'])) {
            $this->json(['status' => 'error', 'message' => 'Nama dan Tujuan wajib diisi'], 400);
        }

        $input['user_id'] = $input['user_id'] ?? null;

        if($this->model('Guestbook')->create($input)) {
            $this->json(['status' => 'success', 'message' => 'Tamu berhasil dicatat']);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal'], 500);
        }
    }

    public function update() {
        $input = json_decode(file_get_contents('php://input'), true);
        if($this->model('Guestbook')->update($input)) {
            $this->json(['status' => 'success', 'message' => 'Data tamu diupdate']);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal update'], 500);
        }
    }

    public function delete($id) {
        if($this->model('Guestbook')->delete($id)) {
            $this->json(['status' => 'success', 'message' => 'Data tamu dihapus']);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal hapus'], 500);
        }
    }
}