<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class QuestionAns extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }


    public function index_get($stId,$subID,$ques,$ans)
    {

    	//echo $ques;
    	//echo  $Question =urldecode($ques)."}";
        if(!empty($stId) && !empty($subID)){
          //  $data = $this->db->get_where("student_table", ['student_id' => $id,'password' => $password])->row_array();
			
		  // $this->db->select('*');
		  // $this->db->from('student_progress');
		  // $this->db->where('student_id', $stId);
		  // $this->db->where('subject_id',$subID);
		  // $query = $this->db->get();
		  
	 $data =	$this->db->query("SELECT * FROM student_progress WHERE student_id='".$stId."' AND subject_id= '".$subID."'")->row_array();
	//$myObj = new stdClass();
	 //    $stud_res = "";
		// foreach ($query->result_array() as $row)
		// {

		//$myObj->student_id = $row['student_results'];
		//$stud_res = $myObj->student_id;
	     $stud_res = $data['student_results'];
	    
	   // print_r(@$keys);
           // echo  "Chapter ID". $chptID = $row->chapter_id ."<br>";
                       //$chptID = $row->chapter_id                                         ;
                         // if( @in_array($chptID, $keys)){
		 // $student_results  = str_replace("}",$QuestionAns,$stud_res);
	 
	
	    // }
        @$keys = array_keys(json_decode($stud_res, true));
       //  print_r(@$keys);
       if( @in_array($ques, $keys)){
	    	// echo "true";
            //echo $json_stud =  json_encode($stud_res);
            //print_r(json_decode($json_stud));
            //$json_decode = json_decode($json_stud);
       	    // var_dump(json_decode($stud_res,true));
              // Decode JSON data to PHP associative array
$arr = json_decode($stud_res, true);
echo "Parsing data by using PHP Array <br/>";

// Access values from the associative array
echo $arr["$ques"]."<br/>";
  $arr["$ques"] = (int)$ans;

 echo  $imp = json_encode($arr,true);

       $data1 =	$this->db->query("UPDATE student_progress SET  student_results='".$imp."'  WHERE student_id='".$stId."'  AND subject_id='".$subID."' ");
      //echo $this->db->last_query();


 	    }else{
	    	echo "False";
	    }
		  

	//echo json_encode($myObj);
	
        
    }


}
}