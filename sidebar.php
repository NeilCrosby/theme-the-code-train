
<ul class="right">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

    <?php

    $widget_setup = array(
        'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
        );

    tct_widget_rss($widget_setup);
    tct_widget_search($widget_setup);

    ?>

    <li>
        <h2>Pages:</h2>
        <ul>
            <?php wp_list_pages('title_li='); ?>
        </ul>
    </li>
    <li>
        <h2>Categories:</h2>
        <ul>
            <?php wp_list_categories('title_li='); ?>
        </ul>
    </li>
    <li>
        <h2>Archives:</h2>
        <ul>
            <?php wp_get_archives('title_li='); ?>
        </ul>
    </li>

    <?php endif; ?>
</ul>
