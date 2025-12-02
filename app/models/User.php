<?php

class User {
    private $table = 'users';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAll() {
        $this->db->query("SELECT id, name, email, role, created_at FROM " . $this->table . " ORDER BY role ASC, name ASC");
        return $this->db->resultSet();
    }

    public function getUserByEmail($email) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE email = :email');
        $this->db->bind('email', $email);
        return $this->db->single();
    }

    public function getById($id) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function create($data) {
        $query = "INSERT INTO users (name, email, password, role) 
                  VALUES (:name, :email, :password, :role)";
        
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', $data['password']); 
        $this->db->bind('role', $data['role']); 

        return $this->db->execute();
    }

    public function update($data) {
        if (!empty($data['password'])) {
            $query = "UPDATE users SET name=:name, email=:email, role=:role, password=:pass WHERE id=:id";
        } else {
            $query = "UPDATE users SET name=:name, email=:email, role=:role WHERE id=:id";
        }

        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('role', $data['role']);
        $this->db->bind('id', $data['id']);

        if (!empty($data['password'])) {
            $this->db->bind('pass', $data['password']);
        }

        return $this->db->execute();
    }

    public function updatePassword($id, $hash) {
        $this->db->query("UPDATE " . $this->table . " SET password = :pass WHERE id = :id");
        $this->db->bind('pass', $hash);
        $this->db->bind('id', $id);
        return $this->db->execute();
    }

    public function delete($id) {
        $this->db->query("DELETE FROM " . $this->table . " WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->execute();
    }

    public function saveResetToken($email, $token) {
        $this->db->query("DELETE FROM password_resets WHERE email = :email");
        $this->db->bind('email', $email);
        $this->db->execute();

        $query = "INSERT INTO password_resets (email, token, created_at) VALUES (:email, :token, NOW())";
        $this->db->query($query);
        $this->db->bind('email', $email);
        $this->db->bind('token', $token);
        
        return $this->db->execute();
    }

    public function checkResetToken($email, $token) {
        $this->db->query("SELECT * FROM password_resets WHERE email = :email AND token = :token");
        $this->db->bind('email', $email);
        $this->db->bind('token', $token);
        return $this->db->single();
    }

    public function updatePasswordByEmail($email, $hash) {
        $this->db->query("UPDATE users SET password = :pass WHERE email = :email");
        $this->db->bind('pass', $hash);
        $this->db->bind('email', $email);
        return $this->db->execute();
    }

    public function deleteResetToken($email) {
        $this->db->query("DELETE FROM password_resets WHERE email = :email");
        $this->db->bind('email', $email);
        return $this->db->execute();
    }
}