<?php
class Profile extends CI_Controller
{
    function __construct()
     {
          parent::__construct();
            //        if(!$this->session->userdata('school_id'))
            //            redirect('User');
           $this->load->helper(array('form', 'url'));
           $this->load->helper('function');
           $this->load->model('excel_import_model');
            $this->load->library('Excel');
            if (!$this->session->userdata('school_id')) {
                redirect('user/index');
                } 
     }
        function index($page)
        {

            $this->load->view('includes/header');
            $this->load->view('includes/navbar');
            $this->load->view('dashboard/'.$page, $_GET);
            $this->load->view('includes/footer');
            //echo $_SESSION[school_id];
            //echo "df";
            
        }
        function get_Allsubjects()
        {
               
                  $class = $_GET['class'];
                  $id = $this->session->userdata('school_id') ;
         
                  $subject = $this->excel_import_model->get_SubjectDetails($class,$id);
                  $student = $this->excel_import_model->get_StudentDetails($class,$id);
  
                      foreach($student->result() as $row){   //Student Table
                              $name= ucwords($row->name);
                           echo "Student Id : ".   $Stud_id = $row->student_id.'<br>';
                            // $Stud_id = $row->student_id;
  
  
                              foreach($subject->result() as $row1){  // Subject Table
                               echo "Subject ID :". $subject_id = $row1->subject_id.'<br>';
                                 $ChapterNum = 0;
                                 $chapter_ID = 0;
  
                                $Std_Chapterno = $this->excel_import_model->get_Std_Chapterno($subject_id,$Stud_id); //Student Progress
                                     foreach($Std_Chapterno->result() as $row2){ 
  
                                  echo "Chapter NO : ".   $ChapterNum = $row2->chapter_no.'<br>';
                                  echo "*************************".'<br>';
                                   $ChapterNum = $row2->chapter_no;
                                     }
                                  
                                  
                                    $Content_ChpID = $this->excel_import_model->get_maxChaptetNum($subject_id);
                                     
                                     foreach ($Content_ChpID->result_array() as $row11)
                                     {
                                             $chapter_ID =  $row11['chapter_id'];
                                            
  
                                     }
  
                                     $Result = ($ChapterNum/$chapter_ID)*100;
                                      echo "Percentage Is : ".$Result."%"."<br>";


                          


  
  
  
                              }
  
  
  
      
                    
                          
                      }
  
  
  
              
                  
 
        }
    
}