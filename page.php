<?php get_header(); ?>

<section class="row">
	<header>
		<h1><?php the_title();?></h1>
	</header>
	<article class="col-lg-12 col-md-12 col-sm-12">
		<?php the_content(); ?>
	</article>
</section>

<?php get_footer(); ?>