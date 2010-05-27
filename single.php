<?php get_header(); ?>
<div id="yui-main">
    <div class="yui-b"> 

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div class="entry">

            <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
            <p>
                Posted on <?php the_time('F jS, Y') ?> by <?php the_author() ?>. 
                Filed under <strong><?php the_category(', ') ?></strong>.
            </p>
            <div class="articles">


                <?php
                $permalink = get_permalink();
                $seriesTag = get_post_meta($post->ID, 'series_tag', true);
                if ($seriesTag) :
                    $seriesPosts = get_posts(array(
                        'tag'     => $seriesTag,
                        'orderby' => 'date',
                        'order'   => 'ASC'
                    ));
                    if ($seriesPosts) :
                        $tempPost = $post;
                ?>

                <div class="series">
                    <h2>This post is part of a series:</h2>
                    <ol>
                    <?php foreach($seriesPosts as $post): ?>
                        <li>
                            <?php if ($permalink === get_permalink()) { 
                                the_title();
                            } else { ?>
                                <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                            <?php } ?>
                        </li>
                    <?php endforeach; ?>
                    </ol>
                </div>

                <?php
                        $post = $tempPost;
                    endif;
                endif;
                ?>

                <?php the_content('Read the rest of this entry &raquo;'); ?>
                <p class="showtags">
                    <?php if (function_exists('the_tags')) the_tags(__('Tags: ','ml'), ', ', '<br>'); ?>
                </p>
                <p class="begging">
                    If you enjoyed this post, 
                    <a href="/feed/">subscribe to The Code Train</a>
                    and read more when I write more.
                </p>
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