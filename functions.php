<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
));

#if ( function_exists('register_sidebar_widget') ) {
#    register_sidebar_widget(__("TheCodeTrain RSS Widget"), 'tct_widget_rss');
#    register_sidebar_widget(__("TheCodeTrain Search Widget"), 'tct_widget_search');
#}

function tct_widget_rss($args) {
    extract($args);
    
    $empty_id = 'id=""';
    $id_pos = mb_strpos($before_widget, $empty_id);
    if ( $id_pos > 0 ) {
        $before_widget = mb_substr($before_widget, 0, $id_pos) . mb_substr($before_widget, $id_pos + mb_strlen($empty_id));
    }

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

    $empty_id = 'id=""';
    $id_pos = mb_strpos($before_widget, $empty_id);
    if ( $id_pos > 0 ) {
        $before_widget = mb_substr($before_widget, 0, $id_pos) . mb_substr($before_widget, $id_pos + mb_strlen($empty_id));
    }

    echo $before_widget;
    
    echo $before_title."Search".$after_title;
    
?>
    <div id="search">
        <form id="searchform" method="get" action="<?php bloginfo('url'); ?>/">
            <p>
                <input type="text" name="s" size="15" value="">
                <input type="submit" value="Search">
            </p>
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
    echo '    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="' . get_bloginfo('wpurl') . "/xmlrpc.php?rsd\">\n";
}

function tct_wlwmanifest_link() {
	echo '    <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="'
		. get_bloginfo('wpurl') . '/wp-includes/wlwmanifest.xml"> ' . "\n";
}

function tct_locale_stylesheet() {
	$stylesheet = get_locale_stylesheet_uri();
	if ( empty($stylesheet) )
		return;
	echo '    <link rel="stylesheet" href="' . $stylesheet . '" type="text/css" media="screen">'."\n";
}

function tct_noindex() {
    // If the blog is not public, tell robots to go away.
    if ( '0' == get_option('blog_public') ) {
        echo "<meta name='robots' content='noindex,nofollow'>\n";
    }
}

function tct_wp_generator() {
    echo '    ';
	the_generator( apply_filters( 'wp_generator_type', 'html' ) );
}

?>