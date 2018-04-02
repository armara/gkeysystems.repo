<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" content="Unicom is a multi-purpose site">
	<meta name="keywords" content="Site Template, One Page Template, Responsive Template">
	<meta name="author" content="Affapress">
  <title>Genkeysystems.com</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:500,600,700,800|Roboto:100,300,300i,400,400i,500,700,900" rel="stylesheet">


  <!-- #self header links and scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!-- <script src="<?=base_url();?>/assets/frontend/js/moment.js"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
<!-- <link rel="stylesheet" href="<?=base_url();?>/assets/frontend/css/reset.css"> -->




<!-- <link rel="stylesheet" href="<?=base_url();?>/assets/frontend/css/cash-flow.css?<?php echo time(); ?>"> -->
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> -->
 <script src="<?=base_url();?>/assets/frontend/js/modernizr.js"></script> 
<!-- <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css" rel="stylesheet"> -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script> -->
<!-- <link rel="stylesheet" href="<?=base_url();?>/assets/frontend/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css"> -->
<!-- <script src="<?=base_url();?>/assets/frontend/js/bootstrap-datetimepicker.js"></script> -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<!-- #self header links and scripts end -->

    <!-- Stylesheets -->
  <link rel="stylesheet" href="/assets/unicom/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/unicom/css/ionicons.min.css">
  <link rel="stylesheet" href="/assets/unicom/css/jquery.scrollbar.css">
  <link rel="stylesheet" href="/assets/unicom/css/slick.css">
  <link rel="stylesheet" href="/assets/unicom/css/slick-theme.css">
  <link rel="stylesheet" href="/assets/unicom/css/jquery.fancybox.css">
  <link rel="stylesheet" href="/assets/unicom/css/animate.min.css">
  <link rel="stylesheet" href="/assets/unicom/css/style.css">

  <link rel="stylesheet" href="/assets/unicom/css/style_from_old.css">

      <!-- Custom Colors -->
    <link rel="stylesheet" href="/assets/unicom/css/colors/blue/color.css">
    <!--<link rel="stylesheet" href="css/colors/orange/color.css">-->
    <!--<link rel="stylesheet" href="css/colors/pink/color.css">-->
    <!--<link rel="stylesheet" href="css/colors/purple/color.css">-->
    <!--<link rel="stylesheet" href="css/colors/yellow/color.css">-->

  <noscript><link rel="stylesheet" href="/assets/unicom/css/no-js.css"></noscript>

  <!-- Favicons -->
<!-- <link rel="shortcut icon" href="/assets/unicom/images/favicon.ico"> -->
<!-- <link rel="apple-touch-icon" href="/assets/unicom/images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="/assets/unicom/images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="/assets/unicom/images/apple-touch-icon-114x114.png"> -->

<!-- Favicons New -->
<link rel="shortcut icon" href="/assets/unicom/images/gk_for_favicon_oIe_icon.ico">
<link rel="apple-touch-icon" sizes="72x72" href="/assets/unicom/images/gk_for_favicon-57x57.png">
<link rel="apple-touch-icon" sizes="72x72" href="/assets/unicom/images/gk_for_favicon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="/assets/unicom/images/gk_for_favicon-114x114.png">



<style>

    * { box-sizing: border-box; }


    .video-background {
      background: #000;
      position: fixed;
      top: 0; right: 0; bottom: 0; left: 0;
      z-index: -99;
    }
    .video-foreground,
    .video-background iframe {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
    }

    @media (min-aspect-ratio: 16/9) {
    .video-foreground { height: 300%; top: -100%; /* for iframe-toutube top:-100% */ }
    }
    @media (max-aspect-ratio: 16/9) {
    .video-foreground { width: 300%; left: -100%; /* for iframe-toutube top:-100% */ }
    }

    #clients {
      background-color: rgba(220, 220, 220, 0.43);
    }
    .affa-client-logo:after {
      background-color: rgba(255, 255, 255, 0.4);
    }
    .testimonials {
      background-color: rgba(255, 255, 255, 0.4);
    }
</style>

</head>
<body class="body-header-transparent">

