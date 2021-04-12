/// there could be only one window.onload event
window.onload = function () {
    var nav_icon = document.getElementsByClassName("nav_icon")[0];
    nav_icon.addEventListener("click", expand_nav_menu);
}

var nav_menu_status = false;
function expand_nav_menu() {
    var header = document.getElementsByTagName("header")[0];
    if (!nav_menu_status) {
        header.style.height = "auto";
        nav_menu_status = true;
    }
    else if (nav_menu_status) {
        header.style.height = "15vw";
        nav_menu_status = false;
    }

}