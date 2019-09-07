<div class="container">
	<h3 style="text-align: center;">Editing Contents For Class : <?php echo $class; ?></h3>
    <h2 style="text-align: center;">Subject <?php echo getSubjectName($subject)['subject_name']; ?></h2>
	<div class="row">
		<div class="col-md-6">
			<!--  <button id="my_button" value="dil">dd</button> -->
			  <div id="content_data">
          
          
		</div>	

			
	</div>
</div>
			  <!-- Modal -->
  <div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog modal-lg">
    <form class="form-horizontal"  id="edit_Content"  name="add_Student" enctype="multipart/form-data">
      <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Contents</h4>
            </div>
            <div class="modal-body">

             	<div class="col-md-12">
                	<!-- 	<?php
                            $class = $_GET['class'];
                            $subID1 = $_GET['subject'];
                            $id = $this->session->userdata('school_id') ;
                        
                            $data = $this->excel_import_model->content_fetch($class,$subID1);

        	              	?> -->
           
              <div class="form-group">
                  <input type="hidden" name="class" value="<?php echo $class;?>">
                  <input type="hidden" name="subjectID" value="<?php echo  $subject;?>">
              </div>
       
             <div class="form-group">
                  <label>Select Image</label>
                  <input class="agile-ltext" type="file" name="user_image" id="images" placeholder="Select Image" class="form-control">
                  <span id="user_uploaded_image"></span>
             </div>
              <div class="form-group">
                  <label>Chapter Description</label><br>
                  <textarea class="agile-ltext" name="chapDesc"  id="chapDesc" required="" class="form-control" rows="5" cols="50"></textarea>
              </div>
              <div class="form-group" id="testing11">
                  <label>Would like to add question for this Chapter ?</label> :&nbsp&nbsp&nbsp&nbsp
                  <input type="radio" name="addQues" id="add_Yes" value="Yes">Yes &nbsp
                  <input type="radio" name="addQues" id="add_No" value="No">No
             </div>
         <div id="Extras">
              <div class="form-group">
                  <label>Should compulsory answer the question ?</label> : &nbsp&nbsp&nbsp
                  <input  class="agile-ltext" type="radio"  id="cmpAns" name="cmpAns" value="Yes">Yes &nbsp
                  <input class="agile-ltext" type="radio" name="cmpAns" value="No">No
               </div>
              <div class="form-group">
                  <label>Enter Question</label>
                   <input  type="text" name="add_Qst" id="Question" class="form-control">
           
                  <label>Option 1</label>
                  <input  type="text" name="opt1" id="Option1" class="form-control">
                  <label>Option 2</label>
                  <input  type="text" name="opt2" id="Option2"  class="form-control">
                  <label>Option 3</label>
                  <input  type="text" name="opt3" id="Option3" class="form-control">
                  <label>Option 4</label>
                  <input  type="text" name="opt4" id="Option4" class="form-control">
               </div>

              <div class="form-group">
                  <label>Correct Answer</label>
                  <input  type="text" name="correct_Ans" id="Correct_Answer" class="form-control">
              </div>
              <div class="form-group">
                  <label>Link</label>
                  <input  type="text" name="add_Link" id="Link" class="form-control">
              </div>
           </div>
        
       
        </div>

          

        </div>
          <div class="modal-footer">
                <input type="hidden" name="user_id" id="user_id" />
                <button type="button" class="btn btn-primary" id='Update'>Update</button>	
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
          
      </div>
    </div>
    </form>
  </div>
  	<!-- Datatable -->
		<script type="text/javascript">
			$(document).ready(function() {
				
		    $('#example').DataTable();
		} );
		</script>
<script type="text/javascript">
	$(document).ready(function(){  
	

	      fetch_content();
	
	        function fetch_content()  
	      {  
	            
	            $.ajax({
	                url:"<?php echo base_url(); ?>Dashboard/fetch_content/?class=<?php echo $class; ?>&subject=<?php echo  $subject;?>",
	                method:"POST",
	                success:function(data){
	                    $('#content_data').html(data);
	                }
	            });
	      }

	    $('#my_button').click(function() {
            alert($(this).val());
        });
        //  $('#Update').click(function() {
        //     alert(200);
        // });
         
        });
 

     
</script>
<script>  
  
       $(document).ready(function(){ 
       $('#Extras').hide();

          $("#testing11").click(function(){
              if ($("#add_Yes").is(":checked")) {
                $("#Extras").show("fade");
              } else {
                $("#Extras").hide("fade");
    }
         
        
   
        
       
      
});
           
          	   $(document).on('click', '.update', function(){  

           var user_id = $(this).attr("id");  
           //alert(user_id);
           $.ajax({  
                url:"<?php echo base_url(); ?>Dashboard/fetch_single_content",  
                method:"POST",  
                data:{user_id:user_id},  
                dataType:"json",  
                success:function(data)  
                
                {  
                     $('#editModal').modal('show');  
                   //  $('#chapContent').val(data.chapter_content);  
                     $('#chapDesc').val(data.chapter_content);
                      $('.addQues').val(data.addQuest);  
                     $('.cmpAns').val(data.ansQA);
                      $('#Question').val(data.question);  
                     $('#Option1').val(data.option1);
                      $('#Option2').val(data.option2);  
                     $('#Option3').val(data.option3); 
                      $('#Option4').val(data.option4);  
                       $('#Correct_Answer').val(data.correct_answer);  
                        $('#Link').val(data.link);   

                  

                    // $('.modal-title').text("Edit User");  
                     $('#user_id').val(user_id);  
                     $('#user_uploaded_image').html(data.img_path);  
                    // $('#action').val("Edit");  

                    if(data.addQuest == 'Yes'){
                        
                       
                        $("#add_Yes").prop("checked", true);

                        if ($("#add_Yes").is(":checked")) {
                             $("#Extras").show("fade");
                                } else {
                                  $("#Extras").hide("fade");
                                 }
                    }

                    if(data.ansQA == 'Yes'){
                        
                       
                        $("#cmpAns").prop("checked", true);
                    }
        
         
                    
                   
                }  
           })  
      });



           $('#Update').click(function(){ 
      
               $.ajax({  

                        url:"<?php echo base_url(); ?>Dashboard/update_Content",  
                        method:"POST",  
                        data:$('#edit_Content').serialize(),  
                        success:function(data)  
                        {  
                            if(alert(data)){}
                           else    window.location.reload(); 
                             // alert(data);  
                            $('#edit_Content')[0].reset();  
                
                        }
                                                      
                      });  
               });
            

          $(document).on('click', '.delete', function(){  
           var user_id = $(this).attr("id");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>Dashboard/delete_Content",  
                     method:"POST",  
                     data:{user_id:user_id},  
                     success:function(data)  
                     {  
                          alert(data);  
                          window.location.reload();  
                     }  
                });  
           }  
           else  
           {  
                return false;       
           }  
      });  


       });
     </script>