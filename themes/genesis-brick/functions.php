<?php
/*
Child Theme Name: Genesis MAS
Author: Wai Man Wong
Version: 1.0
URL: htp://waimanwong.com/
*/

/** Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit( 'Cheatin&#8217; uh?' );

require_once( get_stylesheet_directory() . '/lib/init.php');
require_once( get_stylesheet_directory() . '/lib/scripts.php');
// require_once( get_stylesheet_directory() . '/lib/beans/icon-shortcode.php');
require_once( get_stylesheet_directory() . '/lib/beans/events-shortcode.php');
require_once( get_stylesheet_directory() . '/lib/beans/list-faq-shortcode.php');
// require_once( get_stylesheet_directory() . '/lib/shortcodes.php');

require_once( get_stylesheet_directory() . '/lib/custom_header.php');
require_once( get_stylesheet_directory() . '/lib/custom_footer.php');
require_once( get_stylesheet_directory() . '/lib/layout.php');

// Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'MAS' );
define( 'CHILD_THEME_URL', 'https://www.waimanwong.com/' );
define( 'CHILD_DOMAIN', 'mas' );
