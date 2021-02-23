window.addEventListener("scroll", function(){
    var scroll_up_button = document.getElementById("scroll-up");
    if (window.pageYOffset < 400){
        scroll_up_button.style.display = "none";
    }else{
        scroll_up_button.style.display = "inline";
    }
})
