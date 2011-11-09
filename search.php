<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>
<div class="main">
	
	<h1 class="pagetitle">Search results for '<?php echo $s; ?>'</h1>
	
	<div id="content" class="narrowcolumn" role="main">

	<ul id="search-index">
	<?php	
	$i =1;
	while (have_posts()) { 
	
		the_post();
		
		global $post;
		//check this is either a page in the projects or people section
		if ($post->post_parent != 317 && $post->post_parent != 5) continue;
		
		//projects
		if($post->post_parent == 317){
		
			//directory of project thumbnails
			$image_dir = "/wp-content/themes/mib/_images/projects/2011/_thumbs_144/";
		
			$project = get_the_title();
					
			//make the shortname
			$shortname = shortname($project);
			$shortname = sanitize($shortname);
			$shortname = preg_replace('/[^(\x20-\x7F)]*/','', $shortname);
			
			//image url
			$image_url = $image_dir.$shortname.".jpg";
			
			
			$details = get_post_custom();
			$subtitle = $details["project-subtitle"][0];
			?>
			
			
			<li id="<?php $shortname; ?>"<?php if($i % 4 == 0) echo ' style="margin-right:0"'; ?>>
				<a href="<?php the_permalink(); ?>"><img src="<?php echo $image_url; ?>" alt="<?php echo $shortname; ?>-picture" width="144" height="73" /></a>
				<a href="<?php the_permalink(); ?>"><h4><?php echo $project; ?></h4></a>
				<span><?php echo $subtitle; ?></span>
			</li>
		
		<?php	
		}
		
		//people
		else{
		
			//directory of profile thumbnails
			$image_dir = "/wp-content/themes/mib/_images/people/2011/thumbs/";
			
			$name = get_the_title();
			
			$shortname = shortname($name);
		
			//image url
			$root = $_SERVER['DOCUMENT_ROOT'];
			
			$image_url = $image_dir.$shortname.".jpg";
			
			if(!file_exists($root.$image_url)){
				
				//no thumbnail for this person, use the default
				$image_url = $image_dir."default.jpg";
		 
			}
			
			$details = get_post_custom();
			$degree = $details["degree"][0];
			?>
			
			
			<li id="<?php $shortname; ?>"<?php if($i % 4 == 0) echo ' style="margin-right:0"'; ?>>
				<a href="<?php the_permalink(); ?>"><img src="<?php echo $image_url; ?>" alt="<?php echo $shortname; ?>-picture" width="144" height="73" /></a>
				<a href="<?php the_permalink(); ?>"><h4><?php echo $name; ?></h4></a>
				<span><?php echo $degree; ?></span>
			</li>
		<?php
		}
		$i++;	
	}	
	?>
	</ul>
	
	<div class="page-nav" id="project-pagination">
	<!-- Pagination -->
	<?php if(function_exists('wp_paginate')) {
   		wp_paginate();
	} ?>	
	</div>
	
<!-- End content -->	
</div>

<!-- Sidebar -->
<div id="aside">
<img src="/wp-content/themes/mib/_images/content-aside_exhibitions-banner.jpg" alt="Projects banner" />
<form action="/" id="searchform" method="get" role="search">
	<input type="text" id="s" name="s" value="">
	<input type="submit" value="Search" id="searchsubmit">
</form>
<!-- end sidebar -->
</div>
</div>
</div>
<?php get_footer(); ?>
