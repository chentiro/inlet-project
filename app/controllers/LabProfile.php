<?php

class LabProfile extends Controller {

    public function index() {
        $data = $this->model('Profile')->get();
        $this->json(['status' => 'success', 'data' => $data]);
    }
  
    public function update() {
        $input = json_decode(file_get_contents('php://input'), true);

        $input['about_us'] = isset($input['about_us']) ? $input['about_us'] : '';
        $input['vision'] = isset($input['vision']) ? $input['vision'] : '';
        $input['mission'] = isset($input['mission']) ? $input['mission'] : '';
        $input['history'] = isset($input['history']) ? $input['history'] : '';
        $input['structure_image'] = isset($input['structure_image']) ? $input['structure_image'] : 'default_structure.jpg';

        if($this->model('Profile')->update($input)) {
            $this->json(['status' => 'success', 'message' => 'Profil Lab berhasil diperbarui']);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal update profil'], 500);
        }
    }
}