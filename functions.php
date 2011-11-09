<?php
/**
 * @package WordPress
 * @subpackage Made in Brunel
 */
 
function content($num) {
	$theContent = get_the_content();
	$output = preg_replace('/<img[^>]+./','', $theContent);
	$output = preg_replace( '/<blockquote>.*<\/blockquote>/', '', $output );
	$output = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $output );
	$limit = $num+1;
	$content = explode(' ', $output, $limit);
	array_pop($content);
	$content = implode(" ",$content)."...";
	echo $content;
}
	
if(!function_exists('getPageContent')){
	function getPageContent($pageId)
	{
		if(!is_numeric($pageId))
		{
			return;
		}
		global $wpdb;
		$sql_query = 'SELECT DISTINCT * FROM ' . $wpdb->posts .
		' WHERE ' . $wpdb->posts . '.ID=' . $pageId;
		$posts = $wpdb->get_results($sql_query);
		if(!empty($posts))
		{
			foreach($posts as $post)
			{
				return nl2br($post->post_content);
			}
		}
	}
}

/* Get the shortname of a person (surname-firstname) */

function shortname($name){
		
				
	//make the shortname
	$lowercase = strtolower($name);
	$shortname = str_replace(" ", "-", $lowercase);

	return $shortname;
}

	
/* Add http:// to a URL if not already present */

function addhttp($url) {
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}

/* Remove http:// to a URL if not already removed */

function removehttp($url) {
    if (preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = str_replace("http://", "", $url);
    }
    return $url;
}

/* Sanitize a string to make it safe as a slug, filename etc */

function sanitize($string, $force_lowercase = true, $anal = false) {
    $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
                   "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
                   "‰ЫУ", "‰ЫТ", ",", "<", ".", ">", "/", "?", "Р", "8217", "038", "Ф");
    $clean = trim(str_replace($strip, "", strip_tags($string)));
    $clean = preg_replace('/\s+/', "-", $clean);
    $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;
    $clean = preg_replace('/[^(\x20-\x7F)]*/','', $clean);
    return ($force_lowercase) ?
        (function_exists('mb_strtolower')) ?
            mb_strtolower($clean, 'UTF-8') :
            strtolower($clean) :
        $clean;
}

function new_excerpt_length($length) {
	return 30;
}
add_filter('excerpt_length', 'new_excerpt_length');

?>