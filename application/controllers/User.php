<?php
class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //if($this->session->userdata('school_id'))
            //redirect('User/index');
           // $this->load->view('layout/Dashboard');
    }
    function dash(){
        $this->load->view('layout/Dashboard');
    }
    function index()
    {
        $this->load->view('layout/login');
    }
    function check_login()
    {
       $username =  $this->input->post('username');
       $password =  $this->input->post('password');
        //username:admin password:123456
        $this->load->model('User_model');
        $result = $this->User_model->validate($username,$password);
         //if($result != null){
        //if (is_array($values) || is_object($values))
        // foreach ($result as $row) {
        //     $sess_data = [
        //         'name' => $row->name,
        //         'school_id' => $row->school_id
        //     ];
        //     $this->session->set_userdata('logged_in', $sess_data);
        // }
        // return TRUE;
        if ($result) {
           $userdata = array(
                'school_id' => $result->school_id,
                'name' => $result->name,
           );

         $this->session->set_userdata($userdata);
        redirect('Dashboard/index/View');
    } else {

        //$this->form_validation->set_message('check_database', 'invalid username and password');
        // $this->session->set_flashdata('msg', 'invalid username and password');
        // redirect('User/index');

        echo "<script>alert('Wrong Credentials...!');window.location='".base_url()."Login';</script>";
    }
 











        // if($check)
        // {
           // $this->session->set_userdata('school_id','1');
             //$data['title'] = "Title";
             // $this->load->view('Dashboard/index/view', $data);
             //redirect('Dashboard/index/view',$data);
            //$this->load->view('layout/Dashboard');
            // $data['title'] = "Dilip";
        //  $this->session->set_userdata('school_id',1);
            
        // redirect('Dashboard/index/view');
        // }
        // else
        // {
        //     redirect('User/index');
        // }
    }
     function logout()
    {
        $this->session->sess_destroy();
       redirect('User/index');
       // $this->load->view('layout/Dashboard');
    }

}