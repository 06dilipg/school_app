<?php
class Excel_import_model extends CI_Model
{

      var $table = "content_table";  
      var $select_column = array("id", "chapter_content", "question","question_options","correct_answer","hasQA","img_path","link","ansQA" );  
      var $order_column = array(null, "subject_id", "school_id", null, null);  


    function select3()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('content_table');
        return $query;
       
    }
    function select($school_id,$class)
    {
        // $this->db->order_by('id', 'DESC');
        // $query = $this->db->get('content_table');
        // return $query;
        $this->db->where('school_id',$school_id);   
        $this->db->where('class',$class);
        $query = $this->db->get('content_table');
               // print_r($query->row()->class);
                //exit();
        return $query;
    }

    function select1($school_id,$class)
    {
       // $where = "school_id='".$school_id."' AND class='".$class."'";
        $this->db->where('school_id',$school_id);   
        $this->db->where('class',$class);
        $query = $this->db->get('subject_table');
               // print_r($query->row()->subject_name);
               //  exit();
        return $query;

        // $data = array(
        //     'school_id' => $school_id,
        //      'class' => $class
        // );
        // print_r($data);
        // $this->db->where('school_id',$data['school_id']);
        ////$this->db->where('class',$data['class']);
        // $this->db->order_by('school_id', 'DESC');
        // $this->db->where('school_id',$data['email']);
       // $query = $this->db->get('subject_table');
        //echo $query;
       // return $query;
    }
    function select2($class,$id)
    {
        //$this->db->order_by('subject_id', 'DESC');
        $this->db->where('school_id',$id);
        $this->db->where('class',$class);
        $query = $this->db->get('subject_table');
        return $query;
    }


    function insert($data)
    {
        $this->db->insert('content_table', $data);
    }
     function insert1($data)
    {
        $this->db->insert_batch('content_table', $data);
    }
       function insert2($data)
    {
        $this->db->insert_batch('content_table', $data);
    }
      function addSubject($data){
      $this->db->insert_batch('subject_table', $data);

    }
    function addSudent($data){
      $this->db->insert_batch('student_table', $data);

    }
    function pushContent($data){
      $this->db->insert_batch('content_table', $data);

    }
      function content_fetch($class,$subID1)
    {
        //$this->db->order_by('subject_id', 'DESC');
        $this->db->where('subject_id',$subID1);
        $this->db->where('class',$class);
        $query = $this->db->get('content_table');
        return $query;
    }


   
      function make_query()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("subject_id", $_POST["search"]["value"]);  
                $this->db->or_like("school_id", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id', 'DESC');  
           }  
      }  
      function make_datatables(){  
           $this->make_query();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
          function get_filtered_data(){  
               $this->make_query();  
               $query = $this->db->get();  
               return $query->num_rows();  
          }       
          function get_all_data()  
          {  
               $this->db->select("*");  
               $this->db->from($this->table);  
               return $this->db->count_all_results();  
          }



          function fetch_single_content($user_id)  
          {  
               $this->db->where("id", $user_id);  
               $query=$this->db->get('content_table');  
               return $query->result();  
          }  
          function update_content($user_id, $data)  
          {  
              $this->db->where("id", $user_id);  
             $this->db->update("content_table", $data);  
             
          }  
          function delete_Content($user_id)  
      {  
           $this->db->where("id", $user_id);  
           $this->db->delete("content_table");  
           //DELETE FROM users WHERE id = '$user_id'  
      }  
     function get_SubjectDetails($class,$id){
        
         $this->db->where('school_id',$id);
         $this->db->where('class',$class);
         $query = $this->db->get('subject_table');
         return $query;
     }

     function get_StudentDetails($class,$id){
        
          $this->db->where('school_id',$id);
          $this->db->where('class',$class);
          $query = $this->db->get('student_table');
          return $query;
      }

      function get_maxChaptetNum($subject_id){
          $this->db->select_max('chapter_id');
          $this->db->where('subject_id',$subject_id);
          // $this->db->where('class',$class);
         
          $query = $this->db->get('content_table');
         return $query;
        // return $this->db->last_query();

      }
      function get_maxSub_chap($subject_id){
          $this->db->select_max('chapter_id');
          $this->db->where('subject_id',$subject_id);
          // $this->db->where('class',$class);
         
          $query = $this->db->get('content_table');
         return $query;
       // return $this->db->last_query();

      }
      function get_maxsubject_Count($class,$id){
        $this->db->select_count('subject_id');
        $this->db->where('school_id',$id);
        $this->db->where('class',$class);
        // $this->db->where('class',$class);
       
        $query = $this->db->get('subject_table');
       return $query;
     // return $this->db->last_query();

      }
      function get_Std_Chapterno($subject_id,$Stud_id){
        $this->db->select('chapter_no');
        $this->db->where('subject_id',$subject_id);
        $this->db->where('student_id',$Stud_id);
       
        $query = $this->db->get('student_progress');
        return $query;
      // return $this->db->last_query();

    }
    function get_One_Student($class,$studentid){
      $this->db->where('student_id',$studentid);
      $this->db->where('class',$class);
      $query = $this->db->get('student_table');
      return $query;

    }



}