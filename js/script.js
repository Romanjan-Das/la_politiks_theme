/// there could be only one window.onload event
window.onload = function () {
    var nav_icon = document.getElementsByClassName("nav_icon")[0];
    nav_icon.addEventListener("click", expand_nav_menu);
    slideshowInitialise();

    var moving_text = document.getElementsByClassName("moving_text")[0];
    moving_text.style.width = moving_text.clientHeight / 3.8 * moving_text.innerHTML.length + "px";
    var root_ = document.querySelector(':root');
    root_.style.setProperty('--moving_text_100', '-' + moving_text.style.width);
}

var nav_menu_status = false;
function expand_nav_menu() {
    var header = document.getElementsByTagName("header")[0];
    if (!nav_menu_status) {
        header.style.height = "auto";
        nav_menu_status = true;
    }
    else if (nav_menu_status) {
        header.style.height = "3.1rem";
        nav_menu_status = false;
    }

}