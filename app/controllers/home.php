<?php

class Home extends Controller {
    public function index() {
        // 1. Catat Pengunjung Baru
        $ip = $_SERVER['REMOTE_ADDR']; 
        
        $this->model('Visitor')->log($ip);
        
        // 2. Ambil Total Pengunjung
        $total = $this->model('Visitor')->count();

        // 3. Kirim Response JSON
        $data = [
            'status' => 'success',
            'message' => 'Halo, API Backend Lab Applied Informatics siap digunakan!',
            'project' => 'Portal Web Profil',
            'version' => '1.0.0',
            'total_visitors' => $total['total'] // Data tambahan visitor
        ];
        
        $this->json($data);
    }
    
    public function test($param1 = '') {
        $this->json([
            'status' => 'success',
            'message' => 'Parameter diterima: ' . $param1
        ]);
    }
}