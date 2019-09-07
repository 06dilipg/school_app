
<!-- <?php
    $page_title = "Post Video";
   $page = 'video';
   include 'includes/header.php';
   include 'includes/aside.php';
   
   ?> -->
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Post Videos
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li class="header"><i class="glyphicon glyphicon-home"> <a href="home.php">Home</a></i></li>
        <li><a href="#">Post</a></li>
        <li class="active">Post Videos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Upload Videos</h3>
   
      <div id="message"></div>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            
                  <div class="box box-primary">
            <div class="box-header with-border">
              <!--  <h3 class="box-title">Quick Example</h3>-->
            </div>
            <!-- /.box-header -->
            <!-- form start -->
  <form  method="post"  id="video" enctype="multipart/form-data">
              <div class="box-body">
               
   <div class="form-group">
      <label for="name">Video Name:</label>
      <input type="text" name="name" id="name" class="form-control"  placeholder="Enter Video Name" required="required">
  </div>
   <div class="form-group">
     <label for="logo">Select Video To Upload:</label>
     <input  name="logo" type="file" class="form-control"  placeholder=""  required="required">
      
   </div>
   <div class="form-group">
      <label for="name">Video Description:</label>
      <textarea rows="5" cols="" id="textForJd" name="video_description" class="form-control" placeholder="Enter Video Description"  required="required"></textarea>
    </div>
     <div class="form-group">
      <label for="publish">Published On:</label>
      <input name="publish" type="date" class="form-control"  placeholder=""  required="required">
    </div>

              </div>  <!-- /.box-body -->
            

              <div class="box-footer">
                <button type="submit"  name="submit"  id="submit" class="btn btn-primary" onClick="validatePassword();">Post Video</button>
                <button type="reset" id="cancel" class="btn btn-danger">Cancel</button>
              </div>
            </form>
          </div>



        </div>
        <!-- /.box-body 
        <div class="box-footer">
          Footer
        </div>-->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <!-- <?php  include 'includes/footer.php';?> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.js"></script>
   <script>
	$.validator.setDefaults({
		submitHandler: function() {
			alert("submitted!");
		}
	});

	$().ready(function() {
		
		// validate signup form on keyup and submit
		$("#video").validate({
			rules: {
				name: "required",
				lastname: "required",
				username: {
					required: true,
					minlength: 2
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
				name: "Please enter your firstname",
				lastname: "Please enter your lastname",
				username: {
					required: "Please enter a username",
					minlength: "Your username must consist of at least 2 characters"
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

	

	
	});
	</script>


	
</body>
</html>
