<div class="container">
           <h2 align="center">Student Details  of Class <?php echo $section;?></h2>  <br>

           
           <!-- <?php echo $studentid .$subjectid;
                 
           ?> -->


                 <div id="live_data">
                  
                 </div>

                 <div id="mcq">
                  
                  </div>

                 
          </div>


          <script>  
  
       $(document).ready(function(){  

        

        fetch_data();
   
      

        function fetch_data()  
      {  
            
            $.ajax({
                url:"<?php echo base_url(); ?>Dashboard/get_StudentDetails/?class=<?php echo $section; ?>&studentid=<?php echo $studentid; ?>&subjectid=<?php echo $subjectid;?>",
                method:"POST",
                success:function(data){
                   
                    $('#live_data').html(data);
                    if(data=='output1'){
                                alert("dd");
                    }else{
                        
                    }
                }
            });
            
      } 
    
        // mcq_fetch();

        // function mcq_fetch(){
        //     $.ajax({
        //         url:"<?php echo base_url(); ?>Dashboard/mcq_fetch/?class=<?php echo $section; ?>&studentid=<?php echo $studentid; ?>&subjectid=<?php echo $subjectid;?>",
        //         method:"POST",
        //         success:function(data){
        //             $('#mcq').html(data);
        //         }
        //     });
        // }


    

 });  
 </script>