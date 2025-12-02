<?php
class Loan {
    private $table = 'loans';
    private $db;

    public function __construct() { $this->db = new Database; }

    public function getAll() {
        $query = "SELECT l.*, 
                         u.name as user_name, 
                         u.role as user_role,
                         f.type as facility_type 
                  FROM " . $this->table . " l 
                  LEFT JOIN users u ON l.user_id = u.id 
                  LEFT JOIN facilities f ON l.facility_id = f.id 
                  ORDER BY l.created_at DESC";
                  
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getById($id) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table . " (borrower_name, facility_id, item_name, return_date, status, amount, user_id) 
                  VALUES (:name, :fac_id, :item, :ret_date, :status, :amount, :uid)";
        $this->db->query($query);
        $this->db->bind('name', $data['borrower_name']);
        $this->db->bind('fac_id', $data['facility_id']);
        $this->db->bind('item', $data['item_name']);
        $this->db->bind('ret_date', $data['return_date']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('amount', $data['amount']);
        $this->db->bind('uid', $data['user_id']); // Bind User ID
        return $this->db->execute();
    }

    public function update($data) {
        $query = "UPDATE " . $this->table . " SET borrower_name=:name, item_name=:item, return_date=:ret_date, status=:status, amount=:amount WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('name', $data['borrower_name']);
        $this->db->bind('item', $data['item_name']);
        $this->db->bind('ret_date', $data['return_date']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('amount', $data['amount']);
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