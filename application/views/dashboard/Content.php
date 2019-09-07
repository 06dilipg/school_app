  <style type="text/css">
    #div-id{display:none}
  </style>
 <h3 style="text-align: center;">Filling Contents For Class : <?php echo $class; ?></h3>
  <h2 style="text-align: center;">Subject <?php echo getSubjectName($subject)['subject_name']; ?></h2>
  <div class="container" style="background-color: silver;">
        <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>Dashboard/addContents"  id="add_Content"  name="add_Student" enctype="multipart/form-data">
          <div class="form-group">
             <input type="hidden" name="class" value="<?php echo $class;?>">
             <input type="hidden" name="subjectID" value="<?php echo  $subject;?>">
        
          
         </div>
         <div class="form-group">
           <label>Chapter Number</label>
          <input  type="text" name="Chapter_id" placeholder="Enter Chapter Number" class="form-control">
         </div>
         <div class="form-group">
           <label>Select Image</label>
          <input class="agile-ltext" type="file" name="file"  placeholder="Select Image" class="form-control">
         </div>
         <div class="form-group">
            <label>Chapter Description</label><br>
            <textarea class="agile-ltext" name="chapDesc" placeholder="Enter Chapter Description..." required="" class="form-control" rows="5" cols="50"></textarea>
         </div>
          <div class="form-group" id="testing">
              <label>Would like to add question for this Chapter ?</label> :&nbsp&nbsp&nbsp&nbsp
           <input type="radio" name="addQues" id="radio-id" value="Yes" >Yes &nbsp
           <input type="radio" name="addQues" value="No">No
         </div>
         <div id="div-id">
          <div class="form-group">
              <label>Should compulsory answer the question ?</label> : &nbsp&nbsp&nbsp
          <input  class="agile-ltext" type="radio" name="cmpAns" value="Yes">Yes &nbsp
           <input class="agile-ltext" type="radio" name="cmpAns" value="No">No
         </div>
          <div class="form-group">
            <label>Enter Question</label>
          <input  type="text" name="add_Qst" placeholder="Enter Question" class="form-control">

          <label>Option 1</label>
          <input  type="text" name="opt1" placeholder="Enter Option 1 " class="form-control">
          <label>Option 2</label>
          <input  type="text" name="opt2" placeholder="Enter Option 2"  class="form-control">
          <label>Option 3</label>
          <input  type="text" name="opt3" placeholder="Enter Option 3" class="form-control">
          <label>Option 4</label>
          <input  type="text" name="opt4" placeholder="Enter Option 4" class="form-control">
         </div>
         <div class="form-group">
          <label>Correct Answer</label>
          <input  type="text" name="correct_Ans" placeholder="Enter Correct Answer" class="form-control">
         </div>
         <div class="form-group">
           <label>Link</label>
          <input  type="text" name="add_Link" placeholder="Enter Link" class="form-control">
         </div>
      </div>

         <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10" style="text-align: center;">
        <!-- <button type="submit" class="btn btn-success" id="register">Submit</button> -->
        <button type="submit" name="add" id="pushContents" class="btn btn-success">Submit</button>
         <button type="reset" class="btn btn-danger">Canecl</button>
      </div>
     
    </div>

        </form>
        
      </div>

      <div class="container">    
            
    <!-- <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Sign Up</div>
                <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="/accounts/login/">Sign In</a></div>
            </div>  
            <div class="panel-body" >
               
                   
                            

                    <form  class="form-horizontal" method="post" >
                        <input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S' />
                        <div id="div_id_select" class="form-group required">
                            <label for="id_select"  class="control-label col-md-4  requiredField"> Select<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 "  style="margin-bottom: 10px">
                                <label class="radio-inline"><input type="radio" checked="checked" name="select" id="id_select_1" value="S"  style="margin-bottom: 10px">Knowledge Seeker</label>
                                <label class="radio-inline"> <input type="radio" name="select" id="id_select_2" value="P"  style="margin-bottom: 10px">Knowledge Provider </label>
                            </div>
                        </div> 
                        <div id="div_id_As" class="form-group required">
                            <label for="id_As"  class="control-label col-md-4  requiredField">As<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 "  style="margin-bottom: 10px">
                                <label class="radio-inline"> <input type="radio" name="As" id="id_As_1" value="I"  style="margin-bottom: 10px">Individual </label>
                                <label class="radio-inline"> <input type="radio" name="As" id="id_As_2" value="CI"  style="margin-bottom: 10px">Company/Institute </label>
                            </div>
                        </div>
                        <div id="div_id_username" class="form-group required">
                            <label for="id_username" class="control-label col-md-4  requiredField"> Username<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md  textinput textInput form-control" id="id_username" maxlength="30" name="username" placeholder="Choose your username" style="margin-bottom: 10px" type="text" />
                            </div>
                        </div>
                        <div id="div_id_email" class="form-group required">
                            <label for="id_email" class="control-label col-md-4  requiredField"> E-mail<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md emailinput form-control" id="id_email" name="email" placeholder="Your current email address" style="margin-bottom: 10px" type="email" />
                            </div>     
                        </div>
                        <div id="div_id_password1" class="form-group required">
                            <label for="id_password1" class="control-label col-md-4  requiredField">Password<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 "> 
                                <input class="input-md textinput textInput form-control" id="id_password1" name="password1" placeholder="Create a password" style="margin-bottom: 10px" type="password" />
                            </div>
                        </div>
                        <div id="div_id_password2" class="form-group required">
                             <label for="id_password2" class="control-label col-md-4  requiredField"> Re:password<span class="asteriskField">*</span> </label>
                             <div class="controls col-md-8 ">
                                <input class="input-md textinput textInput form-control" id="id_password2" name="password2" placeholder="Confirm your password" style="margin-bottom: 10px" type="password" />
                            </div>
                        </div>
                        <div id="div_id_name" class="form-group required"> 
                            <label for="id_name" class="control-label col-md-4  requiredField"> full name<span class="asteriskField">*</span> </label> 
                            <div class="controls col-md-8 "> 
                                <input class="input-md textinput textInput form-control" id="id_name" name="name" placeholder="Your Frist name and Last name" style="margin-bottom: 10px" type="text" />
                            </div>
                        </div>
                        <div id="div_id_gender" class="form-group required">
                            <label for="id_gender"  class="control-label col-md-4  requiredField"> Gender<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 "  style="margin-bottom: 10px">
                                 <label class="radio-inline"> <input type="radio" name="gender" id="id_gender_1" value="M"  style="margin-bottom: 10px">Male</label>
                                 <label class="radio-inline"> <input type="radio" name="gender" id="id_gender_2" value="F"  style="margin-bottom: 10px">Female </label>
                            </div>
                        </div>
                        <div id="div_id_company" class="form-group required"> 
                            <label for="id_company" class="control-label col-md-4  requiredField"> company name<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 "> 
                                 <input class="input-md textinput textInput form-control" id="id_company" name="company" placeholder="your company name" style="margin-bottom: 10px" type="text" />
                            </div>
                        </div> 
                        <div id="div_id_catagory" class="form-group required">
                            <label for="id_catagory" class="control-label col-md-4  requiredField"> catagory<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 "> 
                                 <input class="input-md textinput textInput form-control" id="id_catagory" name="catagory" placeholder="skills catagory" style="margin-bottom: 10px" type="text" />
                            </div>
                        </div> 
                        <div id="div_id_number" class="form-group required">
                             <label for="id_number" class="control-label col-md-4  requiredField"> contact number<span class="asteriskField">*</span> </label>
                             <div class="controls col-md-8 ">
                                 <input class="input-md textinput textInput form-control" id="id_number" name="number" placeholder="provide your number" style="margin-bottom: 10px" type="text" />
                            </div> 
                        </div> 
                        <div id="div_id_location" class="form-group required">
                            <label for="id_location" class="control-label col-md-4  requiredField"> Your Location<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md textinput textInput form-control" id="id_location" name="location" placeholder="Your Pincode and City" style="margin-bottom: 10px" type="text" />
                            </div> 
                        </div>
                        <div class="form-group">
                            <div class="controls col-md-offset-4 col-md-8 ">
                                <div id="div_id_terms" class="checkbox required">
                                    <label for="id_terms" class=" requiredField">
                                         <input class="input-ms checkboxinput" id="id_terms" name="terms" style="margin-bottom: 10px" type="checkbox" />
                                         Agree with the terms and conditions
                                    </label>
                                </div> 
                                    
                            </div>
                        </div> 
                        <div class="form-group"> 
                            <div class="aab controls col-md-4 "></div>
                            <div class="controls col-md-8 ">
                                <input type="submit" name="Signup" value="Signup" class="btn btn-primary btn btn-info" id="submit-id-signup" />
                                or <input type="button" name="Signup" value="Sign Up with Facebook" class="btn btn btn-primary" id="button-id-signup" />
                            </div>
                        </div> 
                            
                    </form>

               
            </div>
        </div>
    </div>  -->
</div>


      <script>  
  
       $(document).ready(function(){ 
          $("#testing").click(function(){
if ($("#radio-id").is(":checked")) {
         
        //show the hidden div
         $("#div-id").show("fade");
        
    } else {
        
       
        $("#div-id").hide("fade");
    }
});

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
