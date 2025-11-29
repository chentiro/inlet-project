<?php

class HomeController {
    public function index() {
        include '../views/layouts/header.php';
        include '../views/layouts/navbar.php';
        include '../views/public/home.php';
        include '../views/layouts/footer.php';
    }
}