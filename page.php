<?php
/**
 * @package WordPress
 * @subpackage Made in Brunel
 */
?>

<?php if ( have_posts() ) : the_post(); ?>

<?php
if (is_front_page()) {
		
		get_template_part('loop', 'home');
	
}

elseif(is_page('projects')){//projects index
		
		get_template_part('loop', 'projects');
	
}

elseif($post->post_parent == 317){//child of 'projects' 
		
		get_template_part('loop', 'projects-single');
	
}

elseif(is_page('people')){//projects index
		
		get_template_part('loop', 'people');
	
}

elseif($post->post_parent == 5){//child of 'people' 
		
		get_template_part('loop', 'people-single');
	
}
else{//standard page template
		
		get_template_part('loop', 'page');
}

?>

<?php endif; ?>