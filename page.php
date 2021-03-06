<?php get_header(); ?>
<div id="yui-main">
    <div class="yui-b"> 

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div class="entry">
            <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
            <p>
                Posted on <?php the_time('F jS, Y') ?> by <?php the_author() ?>.
            </p>
            <div class="articles">
                <?php the_content('Read the rest of this entry &raquo;'); ?>
                <div style="clear: both;"> </div>
            </div>

            <?php comments_template(); ?>

        </div>

    <?php endwhile; ?>

    <?php else : ?>

        <h2>Not Found</h2>
        <p>Sorry, but you are looking for something that isn't here.</p>

    <?php endif; ?>

    </div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>