<?php
    if(!isset($this->session->userdata['logged_in'])) {
        redirect(site_url('/'), 'refresh');
    }
?>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <!--
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            --!>
            <a class="nav brand" href="<?php echo site_url('projects#/'); ?>">
                <img src="img/logo.png" height=60 width=60 />
            </a>

            <ul class="nav">
                <li class="active"><a href="#">Item List</a></li>
                <li><a href="<?php echo site_url('projects#/new'); ?>">Stock In/Out</a></li>
            </ul>

           <a href="user/logout" class="btn btn-info btn-small pull-right" style="margin-top:9px;">Logout</a>
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
