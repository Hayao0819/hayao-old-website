// 現在のページ
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


// メニュー開閉
document.getElementById("open-sp-menu").addEventListener("click", function(){
    console.log("実行された")
    var menu = document.getElementById("bar-container");
    if(menu.classList.contains("show-menu")){
        menu.classList.replace("show-menu", "hide-menu");
    }else if(menu.classList.contains("hide-menu")){
        menu.classList.replace("hide-menu", "show-menu");
    }else{
        menu.classList.add("show-menu")
    }
})