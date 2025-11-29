<?php
class Researches extends Controller {
    public function index() {
        $data = $this->model('Research')->getAll();
        $this->json(['status' => 'success', 'data' => $data]);
    }

    public function detail($id) {
        $data = $this->model('Research')->getById($id);
        $this->json(['status' => 'success', 'data' => $data]);
    }

    public function store() {
        $input = json_decode(file_get_contents('php://input'), true);
        
        if(empty($input['title']) || empty($input['researcher'])) {
            $this->json(['status'=>'error', 'message'=>'Judul dan Author wajib diisi'], 400);
        }

        $input['status'] = $input['status'] ?? 'approved'; 
        $input['file_path'] = $input['file_path'] ?? ''; 
        $input['publication_date'] = $input['publication_date'] ?? date('Y-m-d');
        
        $input['user_id'] = $input['user_id'] ?? null;

        if($this->model('Research')->create($input)) {
            $msg = ($input['status'] == 'pending') ? 'Berhasil diajukan. Menunggu ACC Admin.' : 'Data tersimpan.';
            $this->json(['status' => 'success', 'message' => $msg]);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal'], 500);
        }
    }

    public function update() {
        $input = json_decode(file_get_contents('php://input'), true);
        $input['publication_date'] = $input['publication_date'] ?? date('Y-m-d');
        $input['file_path'] = $input['file_path'] ?? '';

        if($this->model('Research')->update($input)) {
            $this->json(['status' => 'success', 'message' => 'Data diupdate']);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal'], 500);
        }
    }

    public function approve($id) {
        if($this->model('Research')->changeStatus($id, 'approved')) {
            $this->json(['status' => 'success', 'message' => 'Penelitian di-ACC!']);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal'], 500);
        }
    }

    public function reject($id) {
        if($this->model('Research')->changeStatus($id, 'rejected')) {
            $this->json(['status' => 'success', 'message' => 'Penelitian DITOLAK. Status diperbarui.']);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal menolak'], 500);
        }
    }
}