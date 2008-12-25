<?php get_header(); ?>
<div class="left"> 

<?php if (have_posts()) : ?>

        <h2>Search Results</h2>

<p>You searched for "<?php the_search_query() ?>". This is what we found:</p>

        <?php while (have_posts()) : the_post(); ?>
<h2>* <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<p>Posted on <?php the_time('F jS, Y') ?> by <?php the_author() ?>. Filed under <strong><?php the_category(', ') ?></strong>.</p>
<div class="articles">
</div>
<p class="showtags"><?php if (function_exists('the_tags')) the_tags(__('Tags: ','ml'), ', ', ''); ?>.</p><div class="count">&nbsp;&nbsp;&nbsp; <?php comments_popup_link('No Comments', '<span>(1)</span> Comment', '<span>(%)</span> Comments'); ?></div>
<div style="clear: both;"> </div>
    <!-- end content -->
        <?php endwhile; ?>

        <ul class="nav-timeline">
            <li class="prev"><?php next_posts_link('&laquo; Older Entries') ?></li>
            <li class="next"><?php previous_posts_link('Newer Entries &raquo;') ?></li>
        </ul>

    <?php else : ?>

        <h2>Nothing Found</h2>
        <p>Sorry, but you searched for something that isn't here.</p>
        <P>Maybe you can search again?</p>

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