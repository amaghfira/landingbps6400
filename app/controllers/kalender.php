<?php

class Kalender extends CI_Controller {
    public function index() {
        // $this->load->view('templates/kalendernav'); 
        $this->load->view('kalender_view'); 
        // $this->load->view('templates/footer'); 
    }

    public function req_zoom(){
        $this->load->view('req_zoom');
    }

    public function login() {
        $this->load->view('login_view');
    }

    public function login_validation() {
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        if($this->form_validation->run()){
            // true
            $username = $this->input->post('username');
            $password = $this->input->post('password');  
            // model func
            $this->load->model('user_model');
            if($this->user_model->login_user($username,$password)){
                $session_data = array(
                    'username' => $username
                );
                $this->session->set_userdata($session_data);
                redirect(base_url().'kalender/req_zoom');
            } else {
                $this->session->set_flashdata('error','Invalid username/password');
                redirect(base_url().'kalender/login');
            }
        } else{
            // false
            $this->login();
        }
    }

    public function enter(){
        if($this->session->userdata('username') != '') {
            echo '<h2>Welcome ' . $this->session->userdata('username') . '</h2>';
            echo '<a href=">'.base_url().'kalender/logout">Logout</a>';

        } else {
            redirect(base_url() . 'kalender/login');
        }

    }

    public function logout() {
        $this->session->unset_userdata('username');
        redirect(base_url() . 'kalender');
    }
}


    // public function login() {
    //     // get from post
    //     $username = $this->input->post('username');
    //     $password = $this->input->post('password');

    //     // get user id from model
    //     $user_id = $this->User_model->login_user($username,$password);

    //     // validate user
    //     if ($user_id) {
    //         $user_data = array(
    //             'user_id' => $user_id,
    //             'username'=> $username,
    //             'logged_in' => true
    //         );
    //         $this->session->set_userdata($user_data);
    //         redirect('home/index');
    //     } else {
    //         // error 
    //         $this->session->set_flashdata('login_failed','Maaf username/password salah');
    //         redirect('home/index');
    //     }

    // }

?>