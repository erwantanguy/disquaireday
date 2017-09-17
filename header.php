<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>
			<?php $events = $_GET['events'];
				if(is_home() || is_front_page()) :
					bloginfo('name');
				else :
					if($events){echo 'Événements '.$events.' - Disquaire Day';}else{wp_title("", true);}
				endif;
			?>
		</title>
		<!--<?php if(is_home) :?>
		
		<?php endif; ?>-->
		<meta name="author" content="Matias">
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
		<!--<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); echo '?ver=' . filemtime( get_bloginfo( 'stylesheet_url' ) ); ?>" type="text/css" media="screen" />-->
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>
		<div class="container">
			<header id="top" class="row">
				<div id="logo" class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
					<a href="<?php bloginfo('url'); ?>"><?php 
				      	//$test = get_option("tl_logo_src");
						//print_r($test);
				      	if(!get_option("tl_logo_src")){bloginfo('name');} else{theme_logo();} 
				      ?></a>
				</div>
				<div id="day" class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-2 col-md-2 col-sm-2 col-xs-6">
		    		<div id="dday"><?php echo get_option('day'); ?> <span><?php echo get_option('year'); ?></span><?php //bloginfo( 'description' ); ?></div>
			    </div>
			    <div id="socialmedia" class="col-lg-5 col-md-5 col-sm-5 col-xs-12 socialbutton">
			    	<ul class="">
			    		<?php if(get_option('facebook')){?>
							<li><a href="<?php echo get_option('facebook'); ?>" title="Facebook <?php bloginfo('name'); ?>"><i class="fa fa-facebook"></i></a></li>
						<?php }?>
						<?php if(get_option('twitter')){?>
							<li><a href="<?php echo get_option('twitter'); ?>" title="Twitter <?php bloginfo('name'); ?>"><i class="fa fa-twitter"></i></a></li>
						<?php }?>
						<?php if(get_option('instagram')){?>
							<li><a href="<?php echo get_option('instagram'); ?>" title="Instagram <?php bloginfo('name'); ?>"><i class="fa fa-instagram"></i></a></li>
						<?php }?>
						<?php if(get_option('pinterest')){?>
							<li><a href="<?php echo get_option('pinterest'); ?>" title="Pinterest <?php bloginfo('name'); ?>"><i class="fa fa-pinterest-p"></i></a></li>
						<?php }?>
						<?php if(get_option('googleplus')){?>
							<li><a href="<?php echo get_option('googleplus'); ?>" title="googleplus <?php bloginfo('name'); ?>"><i class="fa fa-google-plus"></i></a></li>
						<?php }?>
						<?php if(get_option('youtube')){?>
							<li><a href="<?php echo get_option('youtube'); ?>" title="youtube <?php bloginfo('name'); ?>"><i class="fa fa-youtube"></i></a></li>
						<?php }?>
					</ul>
					</div>
			</header>
			<nav id="menu" class="navbar navbar-default row">
				<div class="container-fluid">
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				    </div>
		    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		    			<?php wp_nav_menu(array(
							'theme_location' => 'premier',
							'walker' => new Bootstrap_Walker_Nav_Menu(),
							'menu_class' => 'nav navbar-nav col-lg-12 col-md-12 col-sm-12'
						) );
						?>
					</div>
			    </nav>
		</div>
		<div id="contenu" class="container">