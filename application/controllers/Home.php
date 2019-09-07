<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
    }

    public function index($page)
    {
        if (!file_exists('application/views/layout/'.$page.'.php')){
            show_404();
        }
        $this->load->view('layout/'.$page);
    }
    public function Login_form(){
        $save = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );
        $this->Login_model->saveLogin($save);
        redirect('Home/index');

    }
        public  function  getUser(){
            $data['result'] = $this->Login_model->fetchUser();
            $this->load->view('layout/sample',$data);
        }

}
