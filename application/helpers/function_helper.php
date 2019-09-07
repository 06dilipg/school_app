<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function getSubjectName($id){
	 $ci =& get_instance();
       
       //load databse library
       $ci->load->database();
       
       //get data from database
       $query = $ci->db->get_where('subject_table',array('subject_id'=>$id));
       
       if($query->num_rows() > 0){
           $result = $query->row_array();
           return $result;
       }else{
           return false;
       }
}

















?>