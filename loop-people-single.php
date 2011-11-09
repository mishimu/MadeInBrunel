<?php
//directory of profile thumbnails
$image_dir = "/wp-content/themes/mib/_images/people/2011/fullsize/";

$name = get_the_title();
		
$shortname = shortname($name);
		
//image url
$root = $_SERVER['DOCUMENT_ROOT'];

$image_url = $image_dir.$shortname.".jpg";

if(!file_exists($root.$image_url)){
	
	//no thumbnail for this person, use the default
	$image_url = $image_dir."default.jpg";

}

//get the person's info

$details = get_post_custom();
$degree = $details["degree"][0];
$email = $details["email"][0];
$website = $details["website"][0];

?>
<?php get_header(); ?>

<div class="main" id="people-single">

<h1><?php echo $name; ?></h1>
<h3><?php echo $degree; ?></h3>

<div id="content"> 
<!-- Details -->
<div class="col-third">

<img id="people-profile" src="<?php echo $image_url; ?>" alt="<?php echo $shortname; ?>-picture" width="292" height="148" />

<table>
	<?php if(!empty($email)){ ?>
	<tr>
		<td>Email</td>
		<td><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></td>
	</tr>
	<?php } ?>
	<?php if(!empty($website)){ ?>
	<tr>
		<td>Website</td>
		<td><a href="<?php echo addhttp($website); ?>" target="_blank"><?php echo removehttp($website); ?></a></td>
	</tr>
	<?php } ?>
</table>

</div>

<!-- Projects -->
<div class="col-third" id="people-projects">

<?php
//find the projects this person has worked on
$person_id = get_the_id();

$querystr = "
    SELECT wposts.*
    FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
    WHERE wposts.ID = wpostmeta.post_id
	AND wpostmeta.meta_key = 'project-creators'
	AND wpostmeta.meta_value LIKE '%$person_id%'
    AND wposts.post_status = 'publish'
    AND wposts.post_type = 'page'
    ORDER BY wposts.post_date DESC";

$projects = $wpdb->get_results($querystr, OBJECT); 

if(!empty($projects)){
	?>
	<h4>Projects</h4>
	<ul>
	<?php
	foreach($projects as $project){
			
		$query = new WP_Query("page_id={$project->ID}");
		
		
		while($query->have_posts()){	$query->the_post();
		
			//directory of project thumbnails
			$project_image_dir = "/wp-content/themes/mib/_images/projects/2011/_thumbs_144/";
		
			$project = get_the_title();
				
			//make the shortname
			$project_shortname = shortname($project);
			$project_shortname = sanitize($project_shortname);
			$project_shortname = preg_replace('/[^(\x20-\x7F)]*/','', $project_shortname);
			
			//image url
			$project_image_url = $project_image_dir.$project_shortname.".jpg";
			
			
			$details = get_post_custom();
			$subtitle = $details["project-subtitle"][0];
			
			?>
			<li id="<?php $project_shortname; ?>"<?php if($i % 4 == 0) echo ' style="margin-right:0"'; ?>>
			<a href="<?php the_permalink(); ?>"><img src="<?php echo $project_image_url; ?>" alt="<?php echo $project_shortname; ?>-picture" width="144" height="73" /></a>
			<a href="<?php the_permalink(); ?>"><h4><?php echo $project; ?></h4></a>
			<span><?php echo $subtitle; ?></span>
		</li>
			<?php
		
		}
	
	}
	?>
	</ul>
	<?php
}
?>
 
</div>

<div class="page-nav" id="people-navigation">
<?php 
wp_reset_query();

	previous_post_link('%link', '<img title="%title" class="prev-page" src="/wp-content/themes/mib/_images/site_page-prev.png" alt="Previous page" />');
	next_post_link('%link', '<img title="%title" class="next-page" src="/wp-content/themes/mib/_images/site_page-next.png" alt="Next page" />');
?>
</div>

<!-- Content end -->
</div>

<!-- Sidebar -->
<div id="aside">

<img alt="People banner" src="/wp-content/themes/mib/_images/content_sidebar_people.jpg" />

<form action="/" id="searchform" method="get" role="search">
	<input type="text" id="s" name="s" value="">
	<input type="submit" value="Search" id="searchsubmit">
</form>

<!-- Sidebar end -->
</div>

</div>
<!-- Main Body End -->
</div>
<!-- Top Container End -->
<?php get_footer(); ?>