<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
));

remove_action('wp_head', 'rsd_link');
add_action(   'wp_head', 'tct_rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
add_action(   'wp_head', 'tct_wlwmanifest_link');
remove_action('wp_head', 'locale_stylesheet');
add_action(   'wp_head', 'tct_locale_stylesheet');
remove_action('wp_head', 'noindex', 1);
add_action(   'wp_head', 'tct_noindex', 1);
remove_action('wp_head', 'wp_print_styles', 9);
add_action(   'wp_head', 'wp_print_styles', 9);
remove_action('wp_head', 'wp_print_scripts');
add_action(   'wp_head', 'wp_print_scripts');
remove_action('wp_head', 'wp_generator');
add_action(   'wp_head', 'tct_wp_generator');


function tct_rsd_link() {
	echo '<link rel="EditURI" type="application/rsd+xml" title="RSD" href="' . get_bloginfo('wpurl') . "/xmlrpc.php?rsd\">\n";
}

function tct_wlwmanifest_link() {
	echo '<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="'
		. get_bloginfo('wpurl') . '/wp-includes/wlwmanifest.xml"> ' . "\n";
}

function tct_locale_stylesheet() {
	$stylesheet = get_locale_stylesheet_uri();
	if ( empty($stylesheet) )
		return;
	echo '<link rel="stylesheet" href="' . $stylesheet . '" type="text/css" media="screen">';
}

function tct_noindex() {
    // If the blog is not public, tell robots to go away.
    if ( '0' == get_option('blog_public') )
        echo "<meta name='robots' content='noindex,nofollow'>\n";
}

function tct_wp_generator() {
	the_generator( apply_filters( 'wp_generator_type', 'html' ) );
}

?>