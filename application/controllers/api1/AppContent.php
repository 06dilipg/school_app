<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class AppContent extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }


    public function index_get($id)
    {
        if(!empty($id)){
            $data = $this->db->get_where("content_table", ['subject_id' => $id])->row_array();
        }else{


            $data = $this->db->get("content_table")->result();

        }

        $this->response($data, REST_Controller::HTTP_OK);
    }


}