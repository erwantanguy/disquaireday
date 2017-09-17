<?php /*
Template name: Template pour Medias uniquement
 */
?>
<?php get_header(); ?>
<?php
	$query = new WP_Query (
		array(
		'post_type' => 'disquaire',
		'order' => 'ASC',
		'cat' => '18,19,20,21,22,23,24,25',
		'orderby' => 'id',
		//'orderby' => 'menu_order',
		//'orderby' => 'name',
		//'posts_per_page' => -1,
		)
	);
?>
<section class="row">
	<nav id="localisation" class="col-lg-12 navbar navbar-default">
		<ul class="nav navbar-nav">
			<li>Accès direct</li>
	<?php
		$posts = query_posts(array('post_type'=>'page','post_parent'=> $post->ID ,'orderby'=>'menu_order','order'=>'ASC'));
		if ( have_posts() ) :  while ( have_posts() ) : the_post();	
	?>
			<li><a href="#<?php echo $post->post_name; ?>"><?php the_title(); ?></a><?php //print_r($post->post_name); ?></li> 	
	 <?php
		endwhile;
		endif;
	?>
		</ul>
	</nav>

</section>
<?php if ( have_posts() ) {  while ( have_posts() ) { the_post(); ?>
<section class="row" id="<?php echo $post->post_name; ?>">
	<header>
		<h1><?php the_title(); ?></h1>
	</header>
	<article class="col-lg-12 col-md-12 col-sm-12">
		<?php the_content(); ?>
	</article>
	<?php

	// check if the repeater field has rows of data
	if( have_rows('entree_presse') ):?>
	<div class="container">
	<main id="lapresse" class="row">		
	<?php 
	$presseID = 1;
	//var_dump(get_field(entree_presse));
		  while ( have_rows('entree_presse') ) : the_row(); ?>
		<article class="col-lg-2 col-md-2 col-sm-2">
			<a href="#presse<?php echo $presseID; ?>" class="fancybox">
				<header>
					<h2><?php the_sub_field('titre'); ?></h2><br>
					<h3><?php the_sub_field('sous_titre'); ?></h3><br>
					<div id="plus">
						<i id="plus1" class="fa fa-circle"></i>
						<i id="plus2" class="fa fa-plus"></i>
					</div>
				</header>
				<picture>
					<img src="<?php the_sub_field('logo'); ?>" alt="<?php the_sub_field('alt'); ?>">
				</picture>	
		</a>
		</article>
		<aside class="none">
			<div id="presse<?php echo $presseID; ?>" class="fancybox-inline">
				<h2><?php the_sub_field('titre'); ?></h2>
				<h3><?php the_sub_field('sous_titre'); ?></h3>
				<?php
				the_sub_field('texte');?>
				<?php if(get_sub_field('pdf')){?>
				<a href="<?php the_sub_field('pdf');?>">Lien à voir</a>
				<?php } ?>
			</div>
		</aside>
	<?php $presseID++; endwhile;?>
	</main>
	</div>
	<?php else :
		
		    // no rows found
		    //echo "rien";
		
		endif;
		
		?>
	<?php if(get_field('iframe')){?>
		<aside id="iframe" class="row">
			<div class="col-lg-offset-3 col-lg-6 col-md-12 col-sm-12">
				<div class="embed-responsive embed-responsive-4by3"><?php the_field('iframe'); ?></div>
			</div>
		</aside>
	<?php } ?>
	<?php

	// check if the repeater field has rows of data
	if( have_rows('video') ):?>
		<aside id="video" class="row">
	 	<?php while ( have_rows('video') ) : the_row();?>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="embed-responsive embed-responsive-16by9"><?php the_sub_field('iframe'); ?></div>
			</div>
	   <?php endwhile;?>
		</aside>
	<?php else :
	
	    // no rows found
	
	endif;
	
	?>
	<aside class="col-sm-12 text-right"><a href="#top" class="fa fa-arrow-up btn btn-rond"><span>top</span></a></aside>
</section>
<?php }?>

<?php } ?>
<?php get_footer(); ?>