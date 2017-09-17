<?php
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-background' );
add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}
//set_post_thumbnail_size( 50, 50, true );
set_post_thumbnail_size( 50, 50, array( 'center', 'center')  );
//wp_nav_menu( array( 'menu' => 'principal' ) );
add_theme_support( 'menus' );


/**********SHORTCODES *********************/

add_shortcode('lang_en', 'votre_fonction');
function votre_fonction($param) {
  extract(
    shortcode_atts(
      array(
        'title' => '<img class="alignnone size-full wp-image-381 lang" src="http://www.ticoet.fr/alafolie/wp-content/themes/fabiengranet/images/lang_en.png" width="18" height="18" />'
      ),
      $param
    )
   );
   return $title;
 };


add_action('init', 'mylink_button');
function mylink_button() {
 
   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
     return;
   }
 
   if ( get_user_option('rich_editing') == 'true' ) {
     add_filter( 'mce_external_plugins', 'add_plugin' );
     add_filter( 'mce_buttons', 'register_button' );
   }
 
}
function register_button( $buttons ) {
 array_push( $buttons, "|", "englishversion" );
 return $buttons;
}
function add_plugin( $plugin_array ) {
   $plugin_array['englishversion'] = get_bloginfo( 'template_url' ) . '/js/mybuttons.js';
   return $plugin_array;
}

/********** THEME ****************/

function menu_options(){
	add_submenu_page("themes.php", "Options du thème", "Options du thème", 9, "options", "custom_theme_options");
}
function custom_theme_options(){
	//echo "<h2>Options du thème</h2>test et tout le reste";
	require_once ( get_template_directory() . '/theme-options.php' );
};
add_action("admin_menu", "menu_options");


/* MENU */


register_nav_menus(array(
	'premier' => 'Menu principale',
	'deuxieme' => 'Petit menu optionnel',
	'troisieme' => 'Menu pied de page',
	'disquaires' => 'Menu pour les disquaires quand il n\'y a pas d\'événements'
));


$args = array(
	'flex-width'    => true,
	'width'         => 1900,
	'flex-height'    => true,
	'height'        => 284,
	'default-image' => 'http://www.ticoet.fr/drmgalerie/wp-content/uploads/sites/12/2015/09/bandeau_defaut.png', //get_template_directory_uri() . 
	'uploads'       => true,
);
add_theme_support( 'custom-header', $args );


add_image_size( 'events', 300, 120, array( 'left', 'top' ) );
add_image_size( 'event', 300,120 );
add_image_size('mobile',768);
add_image_size('tablette',1000);
add_image_size('logo',150);
//add_image_size('vignette',225,225,array( 'left', 'top' ));
add_image_size('vignette',225,225,array( 'center', 'center' ));
add_image_size('vignetteAccueil',410,410,array( 'center', 'center' ));

class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {

   function start_lvl(&$output, $depth = 0, $args = array()) {
      $output .= "\n<ul class=\"dropdown-menu\">\n";
   }

   function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
       $element_html = '';
       parent::start_el($element_html, $item, $depth, $args);
       if ( $item->is_dropdown && $depth === 0 ) {
           $element_html = str_replace( '<a', '<a class="dropdown-toggle" data-toggle="dropdown"', $element_html );
           $element_html = str_replace( '</a>', ' <b class="caret"></b></a>', $element_html );
       }
       $output .= $element_html;
    }

    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
        if ( $element->current ) {
            $element->classes[] = 'active';
        }
        $element->is_dropdown = !empty( $children_elements[$element->ID] );
        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}


/**************** WIDGETS *************/

