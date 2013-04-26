<?php
    if(!isset($this->session->userdata['logged_in'])) {
        redirect(site_url('/'), 'refresh');
    }
?>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="nav brand" href="<?php echo site_url('projects#/'); ?>">
                <img src="img/logo.png" height=60 width=60 />
            </a>

            <ul class="nav">
                <li class="active"><a href="#/">Item List</a></li>
                <li><a href="<?php echo site_url('projects#/new'); ?>">New Item</a></li>
                <li><a href="<?php echo site_url('projects#/inout/add'); ?>">Stock In/Out</a></li>
            </ul>

            <div class="btn-group pull-right" style="margin-top:9px;">
                <a class="btn btn-info btn-small dropdown-toggle" data-toggle="dropdown" href="#">
                    Hi, <?=$this->session->userdata['user_name']?>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <!-- dropdown menu links -->
                    <li><a href="user/logout">Logout</a></li>
                </ul>
            </div>

        </div>
    </div>
</div>

<div class="container">
    <div ng-app="project">
        <!-- div class="page-header">
            <h1>Projects</h1>
        </div-->

        <div ng-view></div>
    </div>
</div> <!-- /container -->
