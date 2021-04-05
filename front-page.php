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
                <div class="slide_control_icon"><img class="slide_control_icon_img"
                        src="<?php echo get_template_directory_uri(); ?>/images/slide_left_img.svg" alt=""></div>
                <div class="slide_control_pointer_bar">
                    <div class="slide_control_pointer_container">
                    </div>
                </div>
                <div class="slide_control_icon"><img class="slide_control_icon_img"
                        src="<?php echo get_template_directory_uri(); ?>/images/slide_right_img.svg" alt=""></div>
            </div>
        </div>
        <!---------------------------------------------------------------------------------------------------->

    </div>

    <div class="separator"></div>


    <!------------------------------------------------------------------------------------------------------>
    <div class="moving_text_container">
        <div class="moving_text">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
        </div>
    </div>
    <!------------------------------------------------------------------------------------------------------>

    <div class="separator"></div>
    
    <!------------------------------------------------------------------------------------------------------>
    <div class="image_carousel_container">
        <div class="image_carousel">
            <div>
                <div><img src="<?php echo get_template_directory_uri(); ?>/images/slide(1).jpg" alt="">
                    <div>Lorem Ipsum is simply dummy text</div>
                </div>
                <div><img src="<?php echo get_template_directory_uri(); ?>/images/slide(2).jpg" alt="">
                    <div>Lorem Ipsum is simply dummy text</div>
                </div>
                <div><img src="<?php echo get_template_directory_uri(); ?>/images/slide(3).jpg" alt="">
                    <div>Lorem Ipsum is simply dummy text</div>
                </div>
                <div><img src="<?php echo get_template_directory_uri(); ?>/images/slide(4).jpg" alt="">
                    <div>Lorem Ipsum is simply dummy text</div>
                </div>
                <div><img src="<?php echo get_template_directory_uri(); ?>/images/slide(5).jpg" alt="">
                    <div>Lorem Ipsum is simply dummy text</div>
                </div>
                <div><img src="<?php echo get_template_directory_uri(); ?>/images/slide(6).jpg" alt="">
                    <div>Lorem Ipsum is simply dummy text</div>
                </div>
            </div>
        </div>
    </div>
    <!-------------------------------------------------------------------------------------------------------->


    <div class="separator"></div>
    <div class="category_selector">
        <form action="" method="get"><input class="category_select_value" type="text" name="category_value" id="" value=""><input type="submit" value="All"></form>
        <form action="" method="get"><input class="category_select_value" type="text" name="category_value" id="" value="Faculty"><input type="submit" value="Faculty"></form>
        <form action="" method="get"><input class="category_select_value" type="text" name="category_value" id="" value="Guest"><input type="submit" value="Guest"></form>
        <form action="" method="get"><input class="category_select_value" type="text" name="category_value" id="" value="Students"><input type="submit" value="Students"></form>
    </div>
    <div class="separator"></div>
    <?php
    $category_name='Guest';
    if($_SERVER['REQUEST_METHOD']=='GET'){
        $category_name=$_GET['category_value'];
    }
    ?>
    <?php
    $args = array(
        'post_type'=>'post',
        'post_status'=>'publish',
        'category_name'=>$category_name,
    );
    $the_query=new WP_Query($args);

    ?>

    <?php if($the_query->have_posts()):
            while($the_query->have_posts()):
            $the_query->the_post();?>
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