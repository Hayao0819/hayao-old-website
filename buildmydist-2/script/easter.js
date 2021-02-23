window.addEventListener("load", function(){
    var url = new URL(location.href)
    if (url.pathname.split("/")[3] == "misc"){
        document.getElementById("counter").addEventListener("click", function(){
            if(localStorage.getItem("TopWarningHide") != "true"){
                location.href = "http://www.lucky-ch.com/";
            }
        })
    }
})
