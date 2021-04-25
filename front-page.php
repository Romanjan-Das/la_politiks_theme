<?php get_header(); ?>
<?php $wp_content_url = site_url()."/wp-content/uploads/custom_img/";?>
<script>
    function moving_text_function(){
        
    var moving_text = document.getElementsByClassName("moving_text")[0];
    moving_text.style.width = moving_text.clientHeight / 3.8 * moving_text.innerHTML.length + "px";
    var root_ = document.querySelector(':root');
    root_.style.setProperty('--moving_text_100', '-' + moving_text.style.width);

    }
    setTimeout(() => {
        set_front_page_height();
    }, 100);
    function set_front_page_height(){
        var sfph= document.body.scrollHeight-300;
        if(window.innerWidth>window.innerHeight){
            document.getElementsByClassName("container")[0].style.height=sfph+"px";
        }
    }
    function set_image_path(){
        //console.log(document.getElementsByClassName("image-slideshow")[0].childNodes[1].childNodes);
        var sip_i=1;
        var sip_j=1;
        var sip_bool=false;
        if(window.innerHeight>window.innerWidth){
            sip_bool=true;
        }

        for(sip_j=1;sip_j<=Math.trunc(document.getElementsByClassName("image-slideshow")[0].childNodes[1].childNodes.length/2);sip_j++){
            if(sip_bool){
                document.getElementsByClassName("image-slideshow")[0].childNodes[1].childNodes[sip_i].src=document.getElementsByClassName("image-slideshow")[0].childNodes[1].childNodes[sip_i].src+"slideshow/images/slide("+sip_j+").jpg";
            }
            else{
                document.getElementsByClassName("image-slideshow")[0].childNodes[1].childNodes[sip_i].src=document.getElementsByClassName("image-slideshow")[0].childNodes[1].childNodes[sip_i].src+"slideshow/images_wide/slide("+sip_j+").jpg";
            }
            
            sip_i=sip_i+2;
        }
    }
    function load_on_image_load(){
        set_image_path();
        //set_front_page_height();
        moving_text_function();
    }
</script>
<img style="display:none;" src="<?php echo get_template_directory_uri(); ?>/images/dummy.svg" onload="load_on_image_load();" alt="">

<div class="container">

    <div class="the_slideshow_container">
        <!---------------(IMPORTANT!)to modify the slideshow please read all the comment lines---------------->
        <div class="image-slideshow">
            <div>
                <img src="<?php echo $wp_content_url; ?>" alt="">
                <img src="<?php echo $wp_content_url; ?>" alt="">
                <img src="<?php echo $wp_content_url; ?>" alt="">
                <img src="<?php echo $wp_content_url; ?>" alt="">
                <img src="<?php echo $wp_content_url; ?>" alt="">
            </div>
        </div>
    </div>
    <div class="image-slideshow-control-panel"></div>
    <script>
            var image_slideshow = document.getElementsByClassName("image-slideshow")[0];
            var image_slideshow_num = image_slideshow.childNodes[1].childNodes.length;
            var image_slideshow_holder = image_slideshow.childNodes[1];
            var image_slideshow_count = 1;
            var image_slideshow_px = -1;
            var image_slideshow_imgwidth = image_slideshow.clientWidth;
            var image_slideshow_imgsize;
            var image_slideshow_interval=3000;
            var image_slideshow_bool=true;
            var image_slideshow_width_change_status=true;
            

            var image_slideshow_timer = setInterval(image_slideshow_timer_function, image_slideshow_interval);

            function image_slideshow_timer_function(){
                if(image_slideshow_bool){
                    image_slideshow_control_initialise(); // to remove the control-panel just remove this line
                    image_slideshow_holder.style.transition = "all 500ms";
                    image_slideshow_touch_support(); // to remove touch support just remove this line
                    image_slideshow_bool=false;
                }
                if(image_slideshow_imgwidth != image_slideshow.clientWidth){
                    image_slideshow_width_change_status=true;
                }
                if(image_slideshow_width_change_status){
                    image_slideshow_imgwidth = image_slideshow.clientWidth;
                    for (image_slideshow_count = 1; image_slideshow_count < image_slideshow_num; image_slideshow_count = image_slideshow_count + 2) {
                        image_slideshow.childNodes[1].childNodes[image_slideshow_count].style.width = image_slideshow_imgwidth + "px";
                    }
                    image_slideshow_imgsize = image_slideshow.childNodes[1].childNodes[1].clientWidth;
                    image_slideshow_width_change_status=false;
                }
                image_slideshow_px++;
                if (image_slideshow_px >= (image_slideshow_num / 2) - 1) {
                    image_slideshow_px = 0;
                }
                image_slideshow_holder.style.transform = "translateX(-" + image_slideshow_px * image_slideshow_imgsize + "px)";
                image_slideshow_pointer_location(image_slideshow_px); //to remove the pointer just remove this line
                
            }

