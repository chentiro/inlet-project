<?php
class Gallery {
    private $table = 'galleries';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAll() {
        $this->db->query("SELECT * FROM " . $this->table . " ORDER BY created_at DESC");
        return $this->db->resultSet();
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table . " (title, image_path, category) VALUES (:title, :image_path, :category)";
        $this->db->query($query);
        $this->db->bind('title', $data['title']);
        $this->db->bind('image_path', $data['image_path']);
        $this->db->bind('category', $data['category']);
        return $this->db->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->execute();
    }
}