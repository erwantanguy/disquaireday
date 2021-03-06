<?php get_header(); ?>
<div class="row">
	<nav class="col-lg-9 text-right">
		<?php if ( function_exists('yoast_breadcrumb') ) 
{yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumb">','</p>');} ?>
	</nav>
</div>
<div class="row">
	<section id="col_gauche" class="col-lg-6 col-md-6 col-sm-6">
		<?php if ( has_post_thumbnail() ) : ?> 
			<picture id="picture">
				<?php 
					$srcfull = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
					$srclarge = wp_get_attachment_image_src( get_post_thumbnail_id(), 'tablette' );
					$srcmedium = wp_get_attachment_image_src( get_post_thumbnail_id(), 'mobile' );
					$img_id = get_post_thumbnail_id($post->ID);
					$alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true);
					if (!$alt_text){
						$alt_text= get_the_title();
					}
					//echo 'test : '.$alt_text; //echo $test[0]; 
				?>
			    <source srcset="<?php echo $srcmedium[0]; ?>" media="(max-width: 768px)">
			    <source srcset="<?php echo $srclarge[0]; ?>" media="(max-width: 1000px)">
			    <source srcset="<?php echo $srcfull[0]; ?>">
			    <img src="<?php echo $srclarge[0]; ?>" srcset="<?php echo $srcfull[0]; ?>" alt="<?php echo $alt_text;?>">
			</picture>
		<?php endif; ?>
	</section>
	<section id="col_droite" class="col-lg-6 col-md-6 col-sm-6">
			<?php //echo get_the_post_thumbnail( $post_id, 'full' ); ?>
			<?php //the_post_thumbnail('full'); ?>
		<article>
			<header>
				<h1><?php the_title();?></h1>
			</header>
			<main>
				<?php the_content(); ?>
				<footer>
					<?php the_tags(); ?>
			</footer>
			</main>
		</article>
	</section>
	
	<!--<aside class="col-lg-3 col-md-3">
		<?php get_sidebar(); ?>
	</aside>-->
</div>

<?php get_footer(); ?>