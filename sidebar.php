<?php
/**
 * @package WordPress
 * @subpackage Made in Brunel
 */
?>
<div id="aside">

	<!-- Standard page sidebar Start-->
	<?php 
	
	$sidebar_content = get_post_meta($post->ID, 'sidebar', true);
	
	if ($sidebar_content) {
			echo $sidebar_content;
	}
	else { ?>
		<img alt="Bargehouse Interior" src="/wp-content/themes/mib/_images/content-aside-news.jpg" width="292" height="99" />
	<?php } ?>
    
	
    <?php if (is_category(3) || is_category(4) || in_category(3) || in_category(4)) { ?>
    
        <div style="float: left; width: 292px;">
            
            <h3>Feeds</h3>
            <ul>
            <li><a href="/feed/" target="_blank">Made in Brunel RSS</a></li>
            <li><a href="/comments/feed/" target="_blank">Comments RSS</a></li>
            </ul>
            
            <h3>Archive</h3>
            <ul>
			<?php wp_get_archives('type=monthly'); ?>
            <?php wp_get_archives('type=yearly'); ?>
			</ul>
            
        </div>    
        
         <div style="float: left; width: 292px; margin-top: 10px;">  
          
            <h3>Tags</h3>
            <?php wp_tag_cloud('format=list&number=10&smallest=10&largest=10'); ?>
            
        </div>
	<?php }	?>
	<!-- Standard page sidebar Start-->

		</div>
		<!-- Sidebar End-->
	</div>
	<!-- Main Body End -->
</div>
<!-- Top Container End -->