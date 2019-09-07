
          <div class="container">  
                <br />  
                <br />  
                
            
         <div class="form-group">  
                 
              <form name="add_name" id="add_name">  
                    
                 
              </form> 

            </div>  <!-- EOF form-group -->

          
           </div>  <!-- Eof Container --> 

           <div class="container">
           <h2 align="center">Profile of Class <?php echo $section;?></h2>  <br>
 
                 <div id="live_data">
                  
                 </div>
</div>  

    
<script>  
  
       $(document).ready(function(){  

        $('#subjName').click(function(){
        alert($(this).attr("value"));
         // $('#contentDetails').show();
        });
        $("p").click(function(){
    alert("The paragraph was clicked.");
  });


        fetch_data();
   
       $('#add').click(function(){ 
       // alert($('#subject').val());
                  // var i=1; 
           $.ajax({  
                url:"<?php echo base_url(); ?>Dashboard/subjectAdd",  
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
                url:"<?php echo base_url(); ?>Profile/get_Allsubjects/?class=<?php echo $section; ?>",
                method:"POST",
                success:function(data){
                    $('#live_data').html(data);
                }
            });
      } 



       $('#pushContents').click(function(){ 
              $.ajax({  
                url:"<?php echo base_url(); ?>Dashboard/addContents?class=<?php echo $section; ?>",  
                method:"POST",  
                data:$('#add_Content').serialize(),  
                success:function(data)  
                {  
                  if(alert(data)){}
else    window.location.reload(); 
                     // alert(data);  
                     $('#add_Content')[0].reset();  
                }  
           });

       });


       function content_fec(){
        
       }

 });  
 </script>

<table class="table table-striped table-bordered">
             <tr>
             <th>ID</th>
             <th>Name</th>
             </tr>

        <?php  foreach($student->result() as $row):?>

                <tr>
                <td><?php echo $row->student_id;?></td>
                <td><?php echo ucwords($row->name);?></td>
                </tr>
        <?php endforeach;?>
        </table>
