<?php
class Dashboard extends CI_Controller

{

  var $Gobal_Array_sub_max = array();
  var $Gobal_SubjectId  = array();
  var $data = array();
  var $chapter_ID;
  var $Gobal_Max_query;
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
    function logout()
    {
        $this->session->sess_destroy();
        redirect('User/index');
    }

    function fetch()
    {
       $save1 = $this->session->userdata('school_id');
        $save5 = $_GET['class'];
        $data = $this->excel_import_model->select($save1,$save5);
        $output = '
  <h3 align="center">Total Data - '.$data->num_rows().'</h3>
  <table class="table table-striped table-bordered">
   <tr>
   <th>Subject_id</th>
   <th>School_id</th>
    <th>Class</th>
    <th>Chapter_id</th>
    <th>Chapter_content</th>
    <th>Question</th>
    <th>Option 1</th>
    <th>Option 2</th>
    <th>Option 3</th>
    <th>Option 4</th>
    <th>Correct Answer</th>
    <th>Add Quest</th>
    <th>Imgage</th>
    <th>Link</th>
    <th>Answer Question</th>
   </tr>
  ';
        foreach($data->result() as $row)
        {
            $output .= '
   <tr>
    <td>'.$row->subject_id.'</td>
    <td>'.$row->school_id.'</td>
    <td>'.$row->class.'</td>
    <td>'.$row->chapter_id.'</td>
    <td>'.$row->chapter_content.'</td>
     <td>'.$row->question.'</td>
     <td>'.$row->option1.'</td>
     <td>'.$row->option2.'</td>
     <td>'.$row->option3.'</td>
     <td>'.$row->option4.'</td>
    
    <td>'.$row->correct_answer.'</td>
    <td>'.$row->addQuest.'</td>
    <td>'.$row->img_path.'</td>
     <td>'.$row->link.'</td>
    <td>'.$row->ansQA.'</td>
   </tr>
   ';
        }
        $output .= '</table>';
        echo $output;
    }

    function fetch1()
    {
        $save1 = $this->session->userdata('school_id');
         $save2 = 2;
         $save3 = 'dilip';
         $save5 = $_GET['class'];
        // $save = array(
        //     'school_id' => 2,
        //      'class' => 'dilip'
         
        // );
         $data['school_id'] = $this->session->userdata('school_id');
         //$data['class'] = 'dilip';
      // $data=   $this->load->model('excel_import_model',$data);
        $data = $this->excel_import_model->select1($save1,$save5);
    
        foreach($data->result() as $row)
        {  ?>
           <?php  
              $sub_id =  $row->subject_id;
              $sub_name = $row->subject_name;
              $class = $row->class;

                 $this->session->set_userdata('Subject_id', $sub_id );
                 $this->session->set_userdata('Subject_name', $sub_name );
                 $this->session->set_userdata('class', $class );
                 ?>
            <!--  <label id="sub" style="display: none;" ><?php echo $this->session->userdata('Subject_id'); ?></label>  -->  
      <!--          <p><?php echo $this->session->userdata('Subject_id'); ?></p>
               <p><?php echo $this->session->userdata('Subject_name'); ?></p>
               <p><?php echo $this->session->userdata('class'); ?></p> -->
            <input type="radio" value="<?php echo  $this->session->userdata('Subject_id'); ?>" name='subject'><?php echo $row->subject_name; ?>
   
   
    <?php    }
       
        // echo $output;
    }

    function fetch2()
    {
        $class = $_GET['class'];
              $id = $this->session->userdata('school_id') ;
     
       $data = $this->excel_import_model->select2($class,$id);
        $output = '
          <table class="table table-striped table-bordered">
   <tr>
   <th>Subject Name</th>
   
   </tr>
  

  ';
        foreach($data->result() as $row)
        {
            $output .= '
   
 
    <tr>
   
    <td><a href="'. base_url().'Dashboard/index/content/?class='.$class.'&subject='.$row->subject_id.'" id="subjNam1" value="<?php echo $row->subject_id;?>">'.$row->subject_name.'</a></td>
    </tr>
    
 
  
   ';
        }
        $output .= '</table>';

        
        echo $output;
    }

