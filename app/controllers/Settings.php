<?php

class Settings extends Controller {
    
    public function change_password() {
        $input = json_decode(file_get_contents('php://input'), true);
        
        if(empty($input['user_id']) || empty($input['new_password'])) {
            $this->json(['status' => 'error', 'message' => 'Data tidak lengkap'], 400);
        }
        
        $newHash = password_hash($input['new_password'], PASSWORD_BCRYPT);

        if($this->model('User')->updatePassword($input['user_id'], $newHash)) {
            $this->json(['status' => 'success', 'message' => 'Password berhasil diubah. Silakan login ulang.']);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal mengubah password'], 500);
        }
    }
}