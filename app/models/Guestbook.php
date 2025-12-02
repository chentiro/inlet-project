<?php
class Guestbook {
    private $table = 'guestbooks';
    private $db;

    public function __construct() { $this->db = new Database; }

    public function getAll() {
        $this->db->query("SELECT * FROM " . $this->table . " ORDER BY visit_date DESC");
        return $this->db->resultSet();
    }

    public function getById($id) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table . " (name, institution, purpose, visit_date, user_id) VALUES (:name, :inst, :purp, :date, :uid)";
        
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('inst', $data['institution']);
        $this->db->bind('purp', $data['purpose']);
        $this->db->bind('date', $data['visit_date'] ?? date('Y-m-d'));
        
        $this->db->bind('uid', $data['user_id']); 
        
        return $this->db->execute();
    }

    public function update($data) {
        $query = "UPDATE " . $this->table . " SET name=:name, institution=:inst, purpose=:purp WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('inst', $data['institution']);
        $this->db->bind('purp', $data['purpose']);
        $this->db->bind('id', $data['id']);
        return $this->db->execute();
    }

    public function delete($id) {
        $this->db->query("DELETE FROM " . $this->table . " WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->execute();
    }
}