add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => 'ma_sidebar',
		'before_widget' => '<div class="widget_sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
	register_sidebar( array(
        'name' => 'home_sidebar1',
        //'title' => 'Sidebar de l\'accueil',
		'before_widget' => '<div class="widget_sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
	register_sidebar( array(
        'name' => 'home_sidebar2',
        //'title' => 'Sidebar de l\'accueil',
		'before_widget' => '<div class="widget_sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
	register_sidebar( array(
        'name' => 'home_sidebar3',
        //'title' => 'Sidebar de l\'accueil',
		'before_widget' => '<div class="widget_sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
	register_sidebar(array(
        'name' => 'barre_gauche_footer_disquaire',
		'before_widget' => '<div class="widget_sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
      ));
	  register_sidebar(array(
        'name' => 'barre_droite_footer_disquaire',
		'before_widget' => '<div class="widget_sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
      ));
	  register_sidebar(array(
        'name' => 'menu_disquaire_event',
		'before_widget' => '<div class="widget_sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
      ));
}

/************************* DISQUAIRES ************************/


add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'disquaire',
    array(
      'labels' => array(
        'name' => __( 'Disquaires' ),
        'singular_name' => __( 'Disquaire' ),
        'all_items' => 'Tous les disquaires',
      'add_new_item' => 'Ajouter un disquaire',
      'edit_item' => 'Éditer le disquaire',
      'new_item' => 'Nouveau disquaire',
      'view_item' => 'Voir le disquaire',
      'search_items' => 'Rechercher parmi les disquaires',
      'not_found' => 'Pas de disquaire trouvé',
      'not_found_in_trash'=> 'Pas de disquaire dans la corbeille'
      ),
      'public' => true,
      
      /*'publicly_queryable' => true,
	  'show_ui'            => true,
	  'show_in_menu'       => true,
	  'query_var'          => true,
      'show_in_nav_menus' => true,*/
	  
      /*'show_in_admin_bar' => true,*/
      'supports'=>array('title','editor','thumbnail','excerpt','revisions'),
	  'taxonomies' => array( 'category', 'post_tag' ),
	  'query_var' => true,
      'rewrite' => true,
      'capability_type' => 'post',
    )
  );
}

/********************** Vinyles ***********************/

add_action( 'init', 'create_post_type2' );
function create_post_type2() {
  register_post_type( 'vinyle',
    array(
      'labels' => array(
        'name' => __( 'Vinyles' ),
        'singular_name' => __( 'Vinyles' ),
        'all_items' => 'Tous les vinyles',
      'add_new_item' => 'Ajouter un vinyle',
      'edit_item' => 'Éditer le vinyle',
      'new_item' => 'Nouveau vinyle',
      'view_item' => 'Voir le vinyle',
      'search_items' => 'Rechercher parmi les vinyles',
      'not_found' => 'Pas de vinyle trouvé',
      'not_found_in_trash'=> 'Pas de vinyle dans la corbeille'
      ),
      'public' => true,
      
      /*'publicly_queryable' => true,
	  'show_ui'            => true,
	  'show_in_menu'       => true,
	  'query_var'          => true,
      'show_in_nav_menus' => true,*/
	  
      /*'show_in_admin_bar' => true,*/
      'supports'=>array('title','editor','thumbnail','excerpt','revisions'),
	  'taxonomies' => array( 'category', 'post_tag' ),
	  'query_var' => true,
      'rewrite' => true,
      'capability_type' => 'post',
    )
  );
}

/*********************** Partenaires ***********************/

add_action( 'init', 'create_post_type3' );
function create_post_type3() {
  register_post_type( 'partenaire',
    array(
      'labels' => array(
        'name' => __( 'Partenaires' ),
        'singular_name' => __( 'Partenaires' ),
        'all_items' => 'Tous les partenaires',
      'add_new_item' => 'Ajouter un partenaire',
      'edit_item' => 'Éditer le partenaire',
      'new_item' => 'Nouveau partenaire',
      'view_item' => 'Voir le partenaire',
      'search_items' => 'Rechercher parmi les partenaires',
      'not_found' => 'Pas de partenaire trouvé',
      'not_found_in_trash'=> 'Pas de partenaire dans la corbeille'
      ),
      'public' => true,
      
      /*'publicly_queryable' => true,
	  'show_ui'            => true,
	  'show_in_menu'       => true,
	  'query_var'          => true,
      'show_in_nav_menus' => true,*/
	  
      /*'show_in_admin_bar' => true,*/
      'supports'=>array('title','editor','thumbnail','excerpt','revisions'),
	  'taxonomies' => array( 'category', 'post_tag' ),
	  'query_var' => true,
      'rewrite' => true,
      'capability_type' => 'post',
    )
  );
}

/****** METABOXES *********/


add_action('add_meta_boxes','init_metabox');
function init_metabox(){
  add_meta_box('home_page', 'Accueil', 'home_page', 'disquaire', 'side');
  add_meta_box('url_disquaire', 'Url Google Map', 'url_disquaire', 'disquaire', 'normal');
  add_meta_box('url_disquaire2', 'Url site web', 'url_disquaire2', 'disquaire', 'normal');
  add_meta_box('adresse_disquaire', 'Adresse du lieu', 'adresse_disquaire', 'disquaire', 'normal');
}

function home_page($post){
  $dispo = get_post_meta($post->ID,'_home_page',true);
  echo '<label for="home_page_meta">Mise en avant de l\'oeuvre sur la page d\'accueil :</label>';
  echo '<select name="home_page">';
  echo '<option ' . selected( 'oui', $dispo, false ) . ' value="oui">Oui</option>';
  echo '<option ' . selected( 'non', $dispo, false ) . ' value="non">Non</option>';
  echo '</select>';
}
function url_disquaire($post){
	$map = get_post_meta($post->ID,'_url_disquaire',true);
	echo '<label for="url_disquaire_meta">Lien google map du lieu</label>';
  	echo '<br><input id="url_disquaire" type="url" name="url_disquaire" value="'.$map.'" />';
}
function url_disquaire2($post){
	$map2 = get_post_meta($post->ID,'_url_disquaire2',true);
	echo '<label for="url_disquaire2_meta">Lien site web du lieu</label>';
  	echo '<br><input id="url_disquaire2" type="url" name="url_disquaire2" value="'.$map2.'" />';
}
function adresse_disquaire($post){
	$adresse = get_post_meta($post->ID,'_adresse_disquaire',true);
	echo '<label for="adresse_disquaire_meta">Adresse du lieu</label>';
  	echo '<br><textarea id="adresse_disquaire" name="adresse_disquaire" rows="8" cols="100">'.$adresse.'</textarea>';
	//echo '<hr>';
	//print_r(get_post_meta($post->ID,'_home_page',true));
	//echo '<br>';
	//print_r(get_post_meta($post->ID,'_url_disquaire',true));
	//echo '<br>';
	//print_r(get_post_meta($post->ID,'_adresse_disquaire',true));
}

add_action('save_post','save_metabox');
function save_metabox($post_id){
	if(isset($_POST['home_page'])){
	  update_post_meta($post_id, '_home_page', $_POST['home_page']);
	}
	if(isset($_POST['url_disquaire'])){
	  update_post_meta($post_id, '_url_disquaire', $_POST['url_disquaire']);
	}
	if(isset($_POST['url_disquaire2'])){
	  update_post_meta($post_id, '_url_disquaire2', $_POST['url_disquaire2']);
	}
	if(isset($_POST['adresse_disquaire'])){
	  //update_post_meta($post_id, '_adresse_disquaire', esc_url($_POST['adresse_disquaire']));
	  update_post_meta($post_id, '_adresse_disquaire', $_POST['adresse_disquaire']);
	}
}


/************************ SHORTCODES ***************************/

function span_shortcode( $atts, $content = null ) {
	$a = shortcode_atts( array(
		'class' => '',
	), $atts );
	return '<span class="' . esc_attr($a['class']) . '">' . do_shortcode($content) . '</span>';
}
add_shortcode( 'span', 'span_shortcode' );


/**************************** JS *****************************/
    add_action('init', 'gkp_insert_js_in_footer');
    function gkp_insert_js_in_footer() {
     
    // On verifie si on est pas dans l'admin
    if( !is_admin() ) :
     
        // On annule jQuery installer par WordPress (version 1.4.4
        wp_deregister_script( 'jquery' );
     
        // On declare un nouveau jQuery dernière version grace au CDN de Google
        wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js','',false,true);
        wp_enqueue_script( 'jquery' );
     
        // On insere le fichier de ses propres fonctions javascript
        wp_register_script('functions', get_bloginfo( 'template_directory' ).'/js/bootstrap.min.js','',false,true);
		wp_enqueue_script( 'functions' );
		wp_register_script('docs', get_bloginfo( 'template_directory' ).'/js/docs.min.js','',false,true);
		wp_enqueue_script( 'docs' );
		wp_register_script('collapse', get_bloginfo( 'template_directory' ).'/js/collapse.js','',false,true);
		wp_enqueue_script( 'collapse' );
		wp_register_script('carousel', get_bloginfo( 'template_directory' ).'/js/carousel.js','',false,true);
        wp_enqueue_script( 'carousel' );
		wp_register_script('tab', get_bloginfo( 'template_directory' ).'/js/tab.js','',false,true);
        wp_enqueue_script( 'tab' );
		/*wp_register_script('masonry', get_bloginfo( 'template_directory' ).'/js/masonry.js','',false,true);
        wp_enqueue_script( 'masonry' );
		wp_register_script('myMasonry', get_bloginfo( 'template_directory' ).'/js/my-masonry.js','',false,true);
        wp_enqueue_script( 'myMasonry' );*/
     
    endif;
    }



/********************* ical **************/

// Changes the text labels for Google Calendar and iCal buttons on a single event page
remove_action('tribe_events_single_event_after_the_content', array('Tribe__Events__iCal', 'single_event_links'));
add_action('tribe_events_single_event_after_the_content', 'customized_tribe_single_event_links');
  
function customized_tribe_single_event_links()    {
    if (is_single() && post_password_required()) {
        return;
    }
  
    echo '<div class="tribe-events-cal-links">';
    echo '<a class="btn btn-default btn-xs" href="' . tribe_get_gcal_link() . '" title="' . __( 'Add to Google Calendar', 'tribe-events-calendar-pro' ) . '">Google Agenda</a>';
    echo ' <a class="btn btn-default btn-xs" href="' . tribe_get_single_ical_link() . '">Exporter vers iCal</a>';
    echo '</div><!-- .tribe-events-cal-links -->';
}

//+ Google Agenda+ Exporter vers iCal

add_action('event_calendar', 'customized_tribe_single_event_links2');
  
function customized_tribe_single_event_links2()    {
    if (is_single() && post_password_required()) {
        return;
    }
  
    echo '<ul class="nav navbar-nav">';
    echo '<li><a class="share" href="' . tribe_get_gcal_link() . '" title="' . __( 'Ajouter à Google Calendar', 'tribe-events-calendar-pro' ) . '"><i class="fa fa-calendar-plus-o"></i></a></li>';
    echo '<li><a class="share" href="' . tribe_get_single_ical_link() . '" title="Exporter vers iCal"><i class="fa fa-calendar"></i></a></li>';
    echo '</ul>';
}

/************* ROLES ****************/

$roleObject = get_role( 'editor' );
if (!$roleObject->has_cap( 'edit_theme_options' ) ) {
    $roleObject->add_cap( 'edit_theme_options' );
}
 
function hide_menu() {
    // Si le role de l'utilisatieur ne lui permet pas d'ajouter des comptes (autrement dit si il n'est pas admin)
    if(!current_user_can('add_users')) {
      remove_submenu_page( 'themes.php', 'themes.php' ); // hide the theme selection submenu
      //remove_submenu_page( 'themes.php', 'widgets.php' ); // hide the widgets submenu
      remove_submenu_page( 'themes.php', 'theme-editor.php' ); // hide the editor menu
 
      // Le code suisant c'est juste poure retirer le sous menu "Personnaliser"
      $customize_url_arr = array();
      $customize_url_arr[] = 'customize.php'; // 3.x
      $customize_url = add_query_arg( 'return', urlencode( wp_unslash( $_SERVER['REQUEST_URI'] ) ), 'customize.php' );
      $customize_url_arr[] = $customize_url; // 4.0 & 4.1
      if ( current_theme_supports( 'custom-header' ) && current_user_can( 'customize') ) {
          $customize_url_arr[] = add_query_arg( 'autofocus[control]', 'header_image', $customize_url ); // 4.1
          $customize_url_arr[] = 'custom-header'; // 4.0
      }
      if ( current_theme_supports( 'custom-background' ) && current_user_can( 'customize') ) {
          $customize_url_arr[] = add_query_arg( 'autofocus[control]', 'background_image', $customize_url ); // 4.1
          $customize_url_arr[] = 'custom-background'; // 4.0
      }
      foreach ( $customize_url_arr as $customize_url ) {
          remove_submenu_page( 'themes.php', $customize_url );
      }
 
    }
 
}
add_action('admin_head', 'hide_menu');

/************* bar admin ****************/
function my_admin_bar_link() {
	global $wp_admin_bar;
	if ( !is_super_admin() || !is_admin_bar_showing() )
		return;
	$wp_admin_bar->add_menu( array(
	'id' => 'disquaires',
	'parent' => 'site-name',
	'title' => __( 'Disquaires'),
	'href' => admin_url( '/edit.php?post_type=disquaire' )
	) );
}
add_action('admin_bar_menu', 'my_admin_bar_link', 1000);
function vinyles() {
	global $wp_admin_bar;
	if ( !is_super_admin() || !is_admin_bar_showing() )
		return;
	$wp_admin_bar->add_menu( array(
	'id' => 'vinyles',
	'parent' => 'site-name',
	'title' => __( 'Vinyles'),
	'href' => admin_url( '/edit.php?post_type=vinyle' )
	) );
}
add_action('admin_bar_menu', 'vinyles', 1001);
function partenaires() {
	global $wp_admin_bar;
	if ( !is_super_admin() || !is_admin_bar_showing() )
		return;
	$wp_admin_bar->add_menu( array(
	'id' => 'partenaires',
	'parent' => 'site-name',
	'title' => __( 'Partenaires'),
	'href' => admin_url( '/edit.php?post_type=partenaire' )
	) );
}
add_action('admin_bar_menu', 'partenaires', 1002);
function presse() {
	global $wp_admin_bar;
	if ( !is_super_admin() || !is_admin_bar_showing() )
		return;
	$wp_admin_bar->add_menu( array(
	'id' => 'presse',
	'parent' => 'site-name',
	'title' => __( 'Presse'),
	'href' => admin_url( '/post.php?post=341&action=edit' )
	) );
}
add_action('admin_bar_menu', 'presse', 1003);
function mes_options(){
	global $wp_admin_bar;
	if ( !is_super_admin() || !is_admin_bar_showing() )
		return;
	$wp_admin_bar->add_menu( array(
	'id' => 'options',
	'parent' => 'site-name',
	'title' => __( 'Mes options'),
	'href' => admin_url( '/themes.php?page=options' )
	) );
}
add_action('admin_bar_menu', 'mes_options', 999);

/********** FLUX RSS IMAGES *****************/

function wpc_rss_miniature($excerpt) {
global $post;

$content = '<p>' . get_the_post_thumbnail($post->ID) .
'</p>' . get_the_excerpt();

return $content;
}
add_filter('the_excerpt_rss', 'wpc_rss_miniature');
add_filter('the_content_feed', 'wpc_rss_miniature');

?>