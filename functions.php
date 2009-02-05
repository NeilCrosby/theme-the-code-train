<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
    'before_widget' => '<li>',
    'after_widget' => '</li>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
));

if ( function_exists('register_sidebar_widget') ) {
    register_sidebar_widget(__("This Blog's RSS"), 'tct_widget_rss');
#    register_sidebar_widget(__('Search'), 'widget_mytheme_search');
#    register_sidebar_widget(__('Next / Prev Posts'), 'widget_mytheme_next_prev');
#    register_sidebar_widget(__('Recent Posts'), 'widget_mytheme_recent');
#    register_sidebar_widget(__('Archives'), 'widget_mytheme_monthly');
#    register_sidebar_widget(__('Meta'), 'widget_mytheme_meta');
}

function tct_widget_rss($args) {
    extract($args);

    echo $before_widget;
    
    echo $before_title."RSS feeds".$after_title;
    
?>
    <ul>
        <li><a class="rss_primary" href="<?php bloginfo('rss2_url'); ?>"><img src="/wp-content/themes/theme-the-code-train/images/feed-icon-140x140.png" alt="RSS Entries"></a></li>
        <li><a class="rss_secondary" href="<?php bloginfo('comments_rss2_url'); ?>">RSS For Comments</a></li>
    </ul>
<?php

    echo $after_widget;
}

function tct_widget_search($args) {
    extract($args);

    echo $before_widget;
    
    echo $before_title."Search".$after_title;
    
?>
    <div id="search">
        <form id="searchform" method="get" action="<?php bloginfo('url'); ?>/">
            <fieldset>
                <legend>Search:</legend>
                <input type="text" name="s" id="s" size="15" value="Type and Enter" onblur="if (this.value == '') {this.value = 'Type and Enter';}" onfocus="if (this.value == 'Type and Enter') {this.value = '';}">
                <input type="submit" id="x" value="Search">
            </fieldset>
        </form>
    </div>
<?php

    echo $after_widget;
}

// Everything under here is to HTML4.01 Strict-ise WordPress.
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