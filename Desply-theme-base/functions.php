<?php

if(!defined('LOVETOEAT_THEME_DIR')) {
	//define('LOVETOEAT_THEME_DIR', ABSPATH.'wp-content/themes/'.get_template().'/');
	define('LOVETOEAT_THEME_DIR', get_theme_root().'/'.get_template().'/');
}

if(!defined('LOVETOEAT_THEME_URL')) {
	define('LOVETOEAT_THEME_URL', WP_CONTENT_URL.'/themes/'.get_template().'/');
}

require_once LOVETOEAT_THEME_DIR.'libs/posttypes.php';
add_filter( 'show_admin_bar', '__return_false' );
//add_theme_support('post-formats', array('gallery'));
add_theme_support('post-thumbnails', array('post', 'ulotki'));


if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'ulotka-mini', 235, 9999 ); //300 pixels wide (and unlimited height)
}
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'ulotka', 400, 9999 ); //300 pixels wide (and unlimited height)
}



// Dodawanie Menu
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'extra-menu' => __( 'Extra Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

function arphabet_widgets_init() {

	register_sidebar( array(
		'name' => 'Footer Left',
		'id' => 'footer_left',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => 'Footer Center',
		'id' => 'footer_center',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => 'Footer Right',
		'id' => 'footer_right',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => 'Home',
		'id' => 'home',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'arphabet_widgets_init' );


function wp_get_ulotki_postcount($id) {

    //return $count;
    $args = array(
      'post_type'     => 'ulotki', //post type, I used 'product'
      'post_status'   => 'publish', // just tried to find all published post
      'posts_per_page' => -1 //show all
    );
    $query = new WP_Query( $args);
    return (int)$query->post_count;

}

function wp_info_films($post) {
	echo "<span></span>";
	$myname = get_post_meta($post, 'original_title', true);
	if ( $myname ):
		echo "<strong>Oryginalny tytuł: </strong>";
		the_field('original_title');
		echo "<br>";
	endif;
	echo "<strong>Premiera w Polsce: </strong>";
	the_field('day');
	echo " ";
	the_field('month');
	echo " ";
	echo get_the_term_list( $post, 'years', '', ', ', '' );
	echo "<br>";
	$myname = get_post_meta($post, 'release_world', true);
	if ( $myname ):
		echo "<strong>Premiera Światowa: </strong>";
		the_field('release_world');
		echo "<br>";
	endif;
	$myname = wp_get_post_terms($post, 'genre', true);
	if ( $myname ):
		echo "<strong>Gatunek filmu: </strong>";
		echo get_the_term_list( $post, 'genre', '', ', ', '' );
		echo "<br>";
	endif;
	$myname = wp_get_post_terms($post, 'actor', true);
	if ( $myname ):
		echo "<strong>Aktor: </strong>";
		echo get_the_term_list( $post, 'actor', '', ', ', '' );
		echo "<br>";
	endif;
	$myname = wp_get_post_terms($post, 'director', true);
	if ( $myname ):
		echo "<strong>Reżyser: </strong>";
		echo get_the_term_list( $post, 'director', '', ', ', '' );
	endif;
}

function wp_info_films_old($post) {
	echo "<span></span>";
	$myname = get_post_meta($post, 'original_title', true);
	if ( $myname ):
		echo "<strong>Polski tytuł: </strong>";
		the_field('original_title');
		echo "<br>";
	endif;
	echo "<strong>Premiera: </strong>";
	the_field('day');
	echo " ";
	the_field('month');
	echo " ";
	echo get_the_term_list( $post, 'years', '', ', ', '' );
	echo "<br>";
	$myname = get_post_meta($post, 'release_world', true);
	if ( $myname ):
		echo "<strong>Premiera Światowa: </strong>";
		the_field('release_world');
		echo "<br>";
	endif;
	$myname = wp_get_post_terms($post, 'genre', true);
	if ( $myname ):
		echo "<strong>Gatunek filmu: </strong>";
		echo get_the_term_list( $post, 'genre', '', ', ', '' );
		echo "<br>";
	endif;
	$myname = wp_get_post_terms($post, 'actor', true);
	if ( $myname ):
		echo "<strong>Aktor: </strong>";
		echo get_the_term_list( $post, 'actor', '', ', ', '' );
		echo "<br>";
	endif;
	$myname = wp_get_post_terms($post, 'director', true);
	if ( $myname ):
		echo "<strong>Reżyser: </strong>";
		echo get_the_term_list( $post, 'director', '', ', ', '' );
	endif;
}


function searchfilter($query) {
if ($query->is_search && !is_admin() ) {
$query->set('post_type',array('post','ulotki','zagraniczne'));
}
return $query;
}
add_filter('pre_get_posts','searchfilter');

function wp_numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}




add_filter('wp_nav_menu_items', 'add_search_form', 10, 2);

 function add_search_form($items, $args) {
          if( $args->theme_location == 'header-menu' )
          $items .= '<li class="search"><i class="fa fa-search"></i> <form role="search" method="get" id="searchform" action="'.home_url( '/' ).'"><input type="text" value="" name="s" id="s" /><input type="submit" id="searchsubmit" value="Szukaj" /></form></li>';
     return $items;
}

?>