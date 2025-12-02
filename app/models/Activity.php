<?php

class Activity {
    private $table = 'activities';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAll() {
        // Urutkan berdasarkan tanggal kegiatan terdekat (DESC)
        $this->db->query("SELECT * FROM " . $this->table . " ORDER BY date_start DESC");
        return $this->db->resultSet();
    }

    public function getById($id) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table . " 
                  (title, description, date_start, date_end, location, image) 
                  VALUES (:title, :description, :date_start, :date_end, :location, :image)";

        $this->db->query($query);
        $this->db->bind('title', $data['title']);
        $this->db->bind('description', $data['description']);
        $this->db->bind('date_start', $data['date_start']); 
        $this->db->bind('date_end', $data['date_end']);
        $this->db->bind('location', $data['location']);
        $this->db->bind('image', $data['image']);

        return $this->db->execute();
    }

    public function update($data) {
        // PERBAIKAN FINAL: Update sesuai kolom tabel activities
        $query = "UPDATE " . $this->table . " 
                  SET title = :title, 
                      description = :description, 
                      date_start = :date_start, 
                      date_end = :date_end, 
                      location = :location, 
                      image = :image 
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('title', $data['title']);
        $this->db->bind('description', $data['description']);
        $this->db->bind('date_start', $data['date_start']);
        $this->db->bind('date_end', $data['date_end']);
        $this->db->bind('location', $data['location']);
        $this->db->bind('image', $data['image']);
        $this->db->bind('id', $data['id']);

        return $this->db->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->execute();
    }
}