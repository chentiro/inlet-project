<?php
class Loans extends Controller {
    public function index() {
        $data = $this->model('Loan')->getAll();
        $this->json(['status' => 'success', 'data' => $data]);
    }

    public function detail($id) {
        $data = $this->model('Loan')->getById($id);
        $this->json(['status' => 'success', 'data' => $data]);
    }

    public function store() {
        $input = json_decode(file_get_contents('php://input'), true);
    
        if(empty($input['borrower_name'])) {
            $this->json(['status' => 'error', 'message' => 'Peminjam wajib diisi'], 400);
        }
        
        $input['status'] = 'pending'; 
        $input['facility_id'] = $input['facility_id'] ?? null;
        $input['item_name'] = $input['item_name'] ?? '-';
        $input['amount'] = $input['amount'] ?? 1;
        $input['return_date'] = $input['return_date'] ?? date('Y-m-d', strtotime('+7 days'));
        
        $input['user_id'] = $input['user_id'] ?? null; 

        if($this->model('Loan')->create($input)) {
            $this->json(['status' => 'success', 'message' => 'Pengajuan berhasil']);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal'], 500);
        }
    }

    public function update() {
        $input = json_decode(file_get_contents('php://input'), true);
        $input['amount'] = $input['amount'] ?? 1; // Pastikan amount ada saat update

        if($this->model('Loan')->update($input)) {
            $this->json(['status' => 'success', 'message' => 'Data berhasil diupdate']);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal update'], 500);
        }
    }

    public function delete($id) {
        if($this->model('Loan')->delete($id)) {
            $this->json(['status' => 'success', 'message' => 'Data dihapus']);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal hapus'], 500);
        }
    }
    
    public function approve($id) {
        if($this->model('Loan')->changeStatus($id, 'dipinjam')) {
            $this->json(['status' => 'success', 'message' => 'Peminjaman DISETUJUI. Status sekarang: Dipinjam.']);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal menyetujui'], 500);
        }
    }

    public function complete($id) {
        if($this->model('Loan')->changeStatus($id, 'kembali')) {
            $this->json(['status' => 'success', 'message' => 'Barang telah dikembalikan.']);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal update status'], 500);
        }
    }
}