    function fetch3()
    {
              $class = $_GET['class'];
              $id = $this->session->userdata('school_id') ;
     
       $data = $this->excel_import_model->select2($class,$id);
        $output = '
          <table class="table table-striped table-bordered">
   <tr>
   <th>Subject Name</th>
   
   </tr>
  

  ';
        foreach($data->result() as $row)
        {
            $output .= '
   
 
    <tr>
   
    <td><a href="'. base_url().'Dashboard/index/Edit_content/?class='.$class.'&subject='.$row->subject_id.'" id="subjNam1" >'.$row->subject_name.'</a></td>
    </tr>
    
 
  
   ';
        }
        $output .= '</table>';

        
        echo $output;
    }
    function import()
    {

      
        $subId =  $this->input->post('subject');
        $school_id = $this->session->userdata('school_id');
        $classname = $this->input->post('classid');
        

        if(isset($_FILES["file"]["name"]))
        {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach($object->getWorksheetIterator() as $worksheet)
            {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for($row=2; $row<=$highestRow; $row++)
                {
                   


                    //$subject_id = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    // $school_id = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    // $class = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $chapter_id = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $chapter_content = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $question = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $question_options = $worksheet->getCellByColumnAndRow(3, $row)->getValue();

                    $correct_answer = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $hasQA = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                     
                  

                    $img_path = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $link = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $ansQA = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    $data[] = array(
                        // 'subject_id'  => $subject_id,
                        // 'school_id'   => $school_id,
                        // 'class'    => $class,
                        'subject_id' =>  $subId,
                         'school_id' => $school_id,
                         'class'    => $classname,
                        'chapter_id'  => $chapter_id,
                        'chapter_content'   => $chapter_content,
                        'question'  => $question,
                        'question_options' => $question_options,
                        'correct_answer' => $correct_answer,
                        'hasQA'   => $hasQA,
                        'img_path'    => $img_path,
                        'link'  => $link,
                        'ansQA'   => $ansQA
                    );
                }
            }
            $this->excel_import_model->insert2($data);
            echo 'Data Imported successfully';
        }
    }
   function subjectAdd(){
    // $school_id = $this->session->userdata('school_id');
     $class =  $this->input->post('classid');
     $sub =  $this->input->post('sub_name');
   
    $sub1 = 'matha';
          $data[] = array(
                         'school_id'  => $this->session->userdata('school_id'),
                         'class'    => $class,
                        'subject_name'  => $sub
                       
                    );

      $this->excel_import_model->addSubject($data);
     echo 'Subject Created successfully';

   }

   function studentRegister(){
         $class = $_GET['class'];
         // $class =  $this->input->post('classid');
         $stdName = $this->input->post('name');
          $rollno = $this->input->post('rollno');
         $dob = $this->input->post('dob');
         $gender = $this->input->post('gender');
          $pwd = $this->input->post('pwd');

           $data[] = array(
                          'roll_num' => $rollno,
                            'class'    => $class,
                           'school_id'  => $this->session->userdata('school_id'),
                            'name'  => $stdName,
                            ' dob' => $dob,
                            'gender' => $gender,
                            'password' => $pwd

                       
                    );

      $this->excel_import_model->addSudent($data);
     echo 'Registerd successfully';

   }

