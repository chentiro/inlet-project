<?php
class Absensi extends Controller {
    public function index() {
        $data = $this->model('Attendance')->getAll();
        $this->json(['status' => 'success', 'data' => $data]);
    }

    public function checkin() {
        $input = json_decode(file_get_contents('php://input'), true);
        
        $input['user_id'] = $input['user_id'] ?? null;

        if(empty($input['photo_path'])) {
            $this->json(['status' => 'error', 'message' => 'Foto wajib ada'], 400);
        }

        if($input['user_id']) {
            $type = $input['type'] ?? 'magang';
            $alreadyAbsen = $this->model('Attendance')->checkToday($input['user_id'], $type);
            
            if($alreadyAbsen) {
                $this->json([
                    'status' => 'error', 
                    'message' => "Anda sudah melakukan absensi $type hari ini! Kembali lagi besok."
                ], 400);
            }
        }
        if(empty($input['student_name'])) {
             $input['student_name'] = $input['user_id'] ? 'User ID ' . $input['user_id'] : 'Tanpa Nama';
        }
        
        $input['student_id'] = $input['student_id'] ?? '-';
        $input['type'] = $input['type'] ?? 'magang';
        $input['location'] = $input['location'] ?? 'Lab';

        if($this->model('Attendance')->create($input)) {
            $this->json(['status' => 'success', 'message' => 'Absensi berhasil']);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal absen'], 500);
        }
    }

    public function delete($id) {
        $this->model('Attendance')->delete($id); 
        $this->json(['status' => 'success', 'message' => 'Data absensi dihapus']);
    }
}