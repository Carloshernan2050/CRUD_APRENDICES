<?php
require_once 'model/aprendiz.php';

class aprendizController {
    private $model;

    public function __construct() {
        $this->model = new AprendizModel();
    }
    public function index() {
        return $this->model->obtenerAprendiz();    
    }

}   