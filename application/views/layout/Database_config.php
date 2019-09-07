<!DOCTYPE html>
<html lang="en">
<head>
    <title>Database Config | School App</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Database Configuration</h2>
    <form action="/action_page.php">
        <div class="form-group">
            <label for="email">Enter Localost</label>
            <input type="email" class="form-control" id="email" placeholder="Enter Localost" name="email">
        </div>
        <div class="form-group">
            <label for="pwd">Enter Username</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter Username" name="pwd">
        </div>
        <div class="form-group">
            <label for="email">Enter Password</label>
            <input type="email" class="form-control" id="email" placeholder="Enter Password" name="email">
        </div>
        <div class="form-group">
            <label for="pwd">Enter Database</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter Database" name="pwd">
        </div>
<!--        <div class="checkbox">-->
<!--            <label><input type="checkbox" name="remember"> Remember me</label>-->
<!--        </div>-->
        <button type="submit" class="btn btn-success">Submit</button>
        <button type="reset" class="btn btn-danger">Submit</button>
    </form>
</div>

</body>
</html>