   function addContents(){
         
    


      // $class = $_GET['class'];
      $class = $this->input->post('class');
      $subid = $this->input->post('subjectID');
       $chapterId = $this->input->post('Chapter_id');
      $chapterDesc = $this->input->post('chapDesc');
     
      $addQuest = $this->input->post('add_Qst');
       $opt1 = $this->input->post('opt1');
      $opt2 = $this->input->post('opt2');
      $opt3 = $this->input->post('opt3');
      $opt4 = $this->input->post('opt4');
      $correctAns = $this->input->post('correct_Ans');
      $cmpQest = $this->input->post('cmpAns');

      // $image = $this->input->post('img');
      $link = $this->input->post('add_Link');
       $addQuestForChapter = $this->input->post('addQues');

    //     $config = array(
    //     'upload_path' => 'upload/',
    //     'allowed_types' => 'jpg|jpeg|png|bmp',
    //     'max_size' => 0,
    //     'filename' => url_title($this->input->post('file')),
     
    // );
    // $this->load->library('upload', $config);
    // $this->upload->do_upload('file');
    // $image =  $this->upload->img_path;

    // if ($this->upload->do_upload('file')) {
    //   $this->db->insert('content_table', array(
    //     'img_path' => $this->upload->img_path
    //   ));
    //   $this->session->set_flashdata('msg', 'Success!!!');
    //   redirect(base_url());
    // }
$config = array(
      'upload_path' => './uploads/',
      'allowed_types' => 'jpg|jpeg|png|bmp',
      'max_size' => 0,
      // 'filename' => $this->session->userdata('school_id').$class.$subid.url_title($this->input->post('file')),
      'filename' => url_title($this->session->userdata('school_id').$class.$subid),
      // 'encrypt_name' => true
    );
    // $this->load->library('upload', $config);

    $this->load->library('upload');
    $this->upload->initialize($config);
    
    if ($this->upload->do_upload('file')) {
      
    }


       $data[] = array(    
                           'subject_id' => $subid,
                           'class'    => $class,
                           'school_id' => $this->session->userdata('school_id'),
                             'chapter_id' => $chapterId,
                            'chapter_content'    => $chapterDesc,
                           'question'  => $addQuest,
                           'option1' =>$opt1,
                           'option2' =>$opt2,
                           'option3' =>$opt3,
                           'option4' =>$opt4,
                           // 'question_options'  => $opt1,
                            'correct_answer' => $correctAns,
                            'addQuest' => $addQuestForChapter,
                             // 'img_path' => $image,
                            'link' => $link,
                            'ansQA' => $cmpQest,
                            'img_path' => $this->upload->file_name

                       
                    );

      $this->excel_import_model->pushContent($data);
     echo 'Content Added Successfully';
   }



    public function do_upload()
        {
                $config['upload_path']          = './images/';
                $config['allowed_types']        = 'gif|jpg|png';
                // $config['max_size']             = 100;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

               // $this->load->library('upload', $config);

                $this->load->library('upload');
               $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('dashboard/upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('dashboard/upload_success', $data);
                }
        }


        public function imageUpload() {
    $config = array(
      'upload_path' => './uploads/',
      'allowed_types' => 'jpg|jpeg|png|bmp',
      'max_size' => 0,
      'filename' => url_title($this->input->post('file')),
      // 'encrypt_name' => true
    );
    // $this->load->library('upload', $config);

    $this->load->library('upload');
    $this->upload->initialize($config);
    
    if ($this->upload->do_upload('file')) {
      $this->db->insert('tb_image', array(
        'file_name' => $this->upload->file_name
      ));
      $this->session->set_flashdata('msg', 'Success!!!');
      redirect('dashboard/imageUpload');
    }
    
    // $this->data = array(
    //   'get_image' => $this->db->get('tb_image')
    // );
    
    // $this->load->view('dashboard/Image_view', $this->data);
  }



