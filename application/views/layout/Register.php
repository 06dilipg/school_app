<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!-- Website Font style -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

    <title>EdShorts</title>
    <style>

        /*
         * General styles
         */

        body, html{
            height: 100%;
            background-repeat: no-repeat;
            background-color: #d3d3d3;
            font-family: 'Oxygen', sans-serif;
            font-size: 12px;
        }

        .main{
            margin-top: 0px;
        }

        h1.title {
            font-size: 50px;
            font-family: 'Passion One', cursive;
            font-weight: 400;
        }

        hr{
            width: 10%;
            color: #fff;
        }

        .form-group{
            margin-bottom: 15px;
        }

        label{
            margin-bottom: 14px;
        }

        input,
        input::-webkit-input-placeholder {
            font-size: 9px;
            padding-top: 3px;
        }

        .main-login{
            background-color: #fff;
            /* shadows and rounded borders */
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);

        }

        .main-center{
            margin-top: 30px;
            margin: 0 auto;
            max-width: 330px;
            padding: 40px 40px;

        }

        .login-button{
            margin-top: 3px;
        }

        .login-register{
            font-size: 8px;
            text-align: center;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="row main">
        <div class="panel-heading">
            <div class="panel-title text-center">
                 <h2>EdShorts</h2>
                 
                <h5 class="title"> Registration Form</h5>
                    <hr />
            </div>
        </div>
        <div class="main-login main-center">
            <form class="form-horizontal" method="post" action="<?php echo  site_url('Register/insert');?>">
                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">School Name</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-bank fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="school_name" id="Schoolname"  placeholder="Enter School Name"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Name</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="name" id="name"  placeholder="Your Name"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">School Address</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-bank fa" aria-hidden="true"></i></span>
                            <textarea name="school_address" id="" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="mobile" class="cols-sm-2 control-label required">Mobile</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-mobile aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="mobile_number" id="mobile"  placeholder="Your Mobile"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label">Email</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                            <input type="email" class="form-control" name="email" id="email"  placeholder="Your Email"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label">Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key fa" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="password" id="email"  placeholder="Your Password"/>
                        </div>
                    </div>
                </div>



<!--                <div class="form-group">-->
<!--                    <label for="nationality" class="cols-sm-2 control-label">Nationality</label>-->
<!--                    <div class="cols-sm-10">-->
<!--                        <div class="input-group">-->
<!--                            <span class="input-group-addon"><i class="fa fa-globe fa-lg" aria-hidden="true"></i></span>-->
<!--                            <select class="form-control" name="nationality" id="nationality"  placeholder="Please select your Nationality">-->
<!--                                <option>-select-</option>-->
<!--                                <option>India</option>-->
<!--                                <option>Singapore</option>-->
<!--                                <option>Malaysia</option>-->
<!--                                <option>USA</option>-->
<!--                            </select>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

<!--                <div class="form-group">-->
<!--                    <label for="country" class="cols-sm-2 control-label">Country of Residence</label>-->
<!--                    <div class="cols-sm-10">-->
<!--                        <div class="input-group">-->
<!--                            <span class="input-group-addon"><i class="fa fa-map-marker fa-lg" aria-hidden="true"></i></span>-->
<!--                            <select class="form-control" name="country" id="country"  placeholder="Please select your Country">-->
<!--                                <option>-select-</option>-->
<!--                                <option>India</option>-->
<!--                                <option>Singapore</option>-->
<!--                                <option>Malaysia</option>-->
<!--                                <option>USA</option>-->
<!--                            </select>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

                <div class="form-group ">
                    <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Submit</button>
                </div>
                <div class="form-group ">
                    <button type="button" class="btn btn-danger btn-lg btn-block login-button">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>


</body>
</html>