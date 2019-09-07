<?php

class User1 extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session','form_validation'));
        $this->load->model('User_model');
        $this->load->database();
    }

    public function index(){
        $this->load->view('layout/login');
    }

    public function login(){
        //recieve user form data

      $email =  $this->input->post('email');
      $password =  $this->input->post('password');

      // Validate User1 Inputs
        $this->form_validation->set_rules('email','Email','requiredvalid_email');
        $this->form_validation->set_rules('password','Password','required');

        //Check if validation is succefful
        $isvaild = $this->form_validation->run();

        if ($isvaild){

            $encrpt_pass = hash('ripemd128',$password);
            //check model for database operations
           if ( $result = $this->User_model->login($email,$encrpt_pass)){
                $user_session = array(
                    'id' => $result['id'],
                     'name' => $result['name']
                );
                $this->session->set_userdata($user_session);
                 $this->load->view('layout/Dashboard');

           }else{
               $this->session->set_flashdata('error','Invalid username or password');
               $this->load->view('layout/Login');
           }
        }else{
            //$this->session->set_flashdata('error','Invalid username or password');
            $this->load->view('layout/Login');
        }
    }

}


if ($email == $user && $password ==  $pass){
    $this->load->view('layout/Database_config');
}else{ echo 'hai';}

