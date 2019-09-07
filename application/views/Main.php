<html>
<head>
    <title>Upload Files</title>
</head>
<body>
    <?php echo form_open_multipart("/school_app/api/main");?>
    <table class="table">
        <tr>
            <td>Title</td>
            <td><?php echo form_input('title');?></td>
        </tr>
        <tr>
            <td>Image</td>
            <td><?php echo form_upload('pic');?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_submit('submit','save','class="btn btn-primary"');?></td>
        </tr>
    </table>
</body>
</html>
