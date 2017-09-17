	<h1>Options pour le thème</h1>
	

<style>
	input[type=text], input[type=url] {
		display: block;
		max-width: 90%;
		width: 600px;
	}
	label{
		display: block;
		font-weight: bold;
		margin-bottom: 15px;
		margin-top: 25px;
	}
</style>

<form method="post" action="options.php">
	<h2>Jour du disquaire day</h2>
	<label>Jour</label>
	<input type="text" name="day" id="day" value="<? echo get_option('day'); ?>">

	<label>Année</label>
	<input type="number" name="year" id="year" value="<? echo get_option('year'); ?>">
	
	<h2>Boutons réseaux sociaux</h2>
	<? wp_nonce_field('update-options'); ?>
	<label>Facebook</label>
	<input type="url" name="facebook" id="facebook" value="<? echo get_option('facebook'); ?>">

	<label>Twitter</label>
	<input type="url" name="twitter" id="twitter" value="<? echo get_option('twitter'); ?>">

	<label>Instagram</label>
	<input type="url" name="instagram" id="instagram" value="<? echo get_option('instagram'); ?>">

	<label>Pinterest</label>
	<input type="url" name="pinterest" id="pinterest" value="<? echo get_option('pinterest'); ?>">
	
	<label>Google+</label>
	<input type="url" name="googleplus" id="googleplus" value="<? echo get_option('googleplus'); ?>">
	
	<label>Youtube</label>
	<input type="url" name="youtube" id="youtube" value="<? echo get_option('youtube'); ?>">

	<h2>Page d'accueil</h2>
	<label>Cadre tous les événements</label>
	<input type="url" name="image1" id="image1" value="<? echo get_option('image1'); ?>">
	<label>Cadre Village Disquaire Day (URL image et URL de la page du village)</label>
	<input type="url" name="image2" id="image2" value="<? echo get_option('image2'); ?>">
	<input type="url" name="article2" id="article2" value="<? echo get_option('article2'); ?>">
	<label>Cadre Concours (URL image et URL de la page du concours)</label>
	<input type="url" name="image3" id="image3" value="<? echo get_option('image3'); ?>">
	<input type="url" name="article3" id="article3" value="<? echo get_option('article3'); ?>">
	
	<label>Vidéo youtube ou autre</label>
	<p>Ne pas oublier d'ajouter <b>class="embed-responsive-item"</b> dans l'iframe de la vidéo pour le redimensionnement sur tous les supports ! Voir l'exemple ci-dessous :</p>
	<pre><code>&lt;iframe width="1280" height="720" src="https://www.youtube.com/embed/R6RELqzlPm0?vq=hd1080" frameborder="0" allowfullscreen  class="embed-responsive-item"&gt;&lt;/iframe&gt;</code></pre>
	<textarea name="video" rows="5" cols="67"><? echo get_option('video'); ?></textarea>
	
	<label>Cadre 5</label>
	<input type="url" name="image4" id="image4" value="<? echo get_option('image4'); ?>">
	
	
<!-- Mise à jour des valeurs -->
<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="day, year, facebook, twitter, instagram, pinterest, googleplus, youtube, image1, image2, article2, image3, article3, image4,  video" />

<!-- Bouton de sauvegarde -->
<p>
<input type="submit" value="<?php _e('Save Changes'); ?>" />
</p>
</form>