  //For Contents
     function fetch_content()
    {
        $class = $_GET['class'];
        $subID1 = $_GET['subject'];
        $id = $this->session->userdata('school_id') ;
     
        $data = $this->excel_import_model->content_fetch($class,$subID1);
        $output = '
          <table id="example" class="table table-striped table-bordered" style="width:100%">

          <thead>
     

            <tr>
                <th>Chapter Content</th>
                <th>Question</th>
                <th>Option 1</th>
                <th>Option 2</th>
                <th>Option 3</th>
                <th>Option 4</th>
                <th>Correct Answer</th>
                <th>Add Question</th>
                <th>Image</th>
                <th>Link</th>
                <th>Complusory Answer</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
 
   
  

  ';
        foreach($data->result() as $row)
        {
            $output .= '
   
      <tbody>
            <tr>
                <td>'.$row->chapter_content.'</td>
                <td>'.$row->question.'</td>
                <td>'.$row->option1.'</td>
                <td>'.$row->option2.'</td>
                <td>'.$row->option3.'</td>
                <td>'.$row->option4.'</td>
                <td>'.$row->correct_answer.'</td>
                <td>'.$row->addQuest.'</td>  
                 
                 <td><img src="'.base_url().'uploads/'.$row->img_path.'" class="img-thumbnail" width="50" height="35" alt="no_image"/></td>
               
                <td>'.$row->link.'</td>
                <td>'.$row->ansQA.'</td>
               
                <td><button  class="btn btn-warning update" name="update" id="'.$row->id.'">Edit </button></td>

               <td><button name="delete"  id="'.$row->id.'" class="btn btn-danger delete">Delete</button></td>


                   
               
            </tr>

       </tbody>        
  
   ';
        }
        $output .= '</table>';

        
        echo $output;
    }




       function fetch_content11(){  
           $class = $_GET['class'];
           $subID1 = $_GET['subject'];
           $this->load->model("excel_import_model");  
           $fetch_data = $this->excel_import_model->make_datatables($class,$subID1);  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                 
                $sub_array[] = $row->chapter_content;  
                $sub_array[] = $row->question;  
                $sub_array[] = $row->question_options;  
                $sub_array[] = $row->correct_answer;
                $sub_array[] = $row->hasQA;  
                $sub_array[] = '<img src="'.base_url().'uploads/'.$row->img_path.'" class="img-thumbnail" width="50" height="35" alt="no_image"/>'; 
                $sub_array[] = $row->link;
                $sub_array[] = $row->ansQA;  
                
                $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-warning btn-xs">Update</button>';  
                $sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs">Delete</button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->excel_import_model->get_all_data($class,$subID1),  
                "recordsFiltered"     =>     $this->excel_import_model->get_filtered_data($class,$subID1),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      } 


      //Fetch content to Update
      
      function fetch_single_content()  
      {  
           $output = array();  
           $this->load->model("excel_import_model");  
           $data = $this->excel_import_model->fetch_single_content($_POST["user_id"]);  
           foreach($data as $row)  
           {  
                $output['chapter_content'] = $row->chapter_content;  
                $output['question'] = $row->question;
                 $output['option1'] = $row->option1;  
                $output['option2'] = $row->option2;
                 $output['option3'] = $row->option3;  
                $output['option4'] = $row->option4;
                 $output['correct_answer'] = $row->correct_answer;  
                $output['addQuest'] = $row->addQuest; 
                $output['link'] = $row->link;  
                $output['ansQA'] = $row->ansQA;  
                if($row->img_path != '')  
                {  
                     $output['img_path'] = '<img src="'.base_url().'uploads/'.$row->img_path.'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row->img_path.'" />';  
                }  
                else  
                {  
                     $output['img_path'] = '<input type="hidden" name="hidden_user_image" value="" />';  
                }  
           }  
           echo json_encode($output);  
      }  



