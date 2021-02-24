<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php wp_head(); ?>
    <style>
        /** For slideshow loading screen only **/
        .css_loader {
            border: 1vmin solid #f3f3f3;
            border-radius: 50%;
            border-top: 1vmin solid #3498db;
            width: 5vmin;
            height: 5vmin;
            margin: auto;
            padding: 0px;
            animation: spin 700ms linear infinite;
        }

        .css_helper{
            width: 50%;
            height: 40%;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<body <?php body_class(); ?>>
<header>
    <div class="header_title"><span>La Politiks</span><div class="nav_icon"></div></div>
    <?php
        wp_nav_menu(
            array(
                'theme_location'=>'top-menu',
                'menu_class'=>'navigation'
            )
        );
    ?>
</header>