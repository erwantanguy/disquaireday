<section id="plus" class="row">
	<article id="passport" class="col-lg-4 col-md-4 col-sm-12">
		<?php $query = new WP_Query( array( 'page_id' => 25 ) );
			if ( have_posts() ) {
			while ($query->have_posts()) : $query->the_post();
		?>
		<a href="<?php the_permalink();?>"><h1><?php the_title() ?></h1>
		<h2><?php echo get_the_excerpt(); ?> </h2></a>
		<?php rewind_posts(); ?>
		<?php endwhile;   }?>
	</article>
	<article id="leplus" class="col-lg-8 col-md-8 col-sm-12">
		<?php $query = new WP_Query( array( 'page_id' => 27 ) );
			if ( have_posts() ) {
			while ($query->have_posts()) : $query->the_post();
		?>
		<a href="<?php the_permalink();?>">
			<?php the_post_thumbnail('full'); ?>
			<header>
				<h1><?php the_title() ?></h1>
				<h2><?php echo get_the_excerpt(); ?> </h2>
			</header>
		</a>
		<?php rewind_posts(); ?>
		<?php endwhile;   }?>
	</article>
</section>