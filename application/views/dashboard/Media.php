<form id="myform">
    <input type="text" name="field1" />
    <input type="text" name="field2" />
    <input type="submit" />
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.js"></script>
<script>

$(document).ready(function () {

$('#myform').validate({ // initialize the plugin
    rules: {
        field1: {
            required: true,
            email: true
        },
        field2: {
            required: true,
            minlength: 5
        }
    }
});

});
</script>