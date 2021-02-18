function FooterBlank(){
    $("#footerblank").css({
        paddingBottom: $("footer").outerHeight() + "px",
    });
    console.log($("footer").outerHeight() + "px")
}

window.addEventListener("load", FooterBlank);
window.addEventListener("resize", FooterBlank);
