

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo site_url('Dashboard/index/view');?>">EdShorts</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Class<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>Dashboard/index/Class?section=5">Class 5</a></li>
                    <li><a href="<?php echo base_url(); ?>Dashboard/index/Class?section=6">Class 6</a></li>
                    <li><a href="<?php echo base_url(); ?>Dashboard/index/Class?section=7">Class 7</a></li>
                    <li><a href="<?php echo base_url(); ?>Dashboard/index/Class?section=8">Class 8</a></li>
                    <li><a href="<?php echo base_url(); ?>Dashboard/index/Class?section=9">Class 9</a></li>
                    <li><a href="<?php echo base_url(); ?>Dashboard/index/Class?section=10">Class 10</a></li>
                </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Profile<span class="caret"></span></a>
            <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>Dashboard/index/Profile?section=5">Class 5</a></li>
                    <li><a href="<?php echo base_url(); ?>Dashboard/index/Profile?section=6">Class 6</a></li>
                    <li><a href="<?php echo base_url(); ?>Dashboard/index/Profile?section=7">Class 7</a></li>
                    <li><a href="<?php echo base_url(); ?>Dashboard/index/Profile?section=8">Class 8</a></li>
                    <li><a href="<?php echo base_url(); ?>Dashboard/index/Profile?section=9">Class 9</a></li>
                    <li><a href="<?php echo base_url(); ?>Dashboard/index/Profile?section=10">Class 10</a></li>
                </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">View / Edit<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>Dashboard/index/Edit_view?section=5">Class 5</a></li>
                    <li><a href="<?php echo base_url(); ?>Dashboard/index/Edit_view?section=6">Class 6</a></li>
                    <li><a href="<?php echo base_url(); ?>Dashboard/index/Edit_view?section=7">Class 7</a></li>
                    <li><a href="<?php echo base_url(); ?>Dashboard/index/Edit_view?section=8">Class 8</a></li>
                    <li><a href="<?php echo base_url(); ?>Dashboard/index/Edit_view?section=9">Class 9</a></li>
                    <li><a href="<?php echo base_url(); ?>Dashboard/index/Edit_view?section=10">Class 10</a></li>
                </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Student Register<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>Dashboard/index/StudentReg?section=5">Class 5</a></li>
                    <li><a href="<?php echo base_url(); ?>Dashboard/index/StudentReg?section=6">Class 6</a></li>
                    <li><a href="<?php echo base_url(); ?>Dashboard/index/StudentReg?section=7">Class 7</a></li>
                    <li><a href="<?php echo base_url(); ?>Dashboard/index/StudentReg?section=8">Class 8</a></li>
                    <li><a href="<?php echo base_url(); ?>Dashboard/index/StudentReg?section=9">Class 9</a></li>
                    <li><a href="<?php echo base_url(); ?>Dashboard/index/StudentReg?section=10">Class 10</a></li>
                </ul>
            </li>
             <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Upload Excel<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>Dashboard/index/Excel_upload?cls=5">Class 5</a></li>
                    <li><a href="<?php echo base_url(); ?>Dashboard/index/Excel_upload?cls=6">Class 6</a></li>
                    <li><a href="<?php echo base_url(); ?>Dashboard/index/Excel_upload?cls=7">Class 7</a></li>
                    <li><a href="<?php echo base_url(); ?>Dashboard/index/Excel_upload?cls=8">Class 8</a></li>
                    <li><a href="<?php echo base_url(); ?>Dashboard/index/Excel_upload?cls=9">Class 9</a></li>
                    <li><a href="<?php echo base_url(); ?>Dashboard/index/Excel_upload?cls=10">Class 10</a></li>
                </ul>
            </li>

            
            <!--            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>-->
            <!--                <ul class="dropdown-menu">-->
            <!--                    <li><a href="#">Page 1-1</a></li>-->
            <!--                    <li><a href="#">Page 1-2</a></li>-->
            <!--                    <li><a href="#">Page 1-3</a></li>-->
            <!--                </ul>-->
            <!--            </li>-->
            <!--            <li><a href="#">Page 2</a></li>-->
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span>Welecome <?php echo ucwords($this->session->userdata('name'));?></a></li>
            <li><a href="<?php echo site_url('User/logout');?>"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
    </div>
</nav>
