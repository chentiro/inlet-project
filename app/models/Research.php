<?php
class Research {
    private $table = 'researches';
    private $db;

    public function __construct() { $this->db = new Database; }

    public function getAll() {
        $this->db->query("SELECT * FROM " . $this->table . " ORDER BY status DESC, publication_date DESC");
        return $this->db->resultSet();
    }

    public function getById($id) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }
public function create($data) {
        $query = "INSERT INTO " . $this->table . " 
                  (title, researcher, publication_date, year, journal_name, link, type, status, file_path, user_id) 
                  VALUES (:title, :res, :pub_date, :year, :jname, :link, :type, :status, :file, :uid)";

        $this->db->query($query);
        $this->db->bind('title', $data['title']);
        $this->db->bind('res', $data['researcher']);
        $this->db->bind('pub_date', $data['publication_date']);
        $this->db->bind('year', date('Y', strtotime($data['publication_date'])));
        $this->db->bind('jname', $data['journal_name'] ?? '-');
        $this->db->bind('link', $data['link'] ?? '#');
        $this->db->bind('type', $data['type']);
        $this->db->bind('status', $data['status'] ?? 'approved');
        $this->db->bind('file', $data['file_path']);
        
        $this->db->bind('uid', $data['user_id']); 

        return $this->db->execute();
    }

    public function update($data) {
        $query = "UPDATE " . $this->table . " 
                  SET title=:title, researcher=:res, publication_date=:pub_date, year=:year, type=:type, file_path=:file 
                  WHERE id=:id";

        $this->db->query($query);
        $this->db->bind('title', $data['title']);
        $this->db->bind('res', $data['researcher']);
        $this->db->bind('pub_date', $data['publication_date']);
        $this->db->bind('year', date('Y', strtotime($data['publication_date'])));
        $this->db->bind('type', $data['type']);
        $this->db->bind('file', $data['file_path']);
        $this->db->bind('id', $data['id']);
        return $this->db->execute();
    }

    public function delete($id) {
        $this->db->query("DELETE FROM " . $this->table . " WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->execute();
    }

    public function changeStatus($id, $status) {
        $this->db->query("UPDATE " . $this->table . " SET status = :status WHERE id = :id");
        $this->db->bind('status', $status);
        $this->db->bind('id', $id);
        return $this->db->execute();
    }
}