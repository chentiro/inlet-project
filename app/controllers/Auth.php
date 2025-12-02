<?php

class Auth extends Controller {
    
    public function login() {
        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON, TRUE);

        if(!isset($input['email']) || !isset($input['password'])) {
            $this->json(['status' => 'error', 'message' => 'Email dan Password wajib diisi'], 400);
        }

        $userModel = $this->model('User');
        $user = $userModel->getUserByEmail($input['email']);

        if($user) {
            if(password_verify($input['password'], $user['password'])) {
                
                unset($user['password']);

                $this->json([
                    'status' => 'success',
                    'message' => 'Login Berhasil',
                    'data' => $user,
                    'token' => 'disini_nanti_generate_jwt_token_ya' 
                ]);
            } else {
                $this->json(['status' => 'error', 'message' => 'Password salah'], 401);
            }
        } else {
            $this->json(['status' => 'error', 'message' => 'Email tidak ditemukan'], 404);
        }
    }

public function forgot_password() {
        $input = json_decode(file_get_contents('php://input'), true);
        
        if(empty($input['email'])) {
            $this->json(['status' => 'error', 'message' => 'Email wajib diisi'], 400);
        }

        $userModel = $this->model('User');
        $user = $userModel->getUserByEmail($input['email']);
        
        if($user) {
            $resetCode = rand(100000, 999999);
            
            $userModel->saveResetToken($user['email'], $resetCode);

            $kirim = $this->sendEmailBrevo($user['email'], $user['name'], $resetCode);

            if($kirim['success']) {
                $this->json(['status' => 'success', 'message' => 'Kode reset terkirim! Cek inbox/spam.']);
            } else {
                $this->json(['status' => 'error', 'message' => 'Gagal kirim email: ' . $kirim['error']], 500);
            }

        } else {
            $this->json(['status' => 'error', 'message' => 'Email tidak terdaftar.'], 404);
        }
    }

    private function sendEmailBrevo($toEmail, $toName, $code) {
        $url = 'https://api.brevo.com/v3/smtp/email';
        
        $data = [
            "sender" => [
                "name" => BREVO_SENDER_NAME,
                "email" => BREVO_SENDER_EMAIL 
            ],
            "to" => [[
                "email" => $toEmail,
                "name" => "User Lab" 
            ]],
            "subject" => "Kode Verifikasi Lab: " . $code, 
            
            "htmlContent" => "<html><body><h1>Halo!</h1><p>Ini kode verifikasi kamu:</p><h2>$code</h2><p>Gunakan untuk akses akun.</p></body></html>"
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'accept: application/json',
            'api-key: ' . BREVO_API_KEY,
            'content-type: application/json'
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode == 201) {
            return ['success' => true, 'debug' => $response];
        } else {
            return ['success' => false, 'error' => "Status: $httpCode | Resp: $response"];
        }
    }

    public function verify_reset() {
        $input = json_decode(file_get_contents('php://input'), true);
        if(empty($input['email']) || empty($input['token']) || empty($input['new_password'])) {
            $this->json(['status' => 'error', 'message' => 'Email, Kode, dan Password Baru wajib diisi'], 400);
        }

        $userModel = $this->model('User');
        
        $check = $userModel->checkResetToken($input['email'], $input['token']);
        
        if(!$check) {
            $this->json(['status' => 'error', 'message' => 'Kode Salah atau Email tidak cocok!'], 400);
        }

        $newHash = password_hash($input['new_password'], PASSWORD_BCRYPT);

        if($userModel->updatePasswordByEmail($input['email'], $newHash)) {
            
      
            $userModel->deleteResetToken($input['email']);
            
            $this->json(['status' => 'success', 'message' => 'Password BERHASIL diubah! Silakan login.']);
        } else {
            $this->json(['status' => 'error', 'message' => 'Gagal mengupdate password database.'], 500);
        }
    }
}