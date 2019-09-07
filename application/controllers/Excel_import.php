

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excel_import extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('excel_import_model');
        $this->load->library('Excel');
    }

    function index()
    {

        $this->load->view('layout/excel_import');
    }

    function fetch()
    {
        $data = $this->excel_import_model->select3();
        $output = '
  <h3 align="center">Total Data - '.$data->num_rows().'</h3>
  <table class="table table-striped table-bordered">
   <tr>
   <th>subject_id</th>
   <th>school_id</th>
    <th>class</th>
    <th>chapter_id</th>
    <th>chapter_content</th>
    <th>question</th>
    <th>question_options</th>
    <th>correct_answer</th>
    <th>hasQA</th>
    <th>img_path</th>
    <th>link</th>
    <th>ansQA</th>
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
    <td>'.$row->question_options.'</td>
    <td>'.$row->correct_answer.'</td>
    <td>'.$row->hasQA.'</td>
    <td>'.$row->img_path.'</td>
     <td>'.$row->link.'</td>
    <td>'.$row->ansQA.'</td>
   </tr>
   ';
        }
        $output .= '</table>';
        echo $output;
    }

    function import()
    {
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


                    $subject_id = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $school_id = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $class = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $chapter_id = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $chapter_content = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                     $question = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                      $hasQA = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                       $img_path = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                        $link = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                         $ansQA = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                    $data[] = array(
                        'subject_id'  => $subject_id,
                        'school_id'   => $school_id,
                        'class'    => $class,
                        'chapter_id'  => $chapter_id,
                        'chapter_content'   => $chapter_content,
                        'question'  => $question,
                        'hasQA'   => $hasQA,
                        'img_path'    => $img_path,
                        'link'  => $link,
                        'ansQA'   => $ansQA
                    );
                }
            }
            $this->excel_import_model->insert1($data);
            echo 'Data Imported successfully';
        }
    }
}

?>