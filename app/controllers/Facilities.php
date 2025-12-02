<?php

class Facilities extends Controller {
    public function index() {
        $data = $this->model('Facility')->getAll();
        $this->json(['status' => 'success', 'data' => $data]);
    }

    public function detail($id) {
        $data = $this->model('Facility')->getById($id);
        if($data) {
            $this->json(['status' => 'success', 'data' => $data]);
        } else {
            $this->json(['status' => 'error', 'message' => 'Fasilitas tidak ditemukan'], 404);
        }
    }

    public function store() {
        $input = json_decode(file_get_contents('php://input'), true);
        if(empty($input['name'])) {
            $this->json(['status' => 'error', 'message' => 'Nama fasilitas wajib diisi'], 400);
        }

        $input['image'] = $input['image'] ?? 'default_facility.jpg';
        $input['capacity'] = $input['capacity'] ?? 0;
        $input['description'] = $input['description'] ?? '-';
        $input['type'] = $input['type'] ?? 'barang'; // Default Barang

        if($this->model('Facility')->create($input)) {
            $this->json(['status' => 'success', 'message' => 'Fasilitas berhasil ditambahkan']);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal'], 500);
        }
    }

    public function update() {
        $input = json_decode(file_get_contents('php://input'), true);
        if(!isset($input['id'])) {
            $this->json(['status' => 'error', 'message' => 'ID wajib ada'], 400);
        }
        
        // Pastikan field terisi atau pakai data lama (logic sederhana)
        $input['capacity'] = $input['capacity'] ?? 0;
        $input['type'] = $input['type'] ?? 'barang';

        if($this->model('Facility')->update($input)) {
            $this->json(['status' => 'success', 'message' => 'Fasilitas berhasil diupdate']);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal update'], 500);
        }
    }
    
    public function delete($id) {
        if($this->model('Facility')->delete($id)) {
            $this->json(['status' => 'success', 'message' => 'Fasilitas berhasil dihapus']);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal menghapus'], 500);
        }
    }
}