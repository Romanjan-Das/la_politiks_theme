<?php get_header(); ?>
<!--------------this is the template for pages ie linked pages in navigation bar----------->

    <div class="container individual-page">
        <?php if(have_posts()):while(have_posts()):the_post();?><div class="individual-page-title"><?php the_title();?></div><?php the_content();endwhile;endif; ?>
    </div>

<?php get_footer(); ?>