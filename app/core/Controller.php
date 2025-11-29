<?php

class Controller {
    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    public function json($data, $status = 200) {
        header("Access-Control-Allow-Origin: *"); 
        header("Content-Type: application/json; charset=UTF-8");
        http_response_code($status);
        echo json_encode($data);
        exit;
    }
}