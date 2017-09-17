<!DOCTYPE HTML>
<html style="width:600px;">
	<head>
		<link rel="stylesheet" href="<?php bloginfo(‘template_directory’); ?>/css/bootstrap.min.css" />
	</head>
	<body>
		<section class="container" style="width:600px;">
			<div class="row">
			<?php if ( have_posts() ) { while (have_posts()) : the_post(); ?>
				<div class="col-md-4" style="min-height: 200px;" id="logoV<?php echo $post->ID; ?>">
				<?php the_post_thumbnail('full'); ?>
				</div>
				<div class="col-md-7" style="min-height: 200px;" id="contentV<?php echo $post->ID; ?>">
				<h1><?php the_title(); ?></h1>
				<h2><?php echo get_the_excerpt(); ?></h2>
				<?php 
					$adresse = get_post_meta($post->ID,'_adresse_disquaire',true);
					$map = get_post_meta($post->ID,'_url_disquaire',true);
					$map2 = get_post_meta($post->ID,'_url_disquaire2',true);
					if($adresse){?>
						<address>
							<?php echo $adresse; ?>
						</address>
					<?php }
					if($map2){?>
						<p><a style="color:rgb(211, 18, 25);" href="<?php echo $map2; ?>">Site web</a></p>
					<?php }
					if($map){?>
						<p><a style="color:rgb(211, 18, 25);" href="<?php echo $map; ?>">Lien Google Map</a></p>
					<?php }
				?>
				<?php the_content(); ?>
				</div>
			<?php endwhile; } ?>
			</div>
		</section>
	</body>
</html>