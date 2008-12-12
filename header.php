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

<!-- TODO make wp_head output HTML 4.01 Strict <?php wp_head(); ?> -->
</head>
<body>

<div id="wrap">

<div id="header">
<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
<h2><?php bloginfo('description'); ?></h2>
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