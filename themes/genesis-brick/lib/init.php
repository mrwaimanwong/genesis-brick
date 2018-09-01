<?php

// we're going to fire this off when we activate the child theme
add_action('genesis_init','ww_theme_setup', 15);

// THEME SETUP TIME **************************************
function ww_theme_setup () {

	// don't update theme (it's custom right? so you don't need updates)
	add_filter( 'http_request_args', 'ww_dont_update', 5, 2 );

	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption'  ) );

	/** Add Viewport meta tag for mobile browsers */
	add_theme_support( 'genesis-responsive-viewport' );

	add_theme_support( 'genesis-accessibility', array(
		'404-page',
		// 'drop-down-menu', //this activates Superfish //
		'headings',
		'rems',
		'search-form',
		'skip-links',
	) );

	/** Remove Edit Link */
	add_filter( 'edit_post_link', '__return_false' );

	//Allow shortcodes in widgets
	add_filter('widget_text', 'do_shortcode');

	/*If you're going to use the date picker in Contact Form 7*/
	//add_filter( 'wpcf7_support_html5_fallback', '__return_true' );

	add_filter( 'auto_update_plugin', '__return_true' );

	add_filter( 'auto_update_theme', '__return_true' );
}

/*
if you name your child theme something that already exists in the
wordpress repo, then you may get an alert offering a "theme update"
for a theme that's not even yours. Weird, I know. Anyway, here's a
fix for that.

credit: Mark Jaquith
http://markjaquith.wordpress.com/2009/12/14/excluding-your-plugin-or-theme-from-update-checks/
*/
function ww_dont_update( $r, $url ) {
	if ( 0 !== strpos( $url, 'http://api.wordpress.org/themes/update-check' ) )
		return $r; // Not a theme update request. Bail immediately.
	$themes = unserialize( $r['body']['themes'] );
	unset( $themes[ get_option( 'template' ) ] );
	unset( $themes[ get_option( 'stylesheet' ) ] );
	$r['body']['themes'] = serialize( $themes );
	return $r;
}
