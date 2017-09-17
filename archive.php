<?php get_header(); ?>
<div class="row">
	<nav class="col-lg-9 text-right">
		<?php if ( function_exists('yoast_breadcrumb') ) 
{yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumb">','</p>');} ?>
	</nav>
</div>
<section class="row">
		<header id="title" class="col-lg-12">
			<?php
				if(is_category()){
					echo '<h1 class="page-title">'.single_cat_title(  '', false ).'</h1>';
				}
				else{
					the_archive_title( '<h1 class="page-title">', '</h1>' );
				}
				
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header>
</section>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<section class="row">
	<div id="liste">
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								<div class="col-lg-4 picture">
									<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
								</div>
								<div class="col-lg-8">
									<header class="entry-header article-header">
	
										<h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
										<p class="byline entry-meta vcard">
											<?php printf( __( 'Posté le ' ).' %1$s %2$s',
	                  							     /* the time the post was published */
	                  							     '<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>'
	                       								/* the author of the post */
	                       								,'<!--<span class="by">'.__('par').'</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>-->'
	                    							); ?>
										</p>
	
									</header>
	
									<section class="entry-content cf">
	
										<?php //the_post_thumbnail( 'medium' ); ?>
	
										<?php the_excerpt(); ?>
	
									</section>
	
									<footer class="article-footer">
	<a href="<?php the_permalink() ?>" class="tribe-events-read-more" rel="bookmark"><?php esc_html_e( 'Pour en savoir plus', 'tribe-events-calendar' ) ?> &raquo;</a>
									</footer>
								</div>
									
							</article>
	</div>
</section>
							<?php endwhile; ?>


							<?php else : ?>
<section class="row">
	<div id="nolist">
									<article id="post-not-found" class="hentry cf col-lg-6 col-md-6 col-sm-6">
										<header class="article-header">
											<h1><?php _e( 'Aucun article pour le moment', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Revenez dans quelques temps.', 'bonestheme' ); ?></p>
										</section>
										<!-- <footer class="article-footer">
												<p><?php _e( 'C\'est une page d\'erreur.', 'bonestheme' ); ?></p>
										</footer> -->
									</article>
									<aside class="col-lg-6 col-md-6 col-sm-6">
										<?php get_sidebar('vide'); ?>
									</aside>
	</div>
</section>
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
							<?php endif; ?>

	<!--<aside class="col-lg-3 col-md-3 hidden-xs hidden-sm">
		<?php get_sidebar(); ?>
	</aside>-->


<?php get_footer(); ?>