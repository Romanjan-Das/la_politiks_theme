<?php get_header(); ?>
<div class="container">
    <div class="the_slideshow_container">

        <!----------------------------------------------Slideshow------------------------------------------------------------------------->
        <!---Put the slideshow inside a div with predefined dimensions,slideshows dimensions depend on the parent width only-------------->
        <!---Only one slideshow can be added,and add the slideshowinitialise function to body onload-------------------------------------->
        <!---Copy the script to the head and place the icon images to the images folder--------------------------------------------------->
        <div class="css_helper"></div>
        <div class="css_loader"></div>
        <div class="image_slideshow" style="display:none;">
            <div class="slide_container">
                <img class="slides" src="<?php echo get_template_directory_uri(); ?>/images/slide(1).jpg" alt="">
                <img class="slides" src="<?php echo get_template_directory_uri(); ?>/images/slide(2).jpg" alt="">
                <img class="slides" src="<?php echo get_template_directory_uri(); ?>/images/slide(3).jpg" alt="">
                <img class="slides" src="<?php echo get_template_directory_uri(); ?>/images/slide(4).jpg" alt="">
                <img class="slides" src="<?php echo get_template_directory_uri(); ?>/images/slide(5).jpg" alt="">
            </div>
            <div class="slide_controls">
                <div class="slide_control_icon"><img class="slide_control_icon_img" src="<?php echo get_template_directory_uri(); ?>/images/slide_left_img.svg"
                        alt=""></div>
                <div class="slide_control_pointer_bar">
                    <div class="slide_control_pointer_container">
                    </div>
                </div>
                <div class="slide_control_icon"><img class="slide_control_icon_img" src="<?php echo get_template_directory_uri(); ?>/images/slide_right_img.svg"
                        alt=""></div>
            </div>
        </div>
        <!---------------------------------------------------------------------------------------------------->

    </div>

    <?php if(have_posts()):
            while(have_posts()):
            the_post();?>
    <a href="<?php the_permalink();?>">
        <div class="front-page-posts">
            <img src="<?php if(has_post_thumbnail()):the_post_thumbnail_url(); endif;?>" alt="">
            <div class="front-page-post-title">
                <?php the_title();?>
            </div>
            <div class="front-page-post-excerpt">
                <?php the_excerpt();?>
            </div>

        </div>
    </a>
    <?php endwhile;endif; ?>
</div>

<?php get_footer(); ?>