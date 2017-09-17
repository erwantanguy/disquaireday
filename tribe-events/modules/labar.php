<?php

$filters = tribe_events_get_filters();
$views   = tribe_events_get_views();

$current_url = tribe_events_get_current_filter_url();
?>
<section class="row events">
	<nav id="localisation" class="col-lg-12 navbar navbar-default">
		<!--<ul class="nav navbar-nav"><?php echo tribe_get_event_taxonomy(); ?></ul>-->
		<ul class="nav navbar-nav">
			<li>Accès direct</li>
			<?php $terms = get_terms('tribe_events_cat', array('orderby'=> 'name',)); 
			foreach ($terms as $term) {
			      $wpq = array ('taxonomy'=>'tribe_events_cat','orderby'=> 'name','term'=>$term->slug);
			      $myquery = new WP_Query ($wpq);
			      $article_count = $myquery->post_count;
			      echo "<li><a href=\"#".$term->slug."\">";
			      echo $term->name;
			      echo "</a></li>";
			}
			?>
		</ul>
	</nav>
	<!--<nav id="themes" class="col-lg-12 navbar navbar-default">
		
		<ul class="nav navbar-nav">
			<li><a href="<?php echo get_site_url()."/events/"; ?>">Tous les événements</a></li>
			<?php $terms = get_terms('post_tag', array('orderby'=> 'name','post_type'=>'tribe_events')); 
			foreach ($terms as $term) {
			      $wpq = array ('taxonomy'=>'post_tag','orderby'=> 'name','term'=>$term->slug);
			      $myquery = new WP_Query ($wpq);
			      $article_count = $myquery->post_count;
			      echo "<li><a href=\""/*.get_tag_link($term->term_id)*/;
				  echo  get_site_url()."/events/";
				  echo "?tag=".$term->slug."&tag_name=".$term->name."\">";
			      echo $term->name;
			      echo "</a></li>";
			}
			?>
		</ul>
	</nav>--><!--<dl class="nav navbar-nav"><?php echo tribe_meta_event_tags(' ',' ','after','test2'); ?></dl>-->
</section>