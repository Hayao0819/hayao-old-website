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

SetCurrentPage();
//window.addEventListener("load", SetCurrentPage);


// メニュー開閉
function SwitchMenu (command){
    //var open = "";
    //var close = "";

    var menu = document.getElementById("bar-container");
    //var button = document.getElementById("open-sp-menu");

    function NemuClose() {
        //console.log("Close!")
        menu.classList.replace("show-menu", "hide-menu");
        //button.textContent = open;
    }

    function MenuOpen() {
        //console.log("Open!")
        menu.classList.replace("hide-menu", "show-menu");
        //button.textContent = close;
    }

    if (command){
        if(command == "open"){
            MenuOpen();
            return;
        }else if(command == "close"){
            NemuClose();
            return;
        }
    }
    if(menu.classList.contains("show-menu")){
        NemuClose();
    }else if(menu.classList.contains("hide-menu")){
        MenuOpen();
    }else{
        menu.classList.add("show-menu")
    }



}
document.getElementById("open-sp-menu").addEventListener("click", SwitchMenu);
document.getElementById("open-sp-menu").addEventListener("load", SwitchMenu);

// スマホで開いたときにメニュー用の幅を確保する
function SetSpMenu() {
    // スマホCSSが適用されてる場合の処理
    if (document.body.clientWidth < 799){
        $("#beforemain").css({
            paddingTop: $("header").outerHeight() + "px"
        })
        //$("#sidemenu-right").css({
        //    paddingTop: $("header").outerHeight() + "px"
        //})

    }else{
        $("#beforemain").css({
            paddingTop: 0
        })
    }
}
window.addEventListener("load", SetSpMenu);
window.addEventListener("resize", SetSpMenu);

// ボタン以外の場所が押されたらボタンを閉じる
window.addEventListener("load", function(){
    document.body.addEventListener("click", (e) => {
        if(! (e.target.closest("#header") || e.target.closest("#open-sp-menu") )&& document.getElementById("bar-container").classList.contains("show-menu") ){
            SwitchMenu("close");
        }
    })
})
