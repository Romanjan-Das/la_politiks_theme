<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
    <?php $wp_content_url = site_url()."/wp-content/uploads/custom_img/";?>
    <div class="header_title">
        <img src="<?php echo $wp_content_url;?>logos/academic_logo_1.jpg" alt="">
        <div class="header_title_text"><div class="header_title_text_title"><?php bloginfo('name');?></div><div class="header_title_description"><?php bloginfo('description');?></div></div>
        
        <img src="<?php echo $wp_content_url;?>logos/academic_logo_2.jpg" alt="">
        <div class="nav_icon">
            <img src="<?php echo get_template_directory_uri();?>/images/hamburger_icon.svg" alt="">
        </div>
    </div>
    <?php
        wp_nav_menu(
            array(
                'theme_location'=>'top-menu',
                'menu_class'=>'navigation'
            )
        );
    ?>
</header>