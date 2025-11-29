<?php
class Facility {
    private $table = 'facilities';
    private $db;

    public function __construct() { $this->db = new Database; }

    public function getAll() {
        $query = "SELECT f.*, 
                  (f.capacity - COALESCE((
                      SELECT SUM(amount) 
                      FROM loans l 
                      WHERE l.facility_id = f.id 
                      AND l.status = 'dipinjam'
                  ), 0)) as sisa_stok
                  FROM " . $this->table . " f 
                  ORDER BY f.type ASC, f.name ASC";
                  
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getById($id) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function create($data) {
        // Tambah kolom type
        $query = "INSERT INTO " . $this->table . " (name, description, image, capacity, type) 
                  VALUES (:name, :desc, :img, :cap, :type)";
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('desc', $data['description']);
        $this->db->bind('img', $data['image']);
        $this->db->bind('cap', $data['capacity']);
        $this->db->bind('type', $data['type']); // 'barang' atau 'ruangan'
        return $this->db->execute();
    }

    public function update($data) {
        $query = "UPDATE " . $this->table . " 
                  SET name=:name, description=:desc, image=:img, capacity=:cap, type=:type 
                  WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('desc', $data['description']);
        $this->db->bind('img', $data['image']);
        $this->db->bind('cap', $data['capacity']);
        $this->db->bind('type', $data['type']);
        $this->db->bind('id', $data['id']);
        return $this->db->execute();
    }

    public function delete($id) {
        $this->db->query("DELETE FROM " . $this->table . " WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->execute();
    }
}