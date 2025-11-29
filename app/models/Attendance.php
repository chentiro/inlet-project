<?php
class Attendance {
    private $table = 'attendances';
    private $db;

    public function __construct() { $this->db = new Database; }

    public function getAll() {
        $query = "SELECT a.*, u.name as account_name, u.email as account_email 
                  FROM " . $this->table . " a
                  LEFT JOIN users u ON a.user_id = u.id
                  ORDER BY a.check_in_time DESC";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function checkToday($userId, $type) {
        $query = "SELECT id FROM " . $this->table . " 
                  WHERE user_id = :uid 
                  AND type = :type 
                  AND check_in_time::date = CURRENT_DATE";
                  
        $this->db->query($query);
        $this->db->bind('uid', $userId);
        $this->db->bind('type', $type);
        $this->db->single();
        
        return $this->db->rowCount() > 0;
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table . " (student_name, student_id, type, photo_path, location, user_id) 
                  VALUES (:name, :nim, :type, :photo, :loc, :uid)";
        $this->db->query($query);
        $this->db->bind('name', $data['student_name']);
        $this->db->bind('nim', $data['student_id']);
        $this->db->bind('type', $data['type']);
        $this->db->bind('photo', $data['photo_path']);
        $this->db->bind('loc', $data['location']);
        $this->db->bind('uid', $data['user_id']); 
        return $this->db->execute();
    }
}