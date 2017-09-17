<?php get_header(); ?>

<section class="row">
	<div class="picture col-lg-8">
		<img src="http://www.ticoet.fr/alafolie/wp-content/uploads/sites/14/2015/10/alafolie9.jpg" />
	</div>
	<aside class="col-lg-4">
		<?php
	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('home_sidebar') )
?>
	</aside>
</section>

<?php include 'encart.php'; ?>
		

			<section id="oeuvre" class="row">
				<?php
					$loop = new WP_Query( array( 'post_type' => 'oeuvre', 'posts_per_page' => 10 ) );
					//$loop = query_posts(array('post_type' => array('post', 'artiste')));
					while ( $loop->have_posts() ) : $loop->the_post();
					  $val = get_post_meta($post->ID,'_home_page',true);
					  if($val==oui){
					  	
					  	echo '<article class="col-lg-4 col-md-4 col-sm-4 col-xs-6">';
						echo '<div class="effet"><a href="';
						//the_permalink();
						echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
						echo '">';
						the_post_thumbnail( 'vignetteAccueil' );
						echo '</a></div>';
						/*echo '<h1><a href="';
						the_permalink();
						echo '">';
						the_title();
						echo '</a></h1>';*/
						echo '</article>';
					  }
					endwhile;
					
				?>
			</section>
			<section class="row">
				<?php if(get_option('facebook')){?>
				<aside class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
					<a href="<?php echo get_option('facebook'); ?>"><img src="<?php echo get_bloginfo('template_directory'); ?>/images/facebook.png" class="socialmedia" /></a>
				</aside>
				<?php }?>
				<?php if(get_option('twitter')){?>
				<aside class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
					<a href="<?php echo get_option('twitter'); ?>"><img src="<?php echo get_bloginfo('template_directory'); ?>/images/twitter.png" class="socialmedia" /></a>
				</aside>
				<?php }?>
				<?php if(get_option('instagram')){?>
				<aside class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
					<a href="<?php echo get_option('instagram'); ?>"><img src="<?php echo get_bloginfo('template_directory'); ?>/images/instagram.png" class="socialmedia" /></a>
				</aside>
				<?php }?>
				<?php if(get_option('pinterest')){?>
				<aside class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
					<a href="<?php echo get_option('pinterest'); ?>"><img src="<?php echo get_bloginfo('template_directory'); ?>/images/pinterest.png" class="socialmedia" /></a>
				</aside>
				<?php }?>
			</section>
			<!--<div class="row">
				<aside class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 hidden-xs hidden-sm">
					<?php get_sidebar(); ?>
				</aside>
			</div>-->

<?php get_footer(); ?>


<script>
	/*jQuery(document).ready(function(){
		jQuery('.carousel .carousel-inner .item:first-child').addClass('active');
		jQuery('.carousel .carousel-indicators li:first-child').addClass('active');
		//jQuery('.carousel-inner').css('display','none');
		jQuery('.carousel').carousel({
			interval:5000
		});
	});*/
	</script>	




