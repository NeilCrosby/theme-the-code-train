<?php get_header(); ?>
<div id="yui-main"><div class="yui-b">

    <?php if (have_posts()) : ?>

        <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
        <?php /* If this is a category archive */ if (is_category()) { ?>
            <h2>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
        <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
            <h2>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
        <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
            <h2>Archive for <?php the_time('F jS, Y'); ?></h2>
        <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
            <h2>Archive for <?php the_time('F, Y'); ?></h2>
        <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
            <h2>Archive for <?php the_time('Y'); ?></h2>
        <?php /* If this is an author archive */ } elseif (is_author()) { ?>
            <h2>Author Archive</h2>
        <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
            <h2>Blog Archives</h2>
        <?php } ?>

        <?php while (have_posts()) : the_post(); ?>

            <h2>* <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
            <p>Posted on <?php the_time('F jS, Y') ?> by <?php the_author() ?>. Filed under <strong><?php the_category(', ') ?></strong>.</p>
            <div class="articles">
                <?php the_excerpt(); ?>
                <p><a href="<?php the_permalink() ?>" rel="bookmark">Continue reading...</a></p>
                <p class="showtags"><?php if (function_exists('the_tags')) the_tags(__('Tags: ','ml'), ', ', ''); ?>.</p><div class="count">&nbsp;&nbsp;&nbsp; <?php comments_popup_link('No Comments', '<span>(1)</span> Comment', '<span>(%)</span> Comments'); ?></div>
                <div style="clear: both;"> </div>
            </div>
            <!-- end content -->
        <?php endwhile; ?>

        <ul class="nav-timeline">
            <li class="prev"><?php next_posts_link('&laquo; Older Entries') ?></li>
            <li class="next"><?php previous_posts_link('Newer Entries &raquo;') ?></li> 
        </ul>

    <?php else : ?>

        <h2>Not Found</h2>
        <p>Sorry, but you are looking for something that isn't here.</p>

    <?php endif; ?>
</div></div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>