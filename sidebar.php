
<div class="right">
<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>
<h2>Pages:</h2>
<ul>
<?php wp_list_pages('title_li='); ?>
</ul>

<h2>Categories:</h2>
<ul>
<?php wp_list_categories('title_li='); ?>
</ul>

<h2>Archives:</h2>
<ul>
<?php wp_get_archives('title_li='); ?>
</ul>

<?php endif; ?>
</div>
<div style="clear: both;"> </div>
</div>

