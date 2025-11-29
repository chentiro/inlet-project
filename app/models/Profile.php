<?php

class Profile {
    private $table = 'lab_profile';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function get() {
        // Selalu ambil baris pertama (id=1)
        $this->db->query("SELECT * FROM " . $this->table . " LIMIT 1");
        return $this->db->single();
    }

    public function update($data) {
        // Kita asumsikan selalu update ID 1 atau ID yang dikirim
        $query = "UPDATE " . $this->table . " 
                  SET about_us = :about, vision = :vision, mission = :mission, 
                      history = :history, structure_image = :structure 
                  WHERE id = 1"; // Hardcode ID 1 biar aman

        $this->db->query($query);
        $this->db->bind('about', $data['about_us']);
        $this->db->bind('vision', $data['vision']);
        $this->db->bind('mission', $data['mission']);
        $this->db->bind('history', $data['history']);
        $this->db->bind('structure', $data['structure_image']);

        return $this->db->execute();
    }
}