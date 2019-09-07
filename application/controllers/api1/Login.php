<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Login extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }


    public function index_get($id,$password)
    {
        if(!empty($id) && !empty($password)){
            $data = $this->db->get_where("school_table", ['student_table' => $id,'password' => $password])->row_array();
        }else{


            $data = $this->db->get("student_table")->result();

        }

        $this->response($data, REST_Controller::HTTP_OK);
    }


}