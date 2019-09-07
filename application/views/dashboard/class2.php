  <html>  
      <head>  
           <title>Dynamically Add or Remove input fields in PHP with JQuery</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>   
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           
      </head>  
      <body>  
           <div class="container">  
                <br />  
                <br />  
                <h2 align="center">Create Subjects </h2>  
                <div class="form-group">  
                     <form name="add_name" id="add_name">  
                          <div class="table-responsive">  
                               <table class="table table-bordered" id="dynamic_field">  
                                    <tr>  
                                        <!--  <td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>  
                                         <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
 -->                                         <td><input type="text" name="sub_name[]" placeholder="Enter Class Name" class="form-control name_list" /></td> 
                                         <td><button type="button" name="add" id="add" class="btn btn-success">Create Subject</button></td>
                                    </tr>  
                               </table> 
                               <h3>List of Subjects</h3> 
                               <div id="live_data"></div>
                             <!--   <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />   -->
                          </div>  
                     </form>  
                </div>  
           </div>  

      </body>  
 </html>  
 <script>  
  
       $(document).ready(function(){  
        fetch_data();
      // var i=1;  
      // $('#add').click(function(){  
      //      i++;  
      //      $('#dynamic_field').append('<tr id="row'+i+'"><td> <button class="btn-success" name="sub_name[]" >AS</button></td></tr>');  
      // }); 

      // $(document).on('click', '.btn_remove', function(){  
      //      var button_id = $(this).attr("id");   
      //      $('#row'+button_id+'').remove();  
      // });  
      // $('#submit').click(function(){            
      //      $.ajax({  
      //           url:"name.php",  
      //           method:"POST",  
      //           data:$('#add_name').serialize(),  
      //           success:function(data)  
      //           {  
      //                alert(data);  
      //                $('#add_name')[0].reset();  
      //           }  
      //      });  
      // });  
       $('#add').click(function(){ 
                  // var i=1; 
           $.ajax({  
                url:"name.php",  
                method:"POST",  
                data:$('#add_name').serialize(),  
                success:function(data)  
                {  
                  if(alert(data)){}
else    window.location.reload(); 
                     // alert(data);  
                     $('#add_name')[0].reset();  
                }  
           });  
      });

        function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      } 

 });  
 </script>
   