<?php wp_footer(); ?>
<div id="colophon">
    <?php
        wp_nav_menu(
            array(
                'theme_location'=>'footer-menu',
                'menu_class'=>'footer-navigation'
            )
        );
    ?>
    <?php
        wp_nav_menu(
            array(
                'theme_location'=>'social',
                'menu_class'=>'social-icons'
            )
        );
    ?>
    <div class="footer-copyright">&#169; All rights reserved by Republika,ARSD Political Dept.</div>
</div>
</body>
</html>