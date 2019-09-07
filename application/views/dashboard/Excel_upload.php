
    <div class="container">
    <br />
    <h3 align="center">Upload Excel Sheet For Class <?php echo $cls;?></h3>
    <form method="post" id="import_form" enctype="multipart/form-data">
        <div class="form-group" id="subject_details">
            
         <!-- <input type="radio" name="subject" value="english"/>English
         <input type="radio" name="subject" value="Kannada"/>Kannada -->
         </div>
   <!--      subject name <button value="2" id="eng" class="btn">English</button><button  value="3" class="btn">Kannada</button>
        <input type="text" name="sub_id"  value="-1"  id="subj" /> -->
        <input type="hidden" value="<?php echo $cls; ?>" name="classid" />
        <p><label>Select Excel File</label>
            <input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
        <br />
        <input type="submit" name="import" id="submit" value="Import" class="btn btn-info" />
    </form>

    <br />
    <div class="table-responsive" id="customer_data">

    </div>
</div>
<script>
    $(document).ready(function(){
   $("input[type='submit']").click(function(){
            var radioValue = $("input[name='subject']:checked").val();
            if(radioValue){
                alert("Selected value is - " + radioValue);
            }
            var value = $('input[type=radio][name=subject]:checked').attr('id')
            if (value) { alert("Selected value is - " + value);}
        });

      //   $('.btn').on('click',function(){
           
      // alert($(this).val());
      //  var valu = $(this).val();
      // alert($('#subj').val(valu));


      //   });

        load_data();
        load_data_option();

        function load_data()
        {
            $.ajax({
                url:"<?php echo base_url(); ?>Dashboard/fetch?class=<?php echo $cls; ?>",
                method:"POST",
                success:function(data){
                    $('#customer_data').html(data);
                }
            })
        }
        function load_data_option()
        {
            $.ajax({
                url:"<?php echo base_url(); ?>Dashboard/fetch1?class=<?php echo $cls; ?>",
                method:"POST",
                success:function(data){
                    $('#subject_details').html(data);
                }
            })
        }


        $('#import_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:"<?php echo base_url(); ?>Dashboard/import",
                method:"POST",
                data:new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                success:function(data){
                    $('#file').val('');
                    load_data();
                    alert(data);
                }
            })
        });

    });
</script>
