<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">

<head>
<title><?php wp_title('&raquo;',true,'right'); ?> <?php if ( is_single() ) { ?> Blog Archive &raquo; <?php } ?> <?php bloginfo('name'); ?></title>

<meta http-equiv="Content-Language" content="English">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="">
<meta name="description" content="">

<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

<?php wp_head(); ?>
</head>
<body id="doc2">

<div id="wrap">

    <div id="header">
        <?php if (is_single()) { ?>
            <p class="bloginfo_name"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></p>
        <?php } else { ?>
            <h1 class="bloginfo_name"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
        <?php } ?>
        <p class="bloginfo_title"><?php bloginfo('description'); ?></p>

        <!-- start menu -->
        <div id="menu">
            <ul>
                <?php wp_list_pages('title_li=&depth=1'); ?>
                <li><a href="<?php echo get_option('home'); ?>">Home</a></li>
            </ul>
        </div>
        <!-- end menu -->
    </div>
    <div id="content">