      function updateContent(){
        $class = $this->input->post('class');
        $subid = $this->input->post('subjectID');
        $config = array(
          'upload_path' => './uploads/',
          'allowed_types' => 'jpg|jpeg|png|bmp',
          'max_size' => 0,
          'filename' => url_title($this->session->userdata('school_id').$class.$subid),
           );
        
    
        $this->load->library('upload');
        $this->upload->initialize($config);
        $img_path = '';  
        if(isset($_FILES['user_image'])){
          echo $_FILES['user_image']['name'];
      }

                // if($_FILES["user_image"]["name"] != '')  
                // {  
                //      $img_path = $this->upload_image();  
                // }  
                // else  
                // {  
                //      $img_path = $this->input->post("hidden_user_image");  
                // }  
                echo  $this->input->post('chapDesc');
                $updated_data = array(  
                     'chapter_content'    =>     $this->input->post('chapDesc'),  
                     'addQuest'           =>     $this->input->post('addQues'),  
                     'ansQA'              =>     $this->input->post('cmpAns'),  
                     'question'           =>     $this->input->post('add_Qst'),  
                     'option1'            =>     $this->input->post('opt1'),  
                     'option2'            =>     $this->input->post('opt2'), 
                     'option3'            =>     $this->input->post('opt3'),  
                     'option4'            =>     $this->input->post('opt4'), 
                     'correct_answer'     =>     $this->input->post('correct_Ans'),  
                     'link'               =>     $this->input->post('add_Link'),  

                     'img_path'           =>     $img_path  
                );  
                $this->load->model('excel_import_model');  
                $this->excel_import_model->update_content($this->input->post("user_id"), $updated_data);  
                echo 'Data Updated'; 

      }
      function upload_image()  
      {  
           if(isset($_FILES["file"]))  
           {  
                $extension = explode('.', $_FILES['file']['name']);  
                $new_name = rand() . '.' . $extension[1];  
                $destination = './uploads/' . $new_name;  
                move_uploaded_file($_FILES['file']['tmp_name'], $destination);  
                return $new_name;  
           }  
      }  


          function update_Content()
          {
              
      
                    $updated_data = array(  
                      'chapter_content'    =>     $this->input->post('chapDesc'),  
                      'addQuest'           =>     $this->input->post('addQues'),  
                      'ansQA'              =>     $this->input->post('cmpAns'),  
                      'question'           =>     $this->input->post('add_Qst'),  
                      'option1'            =>     $this->input->post('opt1'),  
                      'option2'            =>     $this->input->post('opt2'), 
                      'option3'            =>     $this->input->post('opt3'),  
                      'option4'            =>     $this->input->post('opt4'), 
                      'correct_answer'     =>     $this->input->post('correct_Ans'),  
                      'link'               =>     $this->input->post('add_Link') 

                    
                );
                $this->load->model('excel_import_model');  
                $this->excel_import_model->update_content($this->input->post("user_id"), $updated_data);  
                echo 'Updated Successfully'; 
      
      }

      function delete_Content()  
      {  
           $this->load->model("excel_import_model");  
           $this->excel_import_model->delete_Content($_POST["user_id"]);  
           echo 'Deleted Successfully';  
      }  



      function get_Allsubjects()
      {
                $class = $_GET['class'];
                $id = $this->session->userdata('school_id') ;
       
                $subject = $this->excel_import_model->get_SubjectDetails($class,$id);
                $student = $this->excel_import_model->get_StudentDetails($class,$id);

                   
                








    
                  
                        
                 


            
                
              $output = '
            <table class="table table-striped table-bordered">
     <tr>
     <th>Student Id</th>
     <th>Student Name</th>  ';
     foreach($subject->result() as $row)
     {
          $Gobal_SubjectId = $row->subject_id;
         $output .= ' <th>'.$row->subject_name.'</th>';
        
     }
     $output .= '
     
     
     </tr>
    
  
    ';
          foreach($student->result() as $row1)
          {
         
           
            $output .= '
           
   
      <tr>
      <td>'.$row1->student_id.'</td>
      <td><a href="">'.ucwords($row1->name).'</a></td> ';
      foreach($subject->result() as $row)
      {
           $Gobal_SubjectId = $row->subject_id;
          $output .= ' <th>'.get_MaxchapterNo($Gobal_SubjectId,$row1->student_id).'</th>';
         
      }
      
      
      
      
          }
         

          $output .= ' </tr> ';

      
     
      
   
    
    
        
          $output .= '</table>';



  
          
          echo $output;
      }
  
//eof all sunbj
   


