

<div class="container">
        <h2>Student Register For Class <?php echo $section; ?> </h2>
  <form class="form-horizontal"  id="add_Student"  name="add_Student">
   
    <input type="hidden" value="<?php echo $section; ?>" name="classid" id='section' /> 
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Student Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="rollno">Student Roll No:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="rollno" placeholder="Enter Roll No" name="rollno">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="dob">Date of Birth:</label>
      <div class="col-sm-10">          
        <input type="Date" class="form-control" id="dob" placeholder="Enter Date of Birth" name="dob">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="gender">Gender</label>
      <div class="col-sm-10">          
        <input type="radio"  value="male" name="gender">Male
         <input type="radio" value="female" name="gender">Female
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="rollno">Password:</label>
      <div class="col-sm-10">
        <input type="Password" class="form-control" id="pwd" placeholder="Enter Password" name="pwd">
      </div>
    </div>
  
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <!-- <button type="submit" class="btn btn-success" id="register">Submit</button> -->
        <button type="button" name="add" id="register" class="btn btn-success">Create Subject</button>
         <button type="reset" class="btn btn-danger">Canecl</button>
      </div>
     
    </div>
  </form>
</div>


<script type="text/javascript">
      $('#register').click(function(){ 
       // alert($('#subject').val());
                  // var i=1; 
                //  alert($('#section').val());
           $.ajax({  

                url:"<?php echo base_url(); ?>Dashboard/studentRegister?class=<?php echo $section; ?>",  
                method:"POST",  
                data:$('#add_Student').serialize(),  
                success:function(data)  
                {  
                  if(alert(data)){}
else    window.location.reload(); 
                     // alert(data);  
                     $('#add_Student')[0].reset();  
                }  
           });  
      });
</script>