<!-- #nav-mobile on open left-panel:les then 991px;-->
    <nav id="nav-mobile">
        <div class="scrollbar-inner">

            <button type="button" class="navbar-btn-close"><i class="ion ion-close"></i>Close</button>

            <div class="navbar-menu">
            	<ul class="nav">

                    <li class="menu-item current-menu-item">
                      <a href="#home">Գլխավոր</a>
                    </li>
                    <li class="menu-item ">
                      <a href="#about">Մեր մասին</a>
                    </li>

                    <li class="menu-item menu-item-has-children">
                      <a href="#solutions">Լուծումներ</a><!--span>+</span-->
                      <!--ul class="sub-menu">
                        <li class="menu-item"><a href="#">Հաշվապահական և հարկային հաշվառում</a></li>
                        <li class="menu-item"><a href="#">Բիզնեսի ավտոմատացում</a></li>
                        <li class="menu-item"><a href="#">Հեռահար ծրագրի ներդնում</a></li>
                      </ul-->
                    </li>

                    <li class="menu-item">
                      <a href="#interesting">Հետաքրքիր</a>
                    </li>

                    <li class="menu-item ">
                      <a href="#contact">Կապ մեզ հետ</a>
                    </li>

                    <!--<li class="menu-item">
                    	<a href="#"><i class="ion-log-in"></i> Ելք</a>
                    </li>-->

                </ul>
            </div>

        </div>
	</nav>
    <!-- #nav-mobile end -->

    <!-- #body-wrap -->
    <div id="body-wrap">

        <!-- #header -->
        <header id="header" class="header-transparent">

            <!-- #nav-mobile-top less then 991px-->
            <div id="nav-mobile-top">

                <!-- .container -->
                <div class="container-fluid">
                	<div class="navmenu">

                        <button type="button" class="navbar-btn-toggle"><i class="ion ion-navicon"></i></button>

                        <div class="navbar-logo">
                            <a href="/">
                              <img src="/assets/unicom/images/gk_white_blue_logo.png" alt="Logo">
                            </a> <!-- site logo -->
                            <!--a href="index-2.html"><img src="images/logo.png" alt="Logo"></a-->
                        </div>

                        <div class="navbar-secondary">
                        	<div class="navbar-btn">
                              <!--<a href="#" class="btn-log"><i class="ion-log-in"></i></a> -->
                              <?php $session = $this->session->userdata("user");
                                  if(empty($session) || empty($session['email']) || empty($session['id']) ):?>
                                    <a class="cd-subnav-trigger cd-signin btn-log" href="#" onclick="return false">
                                    <i class="ion-log-in"></i>Մուտք</a>
                              <?php else:?>
                                    <a class="cd-subnav-trigger cd-logout btn-log" href="<?=base_url();?>home/logout">
                                    <i class="ion-log-out"></i>Ելք</a>
                              <?php endif;?>



                              <!--<a href="cart.html" class="btn-cart"><i class="ion ion-bag"></i></a>
                                <a href="#" class="btn-search"><i class="ion ion-ios-search-strong"></i></a>-->
                            </div>
                        </div>

                    </div>
                </div>
                <!-- .container end -->

            </div>
            <!-- #nav-mobile-top end -->

            <!-- #navigation : great them 991px-->
            <nav id="navigation" data-armen-large-screen-navigation>
                <!-- .navbar -->
                <div class="navbar">

                    <!-- .container -->
                    <div class="container">
                        <div class="navbar-wrap">

                            <div class="navbar-logo"> <!-- site logo -->
                                <div class="navbar-logo-wrap">
                                    <a href="/">
                                      <!-- default logos -->
                                        <!--img src="/assets/unicom/images/logo-white-big.png" alt="Logo" class="logo-primary">
                                        <img src="/assets/unicom/images/logo.png" alt="Logo" class="logo-secondary"-->

                                        <img src="/assets/unicom/images/gk_white_trans_logo.png" alt="Logo" class="logo-primary">
                                        <img src="/assets/unicom/images/gk_white_blue_logo.png" alt="Logo" class="logo-secondary">
                                    </a>
                                </div>
                            </div>

                            <div class="navbar-menu">
                                <ul class="nav">
                                    <li class="menu-item current-menu-item">
                                      <a href="#home">Գլխավոր</a>
                                    </li>
                                    <li class="menu-item ">
                                      <a href="#about">Մեր մասին</a>
                                    </li>
                                    <li class="menu-item "> <!-- menu-item-has-children -->
                                    	<a href="#solutions">Լուծումներ</a>
                                        <!--div class="sub-menu">
                                          <ul>
                                            <li class="menu-item"><a href="#">Հաշվապահական և հարկային հաշվառում</a></li>
                                            <li class="menu-item"><a href="#">Բիզնեսի ավտոմատացում </a></li>
                                            <li class="menu-item"><a href="#">Հեռահար ծրագրի ներդնում</a></li>
                                          </ul>
                                        </div-->
                                    </li>

                                    <li class="menu-item">
                                      <a href="#interesting">Հետաքրքիր</a>
                                    </li>
                                    <li class="menu-item ">
                                      <a href="#contact">Կապ մեզ հետ</a>
                                    </li>
                                </ul>

                                <div class="navbar-secondary">
                                	<!--div class="navbar-btn">
                                      <a href="#" class="btn-log"><i class="ion-log-in"></i></a>
                                  </div-->
                                  <div class="navbar-btn">
                                  <?php $session = $this->session->userdata("user");
																		 if(empty($session) || empty($session['email']) || empty($session['id']) ):?>
																			<a class="cd-subnav-trigger cd-signin btn-log" href="#" onclick="return false">
																			<i class="ion-log-in"></i>Մուտք</a>
																	<?php else:?>
																				<a class="cd-subnav-trigger cd-logout btn-log" href="<?=base_url();?>home/logout">
																				<i class="ion-log-out"></i>Ելք</a>
																	<?php endif;?>
                                  </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- .container end -->

                </div>
                <!-- .navbar end -->

            </nav>
            <!-- #navigation end -->

            <!-- .header-content4 -->
            <div id="home" class="header-content4" data-parallax="scroll" data-speed="0.2" data-natural-width="1920" data-natural-height="1080" data-image-src="/assets/unicom/images/content/sliders/7.jpg">
            	<div class="header-content-overlay bg-dark-overlay50">

              <div class="video-background">
                <div class="video-foreground">
                  <iframe src="https://www.youtube.com/embed/W0LHTWG-UmQ?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&playlist=W0LHTWG-UmQ" frameborder="0" allowfullscreen></iframe>

                  <!-- <video data-natural-width="1920" data-natural-height="1080"  autoplay  muted>
                    <source src="/assets/unicom/video/111.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                  </video> -->
                </div>
              </div>

              <!-- .container -->
              <div class="container">
                  <div class="header-content-btn">
                    <!--class="fancybox fancybox.iframe"-->
                      <!--<a href="https://www.youtube.com/embed/BzMLA8YIgG0?autoplay=1" class="btn-play2 fancybox-media" title="Play Video"><i class="ion ion-ios-play"></i></a>-->

                      <!-- for youtube-embeded-iframe video :OK -->
                      <!--a class="fancybox fancybox.iframe btn-play2"  href="https://www.youtube.com/embed/BzMLA8YIgG0?autoplay=1" title="Play Video"><i class="ion ion-ios-play"></i></a-->

                      <!-- for staic-video -->
                      <!-- <a class="fancybox fancybox.iframe btn-play2"  href="/assets/unicom/video/111.mp4?autoplay=1" title="Play Video"><i class="ion ion-ios-play"></i></a> -->
                  </div>

                  <!-- Heder content for show over video -->
                  <div class="header-content-title">
                      <h1> Դարձրու քո ֆինանսական եվ կառավարչական համակարգը հասանելի ցանկացած պահի՝ աշխարհի ցանկացած կետում </h1>
                      <h4></h4>
                  </div>

              </div>
              <!-- .container end -->

              </div>
            </div>
            <!-- .header-content4 end -->

        </header>
        <!-- #header end -->

