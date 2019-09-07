<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class AppSend_Subject extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

urldecode($class)
    public function index_get($id,$class)
    {
        if(!empty($id)){
            $data = $this->db->get_where("subject_table", ['school_id' => $id,urlencode( 'class' => $class]))->row_array();
            //$data1 = urlencode($data);
        }else{


            $data = $this->db->get("subject_table")->result();

        }

        $this->response($data, REST_Controller::HTTP_OK);
    }


}