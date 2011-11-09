<?php
//directory of project thumbnails
$image_dir = "/wp-content/themes/mib/_images/projects/2011/_thumbs_144/";
?>
<?php get_header(); ?>

<div class="main">
<h1><?php the_title(); ?></h1>

<div id="content"> 
	<ul id="projects-index">
	<?php	
	
	//find the current page number
	$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
	query_posts(array('post_parent' => 317, 'post_type' => 'page', 'posts_per_page'=> 24, 'orderby' => 'title', 'order' => 'asc', 'paged' => $page));
	
	$i =1;
	while (have_posts()) { 

		the_post();
		
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
<?php
query_posts('page_id=5');
the_post();
?>
<div id="aside">

<img src="/wp-content/themes/mib/_images/content-aside_exhibitions-banner.jpg" alt="Projects banner" />
<form action="/" id="searchform" method="get" role="search">
	<input type="text" id="s" name="s" value="">
	<input type="submit" value="Search" id="searchsubmit">
</form>
<!-- end sidebar -->
</div>
<!-- end main -->
</div>
</div>
<?php get_footer(); ?>