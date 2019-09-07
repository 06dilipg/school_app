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
          //  $data = $this->db->get_where("student_table", ['student_id' => $id,'password' => $password])->row_array();
			
		  $this->db->select('*');
		  $this->db->from('student_table');
		  $this->db->where('student_id', $id);
		  $this->db->where('password', urldecode($password));
		  $query = $this->db->get();
		  
	if ($query->num_rows() > 0) {
	$myObj = new stdClass();
		foreach ($query->result_array() as $row)
		{
		$myObj->student_id = $row['student_id'];
		$myObj->roll_num = $row['roll_num'];
		$myObj->class_st = $row['class'];
		$myObj->school_id = $row['school_id'];
		$myObj->name = $row['name'];
		$myObj->user = "yes";
		
		}
	echo json_encode($myObj);
	
        }else{
			$myObj = new stdClass();
			$myObj->user = "no";
			echo json_encode($myObj);
		}
    }


}
}