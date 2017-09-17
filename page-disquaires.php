<?php /*
Template name: Template pour les disquaires uniquement
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
		<?php //if ( $query->have_posts() ) { while ($query->have_posts()) : $query->the_post(); ?>
		<?php $terms = get_terms('category', array('orderby'=> 'id','post_type' => 'disquaire','exclude' => array(), 'exclude_tree' => array(), 'include'=> array(18,19,20,21,22,23,24,25),'hide_empty' => false,)); //print_r($terms); ?>
		<ul class="nav navbar-nav">
			<li>Accès direct</li>
			<?php foreach ($terms as $term) { ?>
			<li><a href="#<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
			<?php }; //print_r($term); ?>
		</ul>
		<?php //endwhile; } ?>
	</nav>
</section>
<?php foreach ($terms as $term) { //print_r($term);echo $term->term_id;
$catid = $term->term_id; $cat_query = new WP_Query (array('post_type' => 'disquaire','order' => 'ASC','cat' => $catid,'orderby' => 'menu_order','posts_per_page' => -1,)); ?>
<section class="row" id="<?php echo $term->slug; ?>">
	<header>
		<h1><?php echo $term->name; ?></h1>
	</header>
	<?php ?>
	<?php if ( $cat_query->have_posts() ) { while ($cat_query->have_posts()) : $cat_query->the_post(); ?>
	<article class="col-lg-2 col-md-2 col-sm-2">
		<a href="<?php the_permalink(); ?>" class="fancybox">
			<header>
				<h2><?php the_title() ?></h2><br>
				<h3><?php echo get_the_excerpt(); ?></h3><br>
				<div id="plus">
					<i id="plus1" class="fa fa-circle"></i>
					<i id="plus2" class="fa fa-plus"></i>
				</div>
			</header>
			<picture>
				<?php the_post_thumbnail('full'); ?>
			</picture>
	</a>
	</article>
<?php endwhile; }else{echo "<article class=\"col-lg-12\"><h3>Il n'y a rien pour le moment</h3></article>";}?>
	<aside class="col-sm-12 text-right"><a href="#top" class="fa fa-arrow-up btn btn-rond"><span>top</span></a></aside>
</section>
<?php } ?>
<?php get_footer(); ?>