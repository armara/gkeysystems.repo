<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>assets/common/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?=base_url()?>assets/common/bootstrap/css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url()?>assets/common/bootstrap/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url()?>assets/common/bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style=" background: url(<?=base_url();?>assets/common/images/white_leather.png) repeat 0 0">
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading" style="background-color: #3F51B5 ;">
                    <h3 class="panel-title" style="text-align: center; font-weight: bold; color: #fff   ">TO ENTER DATA</h3>
                </div>
                <div class="panel-body" style="background-color: #E0E0E0;">
                    <form method="POST" action="<?= base_url(); ?>admin/">
                        <div class="form-group">
                            <input type="username" class="form-control" placeholder="Username" name="username" autofocus required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" name="password"  required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="enter" class="btn btn-lg  btn-success btn-block">Log in</button>
                        </div>
                        <div class="text-center">
                            <a href="<?=base_url();?>" style="color: #3F51B5; font-style: italic; font-weight: bold; ">keymagen.am</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="<?=base_url()?>assets/common/bootstrap/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?=base_url()?>assets/common/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?=base_url()?>assets/common/bootstrap/js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?=base_url()?>assets/common/bootstrap/js/sb-admin-2.js"></script>

</body>

</html>
