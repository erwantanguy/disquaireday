<?php get_header(); ?>

<?php include 'slider.php'; ?>

<?php include 'une.php'; ?>

<section id="infos" class="row">
	<article id="edito" class="col-lg-6 col-md-6 col-sm-12">
		<?php
			$myCat = 'Édito';
			$my_query = new WP_Query('category_name=' . $myCat . '&showposts=1');
			if ( have_posts() ) {
			while ($my_query->have_posts()) : $my_query->the_post();
		?>
		<h1><?php  echo get_the_category()[0]->name; ?></h1>
		<h2><?php echo get_the_excerpt(); ?> </h2>
		<a id="button" role="button" href="<?php the_permalink();?>" title="<?php the_title(); ?>" class="btn btn-default btn-sm pull-right">Lire +</a>
		<?php rewind_posts(); ?>
		<?php endwhile;   }?>
	</article>
	<article id="video" class="col-lg-6 col-md-6 col-sm-12">
		<div class="embed-responsive embed-responsive-16by9">
			<?php echo get_option('video'); ?>
		</div>
	</article>
</section>

<?php //get_template_part( 'plus' ); ?>

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