/* ------------------------------------------the code below is for the image-slideshow-control-panel -------------------------------------------*/
        var image_slideshow_control_num=Math.trunc(document.getElementsByClassName("image-slideshow")[0].childNodes[1].childNodes.length/2);
        var image_slideshow_control_i=1;
        var image_slideshow_control_pointer=[];
        var image_slideshow_control_inp;
        function image_slideshow_control_function(image_slideshow_control_inp){
            clearInterval(image_slideshow_timer);
            image_slideshow_px=image_slideshow_control_inp-1;
            image_slideshow_pointer_location(image_slideshow_px); //to remove the pointer update just remove this line <------ remember this !!!
            image_slideshow_holder.style.transform = "translateX(-" + image_slideshow_px * image_slideshow_imgsize + "px)";
            image_slideshow_timer = setInterval(image_slideshow_timer_function, image_slideshow_interval);
        }
        function image_slideshow_control_initialise(){
            for(image_slideshow_control_i=1;image_slideshow_control_i<=image_slideshow_control_num;image_slideshow_control_i++){
                document.getElementsByClassName("image-slideshow-control-panel")[0].innerHTML=document.getElementsByClassName("image-slideshow-control-panel")[0].innerHTML+"<div onclick=\"image_slideshow_control_function("+image_slideshow_control_i+")\">"+image_slideshow_control_i+"</div>";
            }
        }
/*--------------------------------------------the code below is for the image-slideshow-pointer-location-------------------------------------------*/
        var image_slideshow_pointer_pointer;
        var image_slideshow_pointer_memory=0;
        function image_slideshow_pointer_location(image_slideshow_pointer_pointer){
            document.getElementsByClassName("image-slideshow-control-panel")[0].childNodes[image_slideshow_pointer_memory].style.border="0px solid grey";
            image_slideshow_pointer_memory=image_slideshow_pointer_pointer;
            document.getElementsByClassName("image-slideshow-control-panel")[0].childNodes[image_slideshow_pointer_pointer].style.border="0.1em solid grey";
        }
/*--------------------------------------------the code below is for touch support----------------------------------------------------------------*/
        var image_slideshow_touchX=0;
        var image_slideshow_touchstatus=true;
        function image_slideshow_touch_support(){
            image_slideshow.addEventListener('touchstart',image_slideshow_touchstart,false);
            image_slideshow.addEventListener('touchmove',image_slideshow_touchmove,false);
            image_slideshow.addEventListener('touchend',image_slideshow_touchend,false);

        }
        function image_slideshow_touchstart(image_slideshow_event){
            image_slideshow_touchX=image_slideshow_event.touches[0].clientX;
        }
        function image_slideshow_touchend(){
            image_slideshow_touchstatus=true;
        }
        function image_slideshow_touchmove(image_slideshow_event){
            //image_slideshow_touchX = image_slideshow_event.touches[0].clientX;
            //console.log(image_slideshow_touchX);
            if((image_slideshow_event.touches[0].clientX>image_slideshow_touchX+image_slideshow_imgwidth/5)&&image_slideshow_touchstatus){
                if(image_slideshow_px==0){
                    image_slideshow_control_function(1);
                }
                else{
                    image_slideshow_control_function(image_slideshow_px);
                }
                image_slideshow_touchstatus=false;
            }
            if((image_slideshow_event.touches[0].clientX<image_slideshow_touchX-image_slideshow_imgwidth/5)&&image_slideshow_touchstatus){
                if(image_slideshow_px<Math.trunc(image_slideshow_num/2)-2){
                    image_slideshow_control_function(image_slideshow_px+2);
                }
                else if(image_slideshow_px==Math.trunc(image_slideshow_num/2)-2){
                    image_slideshow_control_function(Math.trunc(image_slideshow_num/2));
                }
                image_slideshow_touchstatus=false;
            }
        }
    </script>

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
        <div class="mImageCarousel">
            <div>
                <img src="<?php echo $wp_content_url; ?>carousel/slide(1).jpg" alt="">
                <img src="<?php echo $wp_content_url; ?>carousel/slide(2).jpg" alt="">
                <img src="<?php echo $wp_content_url; ?>carousel/slide(3).jpg" alt="">
                <img src="<?php echo $wp_content_url; ?>carousel/slide(4).jpg" alt="">
                <img src="<?php echo $wp_content_url; ?>carousel/slide(5).jpg" alt="">
                <img src="<?php echo $wp_content_url; ?>carousel/slide(6).jpg" alt="">
            </div>
        </div>
    </div>
    <!-------------------------------------------------------------------------------------------------------->

    <!-----
    <div class="separator"></div> ---->
    <div class="select_a_category">Select a category</div>
    <div class="category_selector">
        <form action="" method="get"><input class="category_select_value" type="text" name="category_value" id="" value=""><input class="cat_button" type="submit" value="All"></form>
        <form action="" method="get"><input class="category_select_value" type="text" name="category_value" id="" value="Faculty"><input class="cat_button" type="submit" value="Faculty"></form>
        <form action="" method="get"><input class="category_select_value" type="text" name="category_value" id="" value="Guest"><input class="cat_button" type="submit" value="Guest"></form>
        <form action="" method="get"><input class="category_select_value" type="text" name="category_value" id="" value="Students"><input class="cat_button" type="submit" value="Students"></form>
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