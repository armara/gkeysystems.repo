<!doctype html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
		<meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="format-detection" content="telephone=no">
		<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?=base_url();?>/assets/frontend/img/ios.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_url();?>/assets/frontend/img/ios.png">
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?=base_url();?>/assets/frontend/img/ios.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=base_url();?>/assets/frontend/img/ios.png">
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?=base_url();?>/assets/frontend/img/ios.png">
		<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="<?=base_url();?>/assets/frontend/js/moment.js"></script> <!-- Modernizr -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="<?=base_url();?>/assets/frontend/css/owl.carousel.css"> <!-- CSS reset -->
		<link rel="stylesheet" href="<?=base_url();?>/assets/frontend/css/reset.css"> <!-- CSS reset -->
		<link rel="stylesheet" href="<?=base_url();?>/assets/frontend/css/style.css?<?php echo time(); ?>"> <!-- Resource style -->
        <link rel="stylesheet" href="<?=base_url();?>/assets/frontend/css/cash-flow.css?<?php echo time(); ?>">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
		<script src="<?=base_url();?>/assets/frontend/js/modernizr.js"></script> <!-- Modernizr -->
        <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css" rel="stylesheet">
        <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
        <link rel="stylesheet" href="<?=base_url();?>/assets/frontend/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css">
        <script src="<?=base_url();?>/assets/frontend/js/bootstrap-datetimepicker.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        
        

        
	  	<meta name="apple-mobile-web-app-title" content="KeyManage">
		<title>Gkeysystems.com</title>
	</head>
	<body>
		<header>
			<section id="logo"><a href="<?=base_url();?>"><img src="<?=base_url();?>/assets/frontend/img/cd-logo.png" alt="Logo"></a></section>
			<nav>
				<ul>
					<li><a href="#0">Գլխավոր</a></li>
					<li><a href="#0">Նորություններ</a></li>
					<li><a href="#0">Հ.Տ.Հ</a></li>
					<li><a href="#0">Կոնտակտներ</a></li>
				</ul>
			</nav>
			<nav class="main-nav">
				<ul>
					<li><a href="#0" id="lang-main"><span>Հայ</span><img src="<?=base_url();?>/assets/frontend/img/arrow-down.png"></a><a href="#0" class="lang-select">Eng</a></li>
					<?php $session = $this->session->userdata("user");
					 if(empty($session) || empty($session['email']) || empty($session['id']) ):?>
						<li><a class="cd-subnav-trigger cd-signin" href="#0">Մուտք</a></li>
					<?php else:?>
						<li><a class="cd-subnav-trigger cd-logout" href="<?=base_url();?>home/logout">Ելք</a></li>
					<?php endif;?>
				</ul>
			</nav>
			<a href="#0" class="cd-nav-trigger">Menu<span></span></a>
			<a href="#0" class="cd-signin mobile"><img src="<?=base_url();?>/assets/frontend/img/login-arrow.svg"></a>
		</header>
		
		<?php if(!empty($session) || !empty($session['email']) || !empty($session['id'])):?>
			<aside id="mobile-menu">
				<div class="accordion">
					<h1>Օպերատիվ տեղեկատվություն</h1>
					<div>
						<p id="dram-sharj">Դրամարկղի շարժ</p>
						<p id="nyut-arj">Նյութական արժեքներ</p>
						<p id="debit">Դեբիտորական պարտքեր</p>
						<p id="matakara-partq">Պարտքեր մատակարարներին</p>
						<p id="vach-verluc">Վաճառքի վերլուծություն</p>
					</div>
					<h1>Ֆինանսական հաշվետվություններ</h1>
					<div>
						Հաշվապահական հաշվեկշիռ<br>Եկամուտ-ծախսի հաշվետվություն<br>Content 2<br>Content 2<br>
					</div>
					<h1>Section 3</h1>
					<div>
						Content 3<br>Content 3<br>Content 3<br>Content 3<br>
					</div>
				</div>
			</aside>
		<?php endif;?>

			<section class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
				<div class="cd-user-modal-container"> <!-- this is the container wrapper -->
					<div id="cd-login"> <!-- log in form -->
						<form class="cd-form" action="<?=base_url();?>home/login" method="POST">
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

							<p class="fieldset">
								<input type="checkbox" id="remember-me" checked>
								<label for="remember-me">Հիշել գաղտնաբառը</label>
							</p>

							<p class="fieldset">
								<input class="full-width" type="button" id="login" value="Մուտք">
							</p>
						</form>
						<!-- <a href="#0" class="cd-close-form">Close</a> -->
					</div> <!-- cd-login -->
					<a href="#0" class="cd-close-form">Close</a>
				</div> <!-- cd-user-modal-container -->
			</section> <!-- cd-user-modal -->