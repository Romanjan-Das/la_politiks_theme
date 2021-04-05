    var checkDimIntv;
    var slideWidth;
    var imageSlideshow;
    var slidesContainer;
    var numberOfSlides;
    var slideControls;
    var slideshowTimer;
    var slideNumber = 0;
    var slidePointers = [];
    var bodyClientWidth;
    var touchStartX=0;
    var touchmoveX=0;
    var touchStatusBool=true;
    var imgHoverStatus=[];
    var forSlidePointers="";
    var forSlidePointers2="";

    function checkDimensionChange(){
        if(bodyClientWidth != document.body.clientWidth){
            bodyClientWidth = document.body.clientWidth;
            resetTheDimensions();
        }
    }
    function slideshowInitialise(){
        console.log("slideshowinitialised is reached");
        imageSlideshow = document.getElementsByClassName("image_slideshow")[0];
        imageSlideshow.style.padding="0px";
        bodyClientWidth = document.body.clientWidth;
        checkDimIntv = setInterval(() => {
            checkDimensionChange();
        }, 500);
        imageSlideshow.style.overflow="hidden";
        slidesContainer = document.getElementsByClassName("slide_container")[0];
        numberOfSlides= document.getElementsByClassName("slides").length;
        for(i=0;i<numberOfSlides;i++){
            document.getElementsByClassName("slides")[i].style.margin="0px";
            document.getElementsByClassName("slides")[i].style.float="left";
        }
        slideControls = document.getElementsByClassName("slide_controls")[0];
        slideControls.style.padding="0px";
        slideControls.style.backgroundColor="white";
        slidesContainer.style.transition = "700ms";
        document.getElementsByClassName("slide_control_icon")[0].style.float = "left";
        document.getElementsByClassName("slide_control_icon")[1].style.float = "left";
        document.getElementsByClassName("slide_control_pointer_bar")[0].style.float = "left";
        document.getElementsByClassName("slide_control_icon_img")[0].style.float = "left";
        document.getElementsByClassName("slide_control_icon_img")[1].style.float = "left";

        for(i=0;i<numberOfSlides;i++){
            slidePointers[i] = document.createElement("div");
            slidePointers[i].className = "slide_pointers";
            document.getElementsByClassName("slide_control_pointer_container")[0].appendChild(slidePointers[i]); 
        }

        for(i=0;i<numberOfSlides;i++){
            document.getElementsByClassName("slide_pointers")[i].style.border = "1px solid gainsboro";
            document.getElementsByClassName("slide_pointers")[i].style.borderRadius = "50%";
            document.getElementsByClassName("slide_pointers")[i].style.float = "left";
            document.getElementsByClassName("slide_pointers")[i].id="slide_pointer_"+i;
            document.getElementsByClassName("slide_pointers")[i].setAttribute("onclick","gotoSlide(this);");
            forSlidePointers="document.getElementsByClassName(\"slide_pointers\")["+i+"].style.borderColor= \"slategrey\";"
            forSlidePointers2="document.getElementsByClassName(\"slide_pointers\")["+i+"].style.borderColor= \"gainsboro\";"
            document.getElementsByClassName("slide_pointers")[i].setAttribute("onmouseover",forSlidePointers);
            document.getElementsByClassName("slide_pointers")[i].setAttribute("onmouseout",forSlidePointers2);
        }
        

        document.getElementsByClassName("slide_control_pointer_container")[0].style.margin = "auto";
        document.getElementsByClassName("slide_control_pointer_container")[0].style.boxSizing = "border-box";

        for(i=0;i<numberOfSlides;i++){
            document.getElementsByClassName("slide_pointers")[i].style.backgroundColor = "white";
        }
        document.getElementsByClassName("slide_pointers")[0].style.backgroundColor = "gainsboro";
        resetTheDimensions();
        startsTheInterval();
        if(window.innerHeight<window.innerWidth){
            imageSlideshow.addEventListener("mouseover",clearsTheInterval,false);
            imageSlideshow.addEventListener("mouseout",startsTheInterval,false);
        }
        
        slidesContainer.setAttribute("ontouchstart","ontouchstartEvent(event);");
        slidesContainer.setAttribute("ontouchmove","ontouchmoveEvent(event);");
        slidesContainer.setAttribute("ontouchend","touchStatusBool=true;startsTheInterval();");
        document.getElementsByClassName("slide_control_icon")[0].addEventListener("click",prevSlide,false);
        document.getElementsByClassName("slide_control_icon")[1].addEventListener("click",nextSlide,false);
        document.getElementsByClassName("slide_control_icon_img")[0].style.opacity = "0.25";
        document.getElementsByClassName("slide_control_icon_img")[1].style.opacity = "0.25";
        imgHoverStatus[0]=document.getElementsByClassName("slide_control_icon")[0];
        imgHoverStatus[0].addEventListener("mouseover",function(){document.getElementsByClassName("slide_control_icon_img")[0].style.opacity = "1";},false);
        imgHoverStatus[0].addEventListener("mouseout",function(){document.getElementsByClassName("slide_control_icon_img")[0].style.opacity = "0.25";},false);
        imgHoverStatus[1]=document.getElementsByClassName("slide_control_icon")[1];
        imgHoverStatus[1].addEventListener("mouseover",function(){document.getElementsByClassName("slide_control_icon_img")[1].style.opacity = "1";},false);
        imgHoverStatus[1].addEventListener("mouseout",function(){document.getElementsByClassName("slide_control_icon_img")[1].style.opacity = "0.25";},false);
        document.getElementsByClassName("css_helper")[0].style.display="none";
        document.getElementsByClassName("css_loader")[0].style.display="none";
        document.getElementsByClassName("image_slideshow")[0].style.display="block";
    }
    function ontouchstartEvent(event){
        clearsTheInterval();
        touchStartX = event.touches[0].clientX;
    }
    function ontouchmoveEvent(event){
        if(touchStartX-event.touches[0].clientX>slideWidth/5 && touchStatusBool){
            if(slideNumber!=numberOfSlides-1){
                nextSlide();
            }
            touchStatusBool = false;
        }
        if(event.touches[0].clientX-touchStartX>slideWidth/5 && touchStatusBool){
            if(slideNumber!=0){
                prevSlide();
            }
            touchStatusBool = false;
        }
    }
    function clearsTheInterval(){
        clearInterval(slideshowTimer);
    }
    function startsTheInterval(){
        slideshowTimer = setInterval(() => {
            slideNumber++;
            if(slideNumber>numberOfSlides-1){
                slideNumber=0;
            }
            slidesContainer.style.transform="translateX(-"+slideWidth*slideNumber+"px)";
            for(i=0;i<numberOfSlides;i++){
                document.getElementsByClassName("slide_pointers")[i].style.backgroundColor = "white";
            }
            document.getElementsByClassName("slide_pointers")[slideNumber].style.backgroundColor = "gainsboro";
        }, 3000);
    }
    function nextSlide(){
        slideNumber++;
            if(slideNumber>numberOfSlides-1){
                slideNumber=0;
            }
        slidesContainer.style.transform="translateX(-"+slideWidth*slideNumber+"px)";
            for(i=0;i<numberOfSlides;i++){
                document.getElementsByClassName("slide_pointers")[i].style.backgroundColor = "white";
            }
            document.getElementsByClassName("slide_pointers")[slideNumber].style.backgroundColor = "gainsboro";
    }
    function prevSlide(){
        slideNumber=slideNumber-1;
            if(slideNumber<0){
                slideNumber=numberOfSlides-1;
            }
        slidesContainer.style.transform="translateX(-"+slideWidth*slideNumber+"px)";
            for(i=0;i<numberOfSlides;i++){
                document.getElementsByClassName("slide_pointers")[i].style.backgroundColor = "white";
            }
            document.getElementsByClassName("slide_pointers")[slideNumber].style.backgroundColor = "gainsboro";
    }
    function gotoSlide(x){
        var str = x.id;
        str = str.slice(14,str.length);
        slideNumber=parseInt(str);
        slidesContainer.style.transform="translateX(-"+slideWidth*slideNumber+"px)";
            for(i=0;i<numberOfSlides;i++){
                document.getElementsByClassName("slide_pointers")[i].style.backgroundColor = "white";
            }
            document.getElementsByClassName("slide_pointers")[slideNumber].style.backgroundColor = "gainsboro";
    }
    function resetTheDimensions(){
        slideWidth = document.getElementsByClassName("image_slideshow")[0].parentElement.clientWidth;
        imageSlideshow.style.width=slideWidth+"px";
        imageSlideshow.style.height = slideWidth*7/10 + "px";
        slidesContainer.style.height=slideWidth*6/10+"px";
        slidesContainer.style.width=(numberOfSlides*slideWidth+1)+"px";
        for(i=0;i<numberOfSlides;i++){
            document.getElementsByClassName("slides")[i].style.width=slideWidth+"px";
            document.getElementsByClassName("slides")[i].style.height=slideWidth*6/10+"px";
        }
        slideControls.style.height=slideWidth/10+"px";
        slideControls.style.width=slideWidth+"px";
        document.getElementsByClassName("slide_control_icon")[0].style.width = slideWidth/10+"px";
        document.getElementsByClassName("slide_control_icon")[0].style.height = slideWidth/10+"px";

        document.getElementsByClassName("slide_control_icon")[1].style.width = slideWidth/10+"px";
        document.getElementsByClassName("slide_control_icon")[1].style.height = slideWidth/10+"px";

        document.getElementsByClassName("slide_control_pointer_bar")[0].style.width = (slideWidth - slideWidth/5)+"px";
        document.getElementsByClassName("slide_control_pointer_bar")[0].style.height = slideWidth/10+"px";
        
        document.getElementsByClassName("slide_control_icon_img")[0].style.width = slideWidth/20+"px";
        document.getElementsByClassName("slide_control_icon_img")[0].style.height = slideWidth/20+"px";
        document.getElementsByClassName("slide_control_icon_img")[0].style.margin = slideWidth/40+"px";
        document.getElementsByClassName("slide_control_icon_img")[1].style.width = slideWidth/20+"px";
        document.getElementsByClassName("slide_control_icon_img")[1].style.height = slideWidth/20+"px";
        document.getElementsByClassName("slide_control_icon_img")[1].style.margin = slideWidth/40+"px";

        for(i=0;i<numberOfSlides;i++){
            document.getElementsByClassName("slide_pointers")[i].style.width = slideWidth/25+"px";
            document.getElementsByClassName("slide_pointers")[i].style.height = slideWidth/25+"px";
            document.getElementsByClassName("slide_pointers")[i].style.marginLeft = slideWidth/50+"px";
        }
        
        //document.getElementsByClassName("slide_control_pointer_container")[0].style.width = (slideWidth/16 + slideWidth/50)*numberOfSlides+"px";
        document.getElementsByClassName("slide_control_pointer_container")[0].style.marginLeft= (((slideWidth - slideWidth/5)-(slideWidth/25 + slideWidth/50)*numberOfSlides)/2 - slideWidth/50)+"px";
        document.getElementsByClassName("slide_control_pointer_container")[0].style.height = slideWidth/10+"px";     
        document.getElementsByClassName("slide_control_pointer_container")[0].style.paddingTop = (slideWidth/11 - slideWidth/25)/2+"px";

        slidesContainer.style.transform="translateX(-"+slideWidth*slideNumber+"px)";
    }
