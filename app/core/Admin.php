<?php

class Admin extends Controller {
    public function index() {
        $data['judul'] = 'Dashboard Admin - Lab Portal';
        $this->view('admin/index', $data);
    }
}