       function viewDemo(){
        $data['todo_list'] = array('Clean House', 'Call Mom', 'Run Errands');

        $data['title'] = "My Real Title";
        $data['heading'] = "My Real Heading";

        $class = 5;
        $id = 2 ;




        $subject= $this->excel_import_model->get_SubjectDetails($class,$id);
        $student= $this->excel_import_model->get_StudentDetails($class,$id);

        $data['student'] = null;
        if($student){
          $data['student'] =  $student;
         }



       

        $this->load->view('Dashboard/View_demo',$data);
       }





       function Profile1(){
        $class = $_GET['class'];
        $id = $this->session->userdata('school_id') ;

        $subject = $this->excel_import_model->get_SubjectDetails($class,$id);
        $student = $this->excel_import_model->get_StudentDetails($class,$id);

            foreach($student->result() as $row){   //Student Table
                    $name= ucwords($row->name);
                 //echo "Student Id".   $Stud_id = $row->student_id.'<br>';
                 $Stud_id = $row->student_id;


                    foreach($subject->result() as $row1){  // Subject Table
                      $subject_id = $row1->subject_id;
                       $ChapterNum = 0;
                       $chapter_ID = 0;

                      $Std_Chapterno = $this->excel_import_model->get_Std_Chapterno($subject_id,$Stud_id); //Student Progress
                           foreach($Std_Chapterno->result() as $row2){ 

                           $ChapterNum = $row2->chapter_no;
                           }
                        
                        
                           $Content_ChpID = $this->excel_import_model->get_maxChaptetNum($subject_id);
                           
                           foreach ($Content_ChpID->result_array() as $row11)
                           {
                                   $chapter_ID =  $row11['chapter_id'];
                                   // echo $row['name'];
                                   // echo $row['body'];

                           }

                          $Result = ($ChapterNum/$chapter_ID)*100;
                               echo "Percentage Is :".  $Result ."<br>" ;  



                    }


           $output = '
                    <table class="table table-striped table-bordered">
             <tr>
             <th>Student Id</th>
             <th>Student Name</th>  ';
                  foreach($subject->result() as $row)
                  {
                        $Gobal_SubjectId = $row->subject_id;
                      $output .= ' <th>'.$row->subject_name.'</th>';
                      
                  }
             $output .= '  </tr> ';
                    foreach($student->result() as $row1) {
                      $output .= '
             
           
            
          
          
                
                 
                 
                   
                   
                   
           
              <tr>
              <td>'.$row1->student_id.'</td>
              <td><a href="">'.ucwords($row1->name).'</a></td> 
              <td>'.$Result.'</td>
              
              ';
              // foreach($student->result() as $row1)
              // {
              // $output .= '   <td>'.$row1->student_id.'</td> ';
              // }
              
                  }
                 
          
                  $output .= ' </tr> ';
        
              
             
              
           
            
            
                
                  $output .= '</table>';
        
        
        
          
                  
                  echo $output;

          
                
            }


            function get_MaxchapterNo($subID,$studID){
                      
              $Std_Chapterno = $this->excel_import_model->get_Std_Chapterno($subID,$studID); //Student Progress
              foreach($Std_Chapterno->result() as $row2){ 

              $ChapterNum = $row2->chapter_no;
              }
           
           
              $Content_ChpID = $this->excel_import_model->get_maxChaptetNum($subID);
              
              foreach ($Content_ChpID->result_array() as $row11)
              {
                      $chapter_ID =  $row11['chapter_id'];
                      // echo $row['name'];
                      // echo $row['body'];

              }

         return "Percentage Is: ".$Result = ($ChapterNum/$chapter_ID)*100 ."%<br>";
            }

       }
 

}