<?php
// Ulotki
add_action( 'init', 'register_cpt_ulotki' );
function register_cpt_ulotki() {
    $labels = array(
        'name' => _x( 'Ulotki', 'ulotki' ),
        'singular_name' => _x( 'Ulotki', 'ulotki' ),
        'add_new' => _x( 'Add New', 'ulotki' ),
        'add_new_item' => _x( 'Add New Ulotki', 'ulotki' ),
        'edit_item' => _x( 'Edit Ulotki', 'ulotki' ),
        'new_item' => _x( 'New Ulotki', 'ulotki' ),
        'view_item' => _x( 'View Ulotki', 'ulotki' ),
        'search_items' => _x( 'Search Ulotki', 'ulotki' ),
        'not_found' => _x( 'No ulotki found', 'ulotki' ),
        'not_found_in_trash' => _x( 'No ulotki found in Trash', 'ulotki' ),
        'parent_item_colon' => _x( 'Parent Ulotki:', 'ulotki' ),
        'menu_name' => _x( 'Ulotki', 'ulotki' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'supports' => array( 'title'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
		'rewrite' => array( 'slug' => 'ulotki-kinowe'),
        'capability_type' => 'post',
    );
    register_post_type( 'ulotki', $args );
}

// Ulotki Przedwojenne
add_action( 'init', 'register_cpt_przedwojenne' );
function register_cpt_przedwojenne() {
    $labels = array(
        'name' => _x( 'Przedwojenne', 'przedwojenne' ),
        'singular_name' => _x( 'Przedwojenne', 'przedwojenne' ),
        'add_new' => _x( 'Add New', 'przedwojenne' ),
        'add_new_item' => _x( 'Add New Przedwojenne', 'przedwojenne' ),
        'edit_item' => _x( 'Edit Przedwojenne', 'przedwojenne' ),
        'new_item' => _x( 'New Przedwojenne', 'przedwojenne' ),
        'view_item' => _x( 'View Przedwojenne', 'przedwojenne' ),
        'search_items' => _x( 'Search Przedwojenne', 'przedwojenne' ),
        'not_found' => _x( 'No przedwojenne found', 'przedwojenne' ),
        'not_found_in_trash' => _x( 'No przedwojenne found in Trash', 'przedwojenne' ),
        'parent_item_colon' => _x( 'Parent Przedwojenne:', 'przedwojenne' ),
        'menu_name' => _x( 'Przedwojenne', 'przedwojenne' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'supports' => array( 'title'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array( 'slug' => 'ulotki-przedwojenne' ),
        'capability_type' => 'post',
    );
    register_post_type( 'przedwojenne', $args );
}

// Ulotki zagraniczne
add_action( 'init', 'register_cpt_zagraniczne' );
function register_cpt_zagraniczne() {
    $labels = array(
        'name' => _x( 'Zagraniczne', 'zagraniczne' ),
        'singular_name' => _x( 'Zagraniczne', 'zagraniczne' ),
        'add_new' => _x( 'Add New', 'zagraniczne' ),
        'add_new_item' => _x( 'Add New Zagraniczne', 'zagraniczne' ),
        'edit_item' => _x( 'Edit Zagraniczne', 'zagraniczne' ),
        'new_item' => _x( 'New Zagraniczne', 'zagraniczne' ),
        'view_item' => _x( 'View Zagraniczne', 'zagraniczne' ),
        'search_items' => _x( 'Search Zagraniczne', 'zagraniczne' ),
        'not_found' => _x( 'No zagraniczne found', 'zagraniczne' ),
        'not_found_in_trash' => _x( 'No zagraniczne found in Trash', 'zagraniczne' ),
        'parent_item_colon' => _x( 'Parent Zagraniczne:', 'zagraniczne' ),
        'menu_name' => _x( 'Zagraniczne', 'zagraniczne' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'supports' => array( 'title'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array( 'slug' => 'ulotki-zagraniczne' ),
        'capability_type' => 'post',
    );
    register_post_type( 'zagraniczne', $args );
}


// Gatunek
add_action('init', 'genre_init_taxonomies');
function genre_init_taxonomies() {

	register_taxonomy(
	'genre',
	array('ulotki'),
	array(
		'hierarchical' => true,
		'labels' => array(
			'name' => 'Gatunek',
			'singular_name' => 'Wyszukaj gatunek',
			'popular_item' => 'Popularne gatunek',
			'all_item' => 'Wszystkie gatunki',
			'edit_item' => 'Edytuj gatunek',
			'update_item' => 'Aktualizuj gatunek',
			'add_new_item' => 'Dodaj nowy gatunek',
			'new_item_name' => 'Dodaj nowy gatunek',
			'separate_item_with_commas' => 'Odziel gatunki przecinkiem',
			'add_or_remove_items' => 'Dodaj lub usuń gatunek',
			'choose_from_most_items' => 'Wybierz spośród najczęściej używanych gatunków',
			'menu_name' => 'Gatunek',
		),
		'show_ui' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => false
		)
	);
}

// Reżyser
add_action('init', 'director_init_taxonomies');
function director_init_taxonomies() {

	register_taxonomy(
	'director',
	array('ulotki'),
	array(
		'hierarchical' => true,
		'labels' => array(
			'name' => 'Reżyser',
			'singular_name' => 'reżyser',
			'popular_item' => 'Popularne reżyser',
			'all_item' => 'Wszyscy reżyserzy',
			'edit_item' => 'Edytuj reżyser',
			'update_item' => 'Aktualizuj reżyser',
			'add_new_item' => 'Dodaj nowy reżyser',
			'new_item_name' => 'Dodaj nowy reżyser',
			'separate_item_with_commas' => 'Odziel reżyserów przecinkiem',
			'add_or_remove_items' => 'Dodaj lub usuń reżyser',
			'choose_from_most_items' => 'Wybierz spośród najczęściej używanych reżysterów',
			'menu_name' => 'Reżyser',
		),
		'show_ui' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => false
		)
	);
}

// Aktor
add_action('init', 'actor_init_taxonomies');
function actor_init_taxonomies() {

	register_taxonomy(
	'actor',
	array('ulotki'),
	array(
		'hierarchical' => true,
		'labels' => array(
			'name' => 'Aktor',
			'singular_name' => 'Aktora',
			'popular_item' => 'Popularne aktorzy',
			'all_item' => 'Wszyscy aktorzy',
			'edit_item' => 'Edytuj aktora',
			'update_item' => 'Aktualizuj aktora',
			'add_new_item' => 'Dodaj nowego aktora',
			'new_item_name' => 'Dodaj nowego aktora',
			'separate_item_with_commas' => 'Odziel aktorów przecinkiem',
			'add_or_remove_items' => 'Dodaj lub usuń aktora',
			'choose_from_most_items' => 'Wybierz spośród najczęściej używanych aktorów',
			'menu_name' => 'Aktorzy',
		),
		'show_ui' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => false
		)
	);
}


// Kraj
add_action('init', 'country_init_taxonomies');
function country_init_taxonomies() {

	register_taxonomy(
	'country',
	array('zagraniczne'),
	array(
		'hierarchical' => true,
		'labels' => array(
			'name' => 'Kraj',
			'singular_name' => 'Kraj',
			'popular_item' => 'Popularne kraje',
			'all_item' => 'Wszystkie kraje',
			'edit_item' => 'Edytuj kraj',
			'update_item' => 'Aktualizuj kraj',
			'add_new_item' => 'Dodaj nowy kraj',
			'new_item_name' => 'Dodaj nowy kraj',
			'separate_item_with_commas' => 'Odziel kraje przecinkiem',
			'add_or_remove_items' => 'Dodaj lub usuń kraj',
			'choose_from_most_items' => 'Wybierz spośród najczęściej używanych krajów',
			'menu_name' => 'Kraj',
		),
		'show_ui' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => false
		)
	);
}


// Rok
add_action('init', 'years_init_taxonomies');
function years_init_taxonomies() {

	register_taxonomy(
	'years',
	array('ulotki'),
	array(
		'hierarchical' => true,
		'labels' => array(
			'name' => 'Rok',
			'singular_name' => 'Wyszukaj Kraj',
			'popular_item' => 'Popularne kraje',
			'all_item' => 'Wszystkie kraje',
			'edit_item' => 'Edytuj kraj',
			'update_item' => 'Aktualizuj kraj',
			'add_new_item' => 'Dodaj nowy kraj',
			'new_item_name' => 'Dodaj nowy kraj',
			'separate_item_with_commas' => 'Odziel kraje przecinkiem',
			'add_or_remove_items' => 'Dodaj lub usuń kraj',
			'choose_from_most_items' => 'Wybierz spośród najczęściej używanych krajów',
			'menu_name' => 'Rok',
		),
		'show_ui' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => array( 'slug' => 'ulotki')
		)
	);
}
?>