<!-- </body>
</html> -->



<!-- Modal HTML -->
		<section class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
				<div class="cd-user-modal-container"> <!-- this is the container wrapper -->
					<div id="cd-login"> <!-- log in form -->
						<form class="cd-form" action="<?=base_url();?>home/login" method="POST">
              <legend class="text-center"><h4>Մուտք ֆինանսական համակարգ</h4></legend>
							<span id="login_warning"></span>
							<p class="fieldset">
								<label class="image-replace cd-email" for="email">E-mail</label>
								<input class="full-width has-padding has-border" id="email" type="email" name="email" placeholder="Էլ. հասցե">
								<span class="cd-error-message" id="email_warning"></span>
							</p>

							<p class="fieldset">
								<label class="image-replace cd-password" for="password">Password</label>
								<input class="full-width has-padding has-border" id="password" type="password" name="password"  placeholder="Գաղտնաբառ">
								<span class="cd-error-message" id="password_warning"></span>
							</p>

							<p class="fieldset fildset-remember">
								<input type="checkbox" id="remember-me" checked>
								<label for="remember-me">Հիշել գաղտնաբառը</label>
							</p>

							<p class="fieldset">
								<input class=" btn btn-primary btn-block" type="button" id="login" value="Մուտք">
							</p>
						</form>
						<!-- <a href="#0" class="cd-close-form">Close</a>full-width -->
					</div> <!-- cd-login -->
					<a href="#" class="cd-close-form" onclick="return false">Close</a>
				</div> <!-- cd-user-modal-container -->
		</section> <!-- cd-user-modal -->
