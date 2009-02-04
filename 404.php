<?php get_header(); ?>


<h2>* Not Found</h2>
<p>Sorry, but you are looking for something that isn't here.</p>


<!-- nomove sidebar -->
<div class="nomove"> 
    <?php tct_widget_rss(); ?>

    <h2>Search:</h2>
    <div id="search">
        <form id="searchform" method="get" action="<?php bloginfo('url'); ?>/">
            <fieldset>
                <legend>Search:</legend>
                <input type="text" name="s" id="s" size="15" value="Type and Enter" onblur="if (this.value == '') {this.value = 'Type and Enter';}" onfocus="if (this.value == 'Type and Enter') {this.value = '';}">
                <input type="submit" id="x" value="Search">
            </fieldset>
        </form>
    </div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>