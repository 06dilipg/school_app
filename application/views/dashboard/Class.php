
	<style>
	#commentForm {
		width: 500px;
	}
	#commentForm label {
		width: 250px;
	}
	#commentForm label.error, #commentForm input.submit {
		margin-left: 253px;
	}
	#create_subject1 {
		width: 670px;
	}
	#create_subject label.error {
		margin-left: 10px;
		width: auto;
		display: inline;
          color:red;
	}
	#newsletter_topics label.error {
		display: none;
		margin-left: 103px;
	}
	</style>         
          <!-- <div class="container">   -->
              
                
            
         <!-- <div class="form-group">   -->
                 
              <!-- <form name="add_name" id="add_name">  
                   <h2 align="center">Create Subjects For Class <?php echo $section;?></h2>  
                   <div class="table-responsive">  
                        <table class="table table-bordered" id="dynamic_field">  
                              <tr>  
                                 <td><input type="text" name="sub_name" id="subject" placeholder="Enter Class Name" class="form-control name_list" /></td> 
                                 <input type="hidden" value="<?php echo $section; ?>" name="classid" />
                                 <td><button type="button" name="add" id="add" class="btn btn-success">Create Subject</button></td>
                              </tr>  
                         </table> 


                               
                         
                           
                      </div>  
                 </form>  -->

                 

           <!-- </div>   EOF form-group -->
            

          
         <!--   </div>  Eof Container --> 
    <div class="container"> <br><br>

               <form class="form-horizontal" role="form" id="create_subject">
                      <fieldset>
                           <legend>Create Subjects For Class <?php echo $section;?></legend>
                                  <div class="form-group">
                                        <label class="col-sm-3 control-label" for="card-holder-name">Name of Subject</label>
                                        <div class="col-sm-9">
                                             <input type="text" class="form-control" name="sub_name" id="card-holder-name" placeholder="Enter Subject Name">
                                             <input type="hidden" value="<?php echo $section; ?>" name="classid" />
                                        </div>
                                  </div>
                                   <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9">
                                             <button type="submit" class="btn btn-primary">Create Now</button>
                                        </div>
                                   </div>
                         
                         
                         </fieldset>
                    </form>
      </div>
           <div class="container">
             <div class="col-md-6">
                 <h3>List of Subjects</h3>
                  <!-- <p>This is para</p><br><br>

                  <button id="subjName1" value="this is button">Dil</button><br> -->
                 <div id="live_data">
                  
                 </div>
           </div>
           </div>
  



          

    
<script>  
  
       $(document).ready(function(){  

        $('#subjName').click(function(){
        alert($(this).attr("value"));
         // $('#contentDetails').show();
        });
//         $("p").click(function(){
//     alert("The paragraph was clicked.");
//   });


        fetch_data();
   
       $('#add').click(function(){ 
       // alert($('#subject').val());
                  // var i=1; 
//            $.ajax({  
//                 url:"<?php echo base_url(); ?>Dashboard/subjectAdd",  
//                 method:"POST",  
//                 data:$('#add_name').serialize(),  
//                 success:function(data)  
//                 {  
//                   if(alert(data)){}
// else    window.location.reload(); 
                    
//                      $('#add_name')[0].reset();  
//                 }  
//            });  
      });

        function fetch_data()  
      {  
            
            $.ajax({
                url:"<?php echo base_url(); ?>Dashboard/fetch2/?class=<?php echo $section; ?>",
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
 <script>
	$.validator.setDefaults({
		submitHandler: function() {
			    $.ajax({  
                url:"<?php echo base_url(); ?>Dashboard/subjectAdd",  
                method:"POST",  
                data:$('#create_subject').serialize(),  
                success:function(data)  
                {  
                  if(alert(data)){}
else    window.location.reload(); 
                     // alert(data);  
                     $('#create_subject')[0].reset();  
                }  
           });
		}
	});

	$().ready(function() {
		
		// validate signup form on keyup and submit
		$("#create_subject").validate({
			rules: {
				subject_name1: "required",
				lastname: "required",
				sub_name: {
					required: true,
					minlength: 3,
                         lettersonly: true
                         
				},
				password: {
					required: true,
					minlength: 5
				},
				confirm_password: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
				email: {
					required: true,
					email: true
				},
				topic: {
					required: "#newsletter:checked",
					minlength: 2
				},
				agree: "required"
			},
			messages: {
				subject_name1: "Please enter your Subject Name",
				lastname: "Please enter your lastname",
				sub_name: {
					required: "Please enter  subject name",
					minlength: "Subject Name must consist of at least 3 characters"
                        
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				confirm_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				},
				email: "Please enter a valid email address",
				agree: "Please accept our policy",
				topic: "Please select at least 2 topics"
			}
		});
        jQuery.validator.addMethod("lettersonly", function(value, element) 
          {
          return this.optional(element) || /^[a-z ]+$/i.test(value);
          }, "Letters and spaces only please");
		
	});
	</script>

