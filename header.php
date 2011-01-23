<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <title><?php wp_title('&raquo;',true,'right'); ?> <?php if ( is_single() ) { ?> Blog Archive &raquo; <?php } ?> <?php bloginfo('name'); ?><?php if (!is_single()) { echo ' - '; bloginfo('description');} ?></title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">

    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link rel="apple-touch-icon" href="/wp-content/themes/theme-the-code-train/images/apple-touch-icon.png">

    <?php wp_head(); ?>
</head>
<body>
<div id="doc2" class="yui-t5">

    <div id="hd">
        <div class="mod">
    
    <?php if (is_single()) { ?>
        <p class="hd bloginfo_name"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></p>
    <?php } else { ?>
        <h1 class="hd bloginfo_name"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
    <?php } ?>

        <div class="bd">
            <p class="bloginfo_title"><?php bloginfo('description'); ?></p>
            <p class="rss"><a href="<?php bloginfo('rss2_url'); ?>"><img src="/wp-content/themes/theme-the-code-train/images/feed-icon-140x140.png" alt="RSS Entries" height="110"></a></p>
        </div>

        </div>
        <!-- start menu -->
        <div id="menu">
            <ul class="bd">
                <li><a href="<?php echo get_option('home'); ?>">Blog</a></li>
                <?php wp_list_pages('title_li=&depth=1'); ?>
                <li id="search">
                    <form id="searchform" method="get" action="<?php bloginfo('url'); ?>/">
                        <p>
                            <input type="text" name="s" size="15" value="">
                            <input type="submit" value="Search">
                        </p>
                    </form>
                </li>
            </ul>
        </div>
        <!-- end menu -->
    </div>
    <div id="bd">
