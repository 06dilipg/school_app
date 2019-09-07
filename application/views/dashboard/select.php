<?php  
 $connect = mysqli_connect("localhost", "root", "", "button_tbl");  
 $output = '';  
 $sql = "SELECT * FROM btn_name 

ORDER BY id DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     
                     <th width="40%">Subject Name</th>  
                     
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = 

mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
              
                     <td class="Subject_name" data-id1="'.$row["id"].'" contenteditable>'.$row["name"].'</td>  
                    
                      
                </tr>  
           ';  
      }  
   
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  


      </div>';  
 echo $output;  
 ?>