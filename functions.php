<?php

/**
 * Custom Child Theme Functions
 * I've included a "commented out" sample function below that'll add a home link to your menu
 * More ideas can be found on "A Guide To Customizing The Thematic Theme Framework" 
 * http://themeshaper.com/thematic-for-wordpress/guide-customizing-thematic-theme-framework/
 */
$imagesdir = get_bloginfo('stylesheet_directory') . '/images';
$childtheme = get_bloginfo('stylesheet_directory');

/**
 *
 * Load the WP-Less parser if the plugin is not installed
 *
 */

if (!class_exists('WPLessPlugin'))
{
  require dirname(__FILE__).'/lib/Plugin.class.php';
  $WPLessPlugin = WPPluginToolkitPlugin::create('WPLess', __FILE__, 'WPLessPlugin');
}
add_action('wp_print_styles', array($WPLessPlugin, 'processStylesheets'));
//wp_enqueue_style('mytheme', $childtheme . '/less/style.less', array('blueprint'), '', 'screen, projection');
wp_enqueue_style('mytheme', $childtheme . '/less/default.less', false, '', 'screen, projection');



/** 
 * Adds a home link to your menu
 * http://codex.wordpress.org/Template_Tags/wp_page_menu
*/

function childtheme_menu_args($args) {
   $args = array(
       'show_home' => 'Home',
       'sort_column' => 'menu_order',
       'menu_class' => 'menu',
       'echo' => true
   );
	return $args;
}
//add_filter('wp_page_menu_args','childtheme_menu_args');



	if(is_home()) 
	{ 
echo test;
	}

// Hook into the area below the header
function childtheme_header_tags() { ?>

<!--[if gte IE 8]>
<style type="text/css">
.sf-menu li li, .sf-menu li li li {
	background:transparent;
	filter:progid:DXImageTransform.Microsoft.gradient(startColorStr=#BF6464B7,endColorStr=#BF6464B7);
	-ms-filter:"progid:DXImageTransform.Microsoft.gradient(startColorstr=#BF6464B7,endColorstr=#BF6464B7)";
	zoom: 1;	
}

</style>
<![endif]-->

<?php }
add_action('wp-head','childtheme_header_tags');

// Hook into the area below the header
function childtheme_belowheader() { ?>
     <hr />
<?php }
add_action('thematic_belowheader','childtheme_belowheader');

function insert_content_header2() {
	if(is_home() && !is_paged()) 
	{ ?>
	<img src="<?php echo $imagedir; ?>/heading-content-home.png" alt="Winners Bet Winners" />
	<?php 
echo test;
	}
}
add_action('thematic_abovecontent','insert_content_header');

function pre_sidebar() { ?>
<div id="pre-sidebar" class="rounded-corners">
</div>
<?php
}
add_action('thematic_abovemainasides', 'pre_sidebar');

function my_footer($thm_footertext) {?>
	Powered by <a href="http://web-standard-design.com">Web Standard CSS Design and SEO Services</a>.
	
<?php
}
add_filter('thematic_footertext', 'my_footer');
