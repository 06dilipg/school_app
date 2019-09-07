<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->view('layout/Register');
        $this->load->model('Register_model');
    }

//    public function index($page)
//    {
//        if (!file_exists('application/views/layout/'.$page.'.php')){
//            show_404();
//        }
//        $this->load->view('layout/'.$page);
//    }
    public function insert(){
        $save = array(
            'school_name' => $this->input->post('school_name'),
            'school_address' => $this->input->post('school_address'),
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'mobile_number' => $this->input->post('mobile_number')
        );
        $this->Register_model->saveRegister($save);
       // redirect('Home/index');
        //echo json_encode($save);
        //echo "insert";
       

        // echo '<script>alert("Registered Successfully");</script>';
        //  redirect('Register');

         echo "<script>alert('Registered Successfully');window.location='".base_url()."Login';</script>";

    }
    public  function  getUser(){
        $data['result'] = $this->Login_model->fetchUser();
        $this->load->view('layout/sample',$data);
    }

}
