
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Dark Admin</title>

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/common/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/common/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/backend/css/local.css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/backend/css/my.css" />

    <script type="text/javascript" src="<?=base_url()?>assets/backend/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/common/bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/common/datepicker/css/datepicker.css" />

    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
    <link id="gridcss" rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/dark-bootstrap/all.min.css" />

    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="http://www.prepbootstrap.com/Content/js/gridData.js"></script>
</head>
<body >
    <div id="wrapper">
          <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=base_url()?>admin/">Admin Panel</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul id="active" class="nav navbar-nav side-nav">
                    <li id="left_bar_users" ><a href="<?=base_url()?>admin/users"><i class="fa fa-users"></i> Users</a></li>
                    <li id="left_bar_texts" ><a href="<?=base_url()?>admin/texts"><i class="fa fa-font"></i> Texts</a></li>
                    <li id="left_bar_slider" ><a href="<?=base_url()?>admin/slider"><i class="fa fa-tasks"></i> Slider</a></li>
                </ul>
                 <ul class="nav navbar-nav navbar-right navbar-user">
                  
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Administrator<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="<?=base_url();?>admin/login/logout"><i class="fa fa-power-off"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <li class="divider-vertical"></li>

                </ul>
            </div>


        </nav>