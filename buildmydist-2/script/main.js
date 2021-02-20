window.addEventListener("load", function(){
    var target = $("main, #sidemenu-right");
    target.wrapAll("<div id=\"main-container\">")
})

// https://github.com/imgix/luminous
// https://wemo.tech/1169
var Enable_Luminous = false;

window.addEventListener("load", function(){
    if (Enable_Luminous == true){
        Array.from(document.getElementsByTagName("img")).forEach(element =>{
            element.outerHTML = `<a href="${element.src}" class="luminous">` + element.outerHTML + "</a>"
        })

        Array.from(document.getElementsByClassName("luminous")).forEach(element =>{
            if( element !== null ) {
                new Luminous(element);
            }
        })
    }
})

windoow.addEventListener("load", function(){Array.from(document.getElementsByClassName("hoge")).forEach(element =>{console.log(element);});});