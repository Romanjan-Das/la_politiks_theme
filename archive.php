<?php get_header(); ?>
<!--------------this is the template for archive page----------->
<?php single_cat_title();?>
    <div class="container">
        <?php if(have_posts()):while(have_posts()):the_post();the_title();the_excerpt();endwhile;endif; ?>
    </div>

<?php get_footer(); ?>