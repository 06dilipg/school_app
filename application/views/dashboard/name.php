   <?php  
 $connect = mysqli_connect("localhost", "root", "", "button_tbl");  
 $number = count($_POST["sub_name"]);  
 if($number > 0)  
 {  
      for($i=0; $i<$number; $i++)  
      {  
           if(trim($_POST["sub_name"][$i] != ''))  
           {  
                $sql = "INSERT INTO btn_name(name) VALUES('".mysqli_real_escape_string($connect, $_POST["sub_name"][$i])."')";  
                mysqli_query($connect, $sql);  
           }  
      }  
      echo "Data Inserted";  
 }  
 else  
 {  
      echo "Please Enter Name";  
 }  
 ?> 