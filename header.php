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
    <div class="header_title">
        <img src="<?php echo get_template_directory_uri();?>/images/academic_logo_1.jpg" alt="">
        <div class="header_title_text"><div>La Politiks</div></div>
        <img src="<?php echo get_template_directory_uri();?>/images/academic_logo_2.jpg" alt="">
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