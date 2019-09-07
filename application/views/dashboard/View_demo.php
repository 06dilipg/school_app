
     
           <div class="container">
           <h2 align="center">Profile of Class <?php echo $section;?></h2>  <br>
 
                 <div id="live_data">
                  
                 </div>

                 
          </div>
               

    
<script>  
  
       $(document).ready(function(){  

        

        fetch_data();
   
      

        function fetch_data()  
      {  
            
            $.ajax({
                url:"<?php echo base_url(); ?>Dashboard/Profile1/?class=<?php echo $section; ?>",
                method:"POST",
                success:function(data){
                    $('#live_data').html(data);
                }
            });
      } 



    

 });  
 </script>

