<?php

class Activities extends Controller {

    public function index() {
        $data = $this->model('Activity')->getAll();
        $this->json(['status' => 'success', 'data' => $data]);
    }

    public function detail($id) {
        $data = $this->model('Activity')->getById($id);
        if($data) {
            $this->json(['status' => 'success', 'data' => $data]);
        } else {
            $this->json(['status' => 'error', 'message' => 'Kegiatan tidak ditemukan'], 404);
        }
    }

    public function store() {
        $input = json_decode(file_get_contents('php://input'), true);

        if(empty($input['title']) || empty($input['date_start'])) {
            $this->json(['status' => 'error', 'message' => 'Nama Kegiatan dan Tanggal wajib diisi'], 400);
        }

        // Default value handling
        $input['description'] = isset($input['description']) ? $input['description'] : '-';
        $input['location'] = isset($input['location']) ? $input['location'] : '-';
        $input['image'] = isset($input['image']) ? $input['image'] : 'default_activity.jpg';
        $input['date_end'] = isset($input['date_end']) ? $input['date_end'] : null;

        if($this->model('Activity')->create($input)) {
            $this->json(['status' => 'success', 'message' => 'Kegiatan berhasil ditambahkan']);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal membuat kegiatan'], 500);
        }
    }

    public function delete($id) {
        if($this->model('Activity')->delete($id)) {
            $this->json(['status' => 'success', 'message' => 'Kegiatan berhasil dihapus']);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal menghapus kegiatan'], 500);
        }
    }
}