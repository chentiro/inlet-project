<?php
class Galleries extends Controller {
    public function index() {
        $data = $this->model('Gallery')->getAll();
        $this->json(['status' => 'success', 'data' => $data]);
    }

    public function store() {
        $input = json_decode(file_get_contents('php://input'), true);
        if(empty($input['image_path'])) {
            $this->json(['status' => 'error', 'message' => 'Gambar wajib ada'], 400);
        }
        $input['title'] = isset($input['title']) ? $input['title'] : '';
        $input['category'] = isset($input['category']) ? $input['category'] : 'umum';

        if($this->model('Gallery')->create($input)) {
            $this->json(['status' => 'success', 'message' => 'Berhasil upload']);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal simpan'], 500);
        }
    }

    public function delete($id) {
        if($this->model('Gallery')->delete($id)) {
            $this->json(['status' => 'success', 'message' => 'Dihapus']);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal hapus'], 500);
        }
    }
}