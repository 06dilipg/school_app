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
			
			 $this->db->select('*');
		  $this->db->from('content_table');
		  $this->db->where('subject_id', $id);
		  $query = $this->db->get();
//echo $this->db->last_query(); 
		//echo $this->db->last_query();
		$someArray = [];
		   
		if ($query->num_rows() > 0) {
		foreach ($query->result_array() as $row)
		{
		array_push($someArray, [
		'id'   => $row['id'],
		'subject_id' => $row['subject_id'],
		'chapter_no' => $row['chapter_id'],
		'para' => $row['chapter_content'],
		'question' => $row['question'],
		'options' => $row['question_options'],
		'hasQA' => $row['hasQA'],
		'img_path' => $row['img_path'],
		'link' => $row['link'],
		'ansQA' => $row['ansQA']
		]);
		}
		echo json_encode($someArray);
			
        }else{
			
           echo json_encode($someArray);
        }
       
    }

	}
}