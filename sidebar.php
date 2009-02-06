<div class="yui-b" id="sidebar">
<ul>
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

    <?php

    $widget_setup = array(
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
        );
    $options = $widget_setup;

	$options['before_widget'] = sprintf($widget_setup['before_widget'], '', 'tct_widget_rss');
    tct_widget_rss($options);
	$options['before_widget'] = sprintf($widget_setup['before_widget'], '', 'tct_widget_search');
    tct_widget_search($options);

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
</div>