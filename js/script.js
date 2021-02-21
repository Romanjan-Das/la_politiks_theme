/*
window.onload=function(){
    alert("document is loaded.");
}
*/

window.onload=function(){
    var nav_icon = document.getElementsByClassName("nav_icon")[0];
    nav_icon.addEventListener("click",expand_nav_menu);    
}
var nav_menu_status = false;
function expand_nav_menu(){
    var header = document.getElementsByTagName("header")[0];
    if(!nav_menu_status){
        header.style.height="auto"; 
        nav_menu_status = true;  
    }
    else if(nav_menu_status){
        header.style.height="3.1rem"; 
        nav_menu_status = false;
    }
     
}