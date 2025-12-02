<?php

class Users extends Controller {

    public function index() {
        $data = $this->model('User')->getAll();
        $this->json(['status' => 'success', 'data' => $data]);
    }

    public function detail($id) {
        $data = $this->model('User')->getById($id);
        if ($data) {
            unset($data['password']);
            $this->json(['status' => 'success', 'data' => $data]);
        } else {
            $this->json(['status' => 'error', 'message' => 'User tidak ditemukan'], 404);
        }
    }

    public function store() {
        $input = json_decode(file_get_contents('php://input'), true);

        if (empty($input['name']) || empty($input['email']) || empty($input['password'])) {
            $this->json(['status' => 'error', 'message' => 'Nama, Email, dan Password wajib diisi'], 400);
        }

        if ($this->model('User')->getUserByEmail($input['email'])) {
            $this->json(['status' => 'error', 'message' => 'Email sudah terdaftar'], 400);
        }

        $input['password'] = password_hash($input['password'], PASSWORD_BCRYPT);
        
        $input['role'] = !empty($input['role']) ? $input['role'] : 'mahasiswa';

        if ($this->model('User')->create($input)) {
            $this->json(['status' => 'success', 'message' => 'User berhasil ditambahkan']);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal menambah user'], 500);
        }
    }

    public function update() {
        $input = json_decode(file_get_contents('php://input'), true);

        if (empty($input['id'])) {
            $this->json(['status' => 'error', 'message' => 'ID wajib ada'], 400);
        }

        if (!empty($input['password'])) {
            $input['password'] = password_hash($input['password'], PASSWORD_BCRYPT);
        } else {
            $input['password'] = null;
        }

        if ($this->model('User')->update($input)) {
            $this->json(['status' => 'success', 'message' => 'User berhasil diupdate']);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal update user'], 500);
        }
    }

    public function delete($id) {
        if ($this->model('User')->delete($id)) {
            $this->json(['status' => 'success', 'message' => 'User dihapus']);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal hapus'], 500);
        }
    }
}