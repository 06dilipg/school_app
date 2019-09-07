
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
      <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
      <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
   <style>  
           body  
           {  
                margin:0;  
                padding:0;  
                background-color:#f1f1f1;  
           }  
           .box  
           {  
                width:900px;  
                padding:20px;  
                background-color:#fff;  
                border:1px solid #ccc;  
                border-radius:5px;  
                margin-top:10px;  
           }  
      </style>  
 
      <div class="container box">  
           <h3 align="center">Edit / Delete Content</h3><br />  
           <h3 style="text-align: center;">Editing Contents For Class : <?php echo $class; ?></h3>
    <h2 style="text-align: center;">Subject <?php echo getSubjectName($subject)['subject_name']; ?></h2>
           <div class="table-responsive">  
                <br />  
                <table id="user_data" class="table table-bordered table-striped">  
                     <thead>  
                          <tr>  
                               <th>Chapter Content</th>  
                               <th>Question</th>  
                               <th>Question Options</th>  
                               <th>Correct Answer</th>  
                               <th>Has Question</th> 
                               <th>Image</th> 
                               <th>Link</th>
                               <th>Answer Question</th>
                               <th>Edit</th>
                               <th>Delete</th>
                          </tr>  
                     </thead>  
                </table>  
           </div>  
      </div>  
 
 <script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
      var dataTable = $('#user_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
               // url:"<?php echo base_url() . 'Dashboard/fetch_content11'; ?>", 
               url:"<?php echo base_url(); ?>Dashboard/fetch_content11/?class=<?php echo $class; ?>&subject=<?php echo  $subject;?>",
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 3, 4],  
                     "orderable":false,  
                },  
           ],  
      });  
 });  
 </script>  