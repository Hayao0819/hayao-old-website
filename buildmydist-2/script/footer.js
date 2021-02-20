function FooterBlank(){
    $("#footerblank").css({
        paddingBottom: $("footer").outerHeight() + "px"
    });

    $("#scroll-up").css({
        paddingBottom: $("footer").outerHeight() + "px"
    })

    $("#sidemenu-right").css({
        paddingBottom: $("footer").outerHeight() + "px"
    })

    document.getElementById("scroll-up").addEventListener("click", function(){
        //$("body, html").scrollTop(0);
        $('body, html').animate({scrollTop: 0}, 300, 'swing');
    })
}

window.addEventListener("load", FooterBlank);
window.addEventListener("resize", FooterBlank);
