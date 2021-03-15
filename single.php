<?php get_header(); ?>
<!--------------this is the template for single blog posts----------->

    <div class="container single-postt">
        <?php if(has_post_thumbnail()):?><img class="single-postt-image" src="<?php the_post_thumbnail_url('smallest');?>"><?php endif;?>
        <?php if(have_posts()):while(have_posts()):the_post();?><h1><?php the_title();?></h1><?php the_content();endwhile;endif; ?>
    </div>

<?php get_footer(); ?>