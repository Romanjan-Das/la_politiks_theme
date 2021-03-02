/// there could be only one window.onload event
window.onload = function () {
    var nav_icon = document.getElementsByClassName("nav_icon")[0];
    nav_icon.addEventListener("click", expand_nav_menu);
    slideshowInitialise();

    var moving_text = document.getElementsByClassName("moving_text")[0];
    moving_text.style.width = moving_text.clientHeight / 3.8 * moving_text.innerHTML.length + "px";
    var root_ = document.querySelector(':root');
    root_.style.setProperty('--moving_text_100', '-' + moving_text.style.width);


    
    var total_length_of_image_carousel=0;
    for(i=0;i<document.getElementsByClassName("image_carousel")[0].childNodes[1].childNodes.length;i++){
        if(i%2){
            total_length_of_image_carousel = total_length_of_image_carousel + document.getElementsByClassName("image_carousel")[0].childNodes[1].childNodes[i].clientWidth + document.getElementsByClassName("image_carousel")[0].childNodes[1].childNodes[i].clientWidth*0.02;
        }
    }
    total_length_of_image_carousel = parseInt(total_length_of_image_carousel);
    document.getElementsByClassName("image_carousel")[0].childNodes[1].style.width=total_length_of_image_carousel+"px";
}

var nav_menu_status = false;
function expand_nav_menu() {
    var header = document.getElementsByTagName("header")[0];
    if (!nav_menu_status) {
        document.getElementsByClassName("the_slideshow_container")[0].style.zIndex=-1;
        document.getElementsByClassName("moving_text_container")[0].style.zIndex=-1;
        document.getElementsByClassName("image_carousel_container")[0].style.zIndex=-1;
        header.style.height = "auto";
        nav_menu_status = true;
    }
    else if (nav_menu_status) {
        document.getElementsByClassName("the_slideshow_container")[0].style.zIndex=0;
        document.getElementsByClassName("moving_text_container")[0].style.zIndex=0;
        document.getElementsByClassName("image_carousel_container")[0].style.zIndex=0;
        header.style.height = "3.1rem";
        nav_menu_status = false;
    }

}