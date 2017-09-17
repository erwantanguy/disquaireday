<hr>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		
		<?php endwhile; else: ?>
		<p><?php _e('Désolé, on a rien.'); ?></p>
		<?php endif; ?>
<hr>
		<?php $args = array(
			'post_type' => 'tribe_events',
			'tax_query' => array(
				array(
					'taxonomy' => 'Nord Ouest',
					'field'    => 'slug',
					//'terms'    => 'bob',
				),
			),
		);
		$query = new WP_Query( $args );
		?>
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post()->$query; ?>
			<?php echo "<h1>".tribe_meta_event_category_name()."</h1>"; ?>
			<?php endwhile; ?>
		<?php endif; ?>
<hr>
<?php
		$categories = get_all_category_ids();
		//print_r($categories);
		foreach($categories as $i) {
		$momo = 0;
		//print_r($i);
		$articles = get_posts('category='.$i.'');
		foreach($articles as $post) {
		setup_postdata($post);
		
		if( $momo == 0 ) 
		{the_category(',');}
		$momo = 1;
	?>
	<h2><?php //print_r(get_the_category()); echo get_the_category(); ?> | <?php //echo get_the_category_by_ID( $i ); ?></h2>
 	<p><a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>"><?php the_title(); ?></a></p>
	<? } } ?>
	



<div class="col-lg-12">
<?php echo tribe_event_in_category(); ?>
<?php $args = array(
			'post_type' => 'tribe_events',
			'tax_query' => array(
				array(
					'taxonomy' => 'Nord Ouest',
					//'field'    => 'slug',
					//'terms'    => 'bob',
				),
			),
		);
		//print_r($args);echo '<hr';
		$query = new WP_Query( $args );
		//print_r($query);
		?>
	<h2>Nord Ouest</h2>	
		<?php if ( have_posts() ) : ?>
			<table class="table table-striped">
			<?php while ( have_posts() ) : the_post(); ?>
			<tr>
				<td><?php the_post_thumbnail('full'); ?></td>
				<td>
					<h3><?php the_title(); ?></h3>
					<?php the_content(); ?>
					<a href="<?php the_permalink(); ?>">En savoir +</a>
					<dl>
						<dt>Partagez sur :</dt>
						<dd>
							<a onclick="window.open(this.href,'twitter-share-dialog',
		      'width=626,height=436'); 
		    return false;" rel="nofollow" class="share-twitter share-icon" href="http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink(); ?> via @dday <?php //echo wp_get_attachment_image_src(get_post_thumbnail_id())[0]; ?>"
		     title="Cliquez pour partager sur Twitter"><i class="fa fa-twitter"></i></a>
						</dd>
						<dd>
							<a onclick="window.open(this.href,'twitter-share-dialog',
		      'width=626,height=436'); 
		    return false;" rel="nofollow" class="share-twitter share-icon" href="http://twitter.com/share?url=<?php the_permalink(); ?>&via=dday&text=<?php the_title(); ?> <?php //echo wp_get_attachment_image_src(get_post_thumbnail_id())[0]; ?>"
		    title="Cliquez pour partager sur Twitter"><i class="fa fa-twitter"></i></a>
						</dd>
						<dd>
							<a onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','facebook-share-dialog','width=626,height=436');return false;" href="#" title="Cliquez pour partager sur Facebook"><i class="fa fa-facebook"></i></a>
						</dd>
					</dl>
				</td>
				<td>
					<h4 class="author fn org"><?php echo tribe_get_venue() ?></h4>
					<dl>
						<dt>Adresse :</dt>
						<dd><?php echo tribe_get_full_address(); ?></dd>
					<?php 
					$phone   = tribe_get_phone();
					$website = tribe_get_venue_website_link();
					if ( ! empty( $phone ) ): ?>
						<dt> <?php esc_html_e( 'Phone:', 'the-events-calendar' ) ?> </dt>
						<dd class="tel"> <?php echo $phone; ?> </dd>
					<?php endif ?>
			
					<?php if ( ! empty( $website ) ): ?>
						<dt> <?php esc_html_e( 'Website:', 'the-events-calendar' ) ?> </dt>
						<dd class="url"><?php echo $website; ?></dd>
					<?php endif ?>
					</dl>
				</td>
			</tr>
			
			
			<?php endwhile; ?>
			</table>
		<?php endif; ?>
</div>