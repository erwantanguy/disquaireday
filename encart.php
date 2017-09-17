<section id="artiste" class="row">

<?php $my_query = new WP_Query('page_id=51');
	while ($my_query->have_posts()) : $my_query->the_post();
	$do_not_duplicate = $post->ID;?>
<header class="col-lg-6 col-sm-6">
	<h1><?php the_title(); ?></h1>
	<?php the_content(''); ?>
</header>
<div class="col-lg-6 col-sm-6" id="portrait">
	<div><?php the_post_thumbnail( 'full' ); ?></div>
</div>
	 
<?php endwhile; ?>

	
</section>