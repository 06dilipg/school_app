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


    public function index_get($id,$class)
    {
        if(!empty($id)){
           // $data = $this->db->get_where("subject_table", ['school_id' => $id,'class' =>  urldecode($class)])->row_array();
			
		  //hari coding starts hear
		

		  $this->db->select('subject_id, subject_name');
		  $this->db->from('subject_table');
		  $this->db->where('school_id', $id);
		  $this->db->where('class', urldecode($class));
		  $query = $this->db->get();

		//echo $this->db->last_query();
		$someArray = [];
		   
		if ($query->num_rows() > 0) {
		foreach ($query->result_array() as $row)
		{
		array_push($someArray, [
		'id'   => $row['subject_id'],
		'name' => $row['subject_name']
		]);
       
		}
		echo json_encode($someArray);
		}else{
	$myObj = new stdClass();
			$myObj->status = "[]";
		echo "{json_encode($myObj)}";
		}
	
		  // hari code ends hear
        
    }

	}
}