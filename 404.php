<?php get_header(); ?>
		
<?php //include 'slider.php'; ?>		
		
			
			
			
			<div id="slider" class="row">
				<?php
					//$myCat = 'Actualités';
							
					//$my_query = new WP_Query('category_name=' . $myCat . '&showposts=5' .'&post__in=get_option('sticcky_pots')');
					$my_query = new WP_Query(array(
						'post__in' => get_option('sticky_posts'),
						'posts_per_page' => '10',
					));
				?>
								<div data-ride="carousel" class="carousel slide col-lg-offset-2 col-lg-8" id="carousel-example-captions">
      <ol class="carousel-indicators">
      	<?php rewind_posts(); $toto=0; ?>
		<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<li class="" data-slide-to="<?php echo $toto;$toto++; ?>" data-target="#carousel-example-generic"></li>
		<?php endwhile; ?>
      </ol>
      <div role="listbox" class="carousel-inner">
        <?php rewind_posts(); ?>
		<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<div class="item">
				<?php 
				//real dimension of the slideshow image is 516w x 248h
					if ( function_exists( 'add_theme_support' ) && has_post_thumbnail()){
					the_post_thumbnail(array(800,9999), array('class' => 'feature-large'));
					}
				?>
				<div class="carousel-caption">
					<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<?php $my_excerpt = get_the_excerpt(); //print_r($my_excerpt);
						if ( '' != $my_excerpt ) {
					?>
					<p><a href="<?php the_permalink();?>"><?php echo get_the_excerpt(); ?></a></p>
					<?php }
					?>
				</div>
			</div>
		<?php endwhile; ?>
      </div>
      <a data-slide="prev" role="button" href="#carousel-example-captions" class="left carousel-control">
        <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a data-slide="next" role="button" href="#carousel-example-captions" class="right carousel-control">
        <span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    	
			</div>





			<div id="oeuvre" class="row">
				<section class="col-lg-6 col-md-6 col-sm-6">
					<header>
						<h1 class="entry-title"><?php echo 'Cette page n\'existe pas !'; ?></h1>
					</header>
					<div class="entry-content">
					<p><?php echo "Nous n'avons pas trouvé la page que vous cherchez. Essayez avec l'outil de recherche."; ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
				</section>
				<aside class="col-lg-6 col-md-6 col-sm-6">
					<?php get_sidebar('vide'); ?>
				</aside>
				<!--<aside class="col-lg-3 col-md-3 hidden-xs hidden-sm">
					<?php get_sidebar(); ?>
				</aside>-->
			</div>
			<section class="row">
				<?php if(get_option('facebook')){?>
				<aside class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
					<a href="<?php echo get_option('facebook'); ?>"><img src="/wp-content/themes/fabiengranet/images/facebook.png" /></a>
				</aside>
				<?php }?>
				<?php if(get_option('twitter')){?>
				<aside class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
					<a href="<?php echo get_option('twitter'); ?>"><img src="/wp-content/themes/fabiengranet/images/twitter.png" /></a>
				</aside>
				<?php }?>
				<?php if(get_option('instagram')){?>
				<aside class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
					<a href="<?php echo get_option('instagram'); ?>"><img src="/wp-content/themes/fabiengranet/images/instagram.png" /></a>
				</aside>
				<?php }?>
				<?php if(get_option('pinterest')){?>
				<aside class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
					<a href="<?php echo get_option('pinterest'); ?>"><img src="/wp-content/themes/fabiengranet/images/pinterest.png" /></a>
				</aside>
				<?php }?>
			</section>

<?php get_footer(); ?>


<script>
	jQuery(document).ready(function(){
		jQuery('.carousel .carousel-inner .item:first-child').addClass('active');
		jQuery('.carousel .carousel-indicators li:first-child').addClass('active');
		//jQuery('.carousel-inner').css('display','none');
		jQuery('.carousel').carousel({
			interval:5000
		});
	});
	</script>	




