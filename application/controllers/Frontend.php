<?php

require_once APPPATH.'..\asset\fpdf\fpdf.php';
class Frontend extends CI_controller{
    public function index() {
        $this->load->view('MenuPage/main/frontend');
    }
}