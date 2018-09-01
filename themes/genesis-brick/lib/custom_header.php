<?php

/** Genesis - Remove header markup */
add_action('genesis_setup', 'ww_remove_header');

function ww_remove_header() {
	remove_action( 'genesis_header', 'genesis_header_markup_open', 5);
	remove_action( 'genesis_header', 'genesis_do_header' );
	remove_action( 'genesis_header', 'genesis_header_markup_close', 15);
  //* Remove default Genesis menu
  remove_action('genesis_after_header', 'genesis_do_nav');

  remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
}

/** Add custom header */
add_action('genesis_header', 'ww_custom_header');

function ww_custom_header()
{

	$name = get_bloginfo ('name');
	$url = get_bloginfo ('url');
  $primarynav = wp_nav_menu( array('theme_location' => 'Primary', 'menu' => 'MAS', 'container' => 'nav', 'container_class' => 'nav-primary', 'menu_class' => 'menu genesis-nav-menu menu-primary', 'menu_id' => 'nav', 'echo' => false));
  // $compactnav = wp_nav_menu( array('theme_location' => 'primary', 'container' => false, 'menu_id' => 'nav-compact', 'echo' => false));

	/*======================================================  ===================================================
	Sroll nav. Use the code below to have the nav display when scrolled. Edit JS as well. Still needs to be styled for responsive.

	//======================================================  ===================================================*/

	// echo
	// '<header class="site-header-compact" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
	// 	<div class="wrap">
	// 		<div class="title-area">
	// 			<h1 class="site-title-compact" itemprop="headline"><a href="'.$url .'" title="'.$name.'">'.$name.'</a></h1>
	// 		</div>
	// 		<nav class="nav-compact" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
	//  			<div class="wrap">
	//  				'.$compactnav.'
	//  			</div>
 // 			</nav>
	// 	</div>
	// </header>';
	/*======================================================  ===================================================
	End scroll nav

	//======================================================  ===================================================*/

	echo '<header class="site-header" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
		<div class="wrap">
			<div class="title-area">
				<h1 class="site-title" itemprop="headline"><a href="'.$url .'" title="'.$name.'">'.$name.'</a></h1>
			</div>
	 		'.$primarynav.'
		</div>';

  if(!is_home() && !is_front_page()) {
    $the_page_title = '';
    $the_page_bg = 'mini';

    if ( get_the_title() == '' )
			{
			$the_page_title = 'Events';
			}
      else {
        $the_page_title = get_the_title();
        $the_page_bg = strtolower(get_the_title());
      }
    echo '<div class="ww-page-title"><div class="wrap"><div style="height: 75px; background: url(/wp-content/themes/genesis-mas/images/'.$the_page_bg.'_bg.jpg) no-repeat;"><h1>'.$the_page_title.'</h1></div></div></div>';
  }

	echo '</header>';
}
