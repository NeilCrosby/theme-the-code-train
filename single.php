<?php get_header(); ?>
<div class="left"> 

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<h2>* <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<p>Posted on <?php the_time('F jS, Y') ?> by <?php the_author() ?>. Filed under <strong><?php the_category(', ') ?></strong>.</p>
<div class="articles">
<?php the_content('Read the rest of this entry &raquo;'); ?>
<p class="showtags"><?php if (function_exists('the_tags')) the_tags(__('Tags: ','ml'), ', ', '<br>'); ?></p>
<div style="clear: both;"> </div>
</div>
    <!-- end content -->
    <?php comments_template(); ?>
        <?php endwhile; ?>

            

<?php else : ?>

        <h2>Not Found</h2>
        <p>Sorry, but you are looking for something that isn't here.</p>

    <?php endif; ?>
</div>

<!-- nomove sidebar -->
<div class="nomove"> 
<ul>
<li><a href="<?php bloginfo('rss2_url'); ?>"> RSS Entries</a></li>
<li><a href="<?php bloginfo('comments_rss2_url'); ?>" class="feed"> RSS Comments</a></li>
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