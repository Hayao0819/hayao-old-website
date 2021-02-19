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
function SwitchMenu (){
    var open = "";
    var close = "";

    var menu = document.getElementById("bar-container");
    var button = document.getElementById("open-sp-menu");

    if(menu.classList.contains("show-menu")){
        menu.classList.replace("show-menu", "hide-menu");
        button.textContent = open;
    }else if(menu.classList.contains("hide-menu")){
        menu.classList.replace("hide-menu", "show-menu");
        button.textContent = close;
    }else{
        menu.classList.add("show-menu")
        button.textContent = open;
    }
}
document.getElementById("open-sp-menu").addEventListener("click", SwitchMenu);
document.getElementById("open-sp-menu").addEventListener("load", SwitchMenu);
