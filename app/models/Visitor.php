<?php
class Visitor {
    private $db;
    public function __construct() { $this->db = new Database; }
    
    public function log($ip) {
        $this->db->query("INSERT INTO visitors (ip_address) VALUES (:ip)");
        $this->db->bind('ip', $ip);
        $this->db->execute();
    }
    
    public function count() {
        $this->db->query("SELECT COUNT(*) as total FROM visitors");
        return $this->db->single();
    }
}