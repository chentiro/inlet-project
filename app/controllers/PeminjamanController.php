<?php

class PeminjamanController {
    public function index() {
        include '../views/layouts/header.php';
        include '../views/layouts/navbar.php';
        include '../views/public/peminjaman.php';
        include '../views/layouts/footer.php';
    }
}