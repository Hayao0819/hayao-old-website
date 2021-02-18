

function SetCurrentPage(){
    var distroBar = document.getElementById("bar-container");
    //var barItemCount = distroBar.childElementCount;
    var barItemList = distroBar.children
    Array.from(barItemList).forEach(element => {
        if (element.dataset.pagename == distro ){
            element.classList.add("currentdistro");
        }
    });
}

window.addEventListener("load", SetCurrentPage);