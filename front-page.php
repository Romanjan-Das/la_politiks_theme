<?php get_header(); ?>

    <div class="container">
        <?php if(have_posts()):
            while(have_posts()):
            the_post();?>
            <a href="<?php the_permalink();?>">
            <div class="front-page-posts">
            <img src="<?php if(has_post_thumbnail()):the_post_thumbnail_url(); endif;?>" alt="">
            <div class="front-page-post-title"><?php the_title();?></div>
            <div class="front-page-post-excerpt"><?php the_excerpt();?></div>
        
        </div></a><?php endwhile;endif; ?>
    </div>

<?php get_footer(); ?>