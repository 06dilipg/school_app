<div class="container">

	<h3 style="text-align: center;">For Class <?php echo $section;?></h3>
	<div class="row">
		<div class="col-md-6">
			  
			  <div id="live_data">
                
               </div>
          
		</div>		
	</div>
</div>


<!-- <div class="container">
	<div class="row">
		<div class="col-md-6">
			  <h1>dd</h1>
			  <div id="content_data">
                
               </div>
          
		</div>		
	</div>
</div> -->

<script type="text/javascript">
	$(document).ready(function(){  
	fetch_data();
	
	        function fetch_data()  
	      {  
	            
	            $.ajax({
	                url:"<?php echo base_url(); ?>Dashboard/fetch3/?class=<?php echo $section; ?>",
	                method:"POST",
	                success:function(data){
	                    $('#live_data').html(data);
	                }
	            });
	      }

	      // fetch_content();
	
	      //   function fetch_content()  
	      // {  
	            
	      //       $.ajax({
	      //           url:"<?php echo base_url(); ?>Dashboard/fetch_content/?class=<?php echo $section; ?>",
	      //           method:"POST",
	      //           success:function(data){
	      //               $('#content_data').html(data);
	      //           }
	      //       });
	      // }

	      $('#subjName').click(function(){
           alert($(this).attr("value"));
         
        });
 

      });
</script>