<?php

class Home extends CI_Controller {
    public function index() {
        $this->load->view('templates/header'); 
        $this->load->view('home_view'); 
        $this->load->view('templates/footer'); 
    }
}


?>