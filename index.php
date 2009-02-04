<?php get_header(); ?>

<div class="left"> 

<ul class="entries">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <li>

<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<p>Posted on <strong><?php the_time('F jS, Y') ?></strong> by <strong><?php the_author() ?></strong>. Filed under <strong><?php the_category(', ') ?></strong>.</p>
<div class="articles">
<?php the_excerpt(); ?>
<p><a href="<?php the_permalink() ?>" rel="bookmark">Continue reading...</a></p>
<p class="showtags"><?php if (function_exists('the_tags')) the_tags(__('Tags: ','ml'), ', ', ''); ?>.</p><div class="count">&nbsp;&nbsp;&nbsp; <?php comments_popup_link('No Comments', '<span>(1)</span> Comment', '<span>(%)</span> Comments'); ?></div>
<div style="clear: both;"> </div>
</div>

    <!-- end content -->
    </li>
<?php endwhile; ?>
</ul>

        <ul class="nav-timeline">
            <li class="prev"><?php next_posts_link('&laquo; Older Entries') ?></li>
            <li class="next"><?php previous_posts_link('Newer Entries &raquo;') ?></li>
        </ul>

<?php else : ?>

        <h2>Not Found</h2>
        <p>Sorry, but you are looking for something that isn't here.</p>

    <?php endif; ?> 

</div>
<!-- nomove sidebar -->
<div class="nomove"> 
<ul>
<li><a class="rss_primary" href="<?php bloginfo('rss2_url'); ?>"><img src="/wp-content/themes/theme-the-code-train/images/feed-icon-140x140.png" alt="RSS Entries"></a></li>
<li><a class="rss_secondary" href="<?php bloginfo('comments_rss2_url'); ?>" class="feed">RSS for Comments</a></li>
</ul>

<div id="search">
        <form id="searchform" method="get" action="<?php bloginfo('url'); ?>/">
            <fieldset>
                <legend>Search:</legend>
                <input type="text" name="s" id="s" size="15" value="Search: Type and Enter" onblur="if (this.value == '') {this.value = 'Search: Type and Enter';}" onfocus="if (this.value == 'Search: Type and Enter') {this.value = '';}">
                <input type="submit" id="x" value="Search">
            </fieldset>
        </form>
    </div>
</div>  
<?php get_sidebar(); ?>
<?php get_footer(); ?>