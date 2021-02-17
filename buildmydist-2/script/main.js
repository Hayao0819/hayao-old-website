// 高さを設定
/* 
function SetMainHeight(){
    // ヘッダー高さ
    //HeaderHeight = document.getElementsByTagName("header")[0].clientHeight;
    var HeaderHeight = $('header').outerHeight(true);
    //console.log(HeaderHeight);

    // フッター高さ
    //FooterHeight = document.getElementsByTagName("footer")[0].clientHeight;
    var FooterHeight = $('footer').outerHeight(true);
    //console.log(FooterHeight);

    // ウィンドウ高さ
    var BodyHeight = window.innerHeight;
    //console.log(BodyHeight);

    // mainのpaddingとmargin
    var MainMargin = parseFloat($("main").css("margin")) * 2;
    var MainPadding = parseFloat($("main").css("padding")) * 2;

    // 設定
    document.getElementsByTagName("main")[0].style.height = BodyHeight - FooterHeight - HeaderHeight - MainMargin - MainPadding + "px";
}
*/

function SetMainHeight(){
    var $ftr = $('footer');
    if( window.innerHeight > $ftr.offset().top + $ftr.outerHeight() ){
         //$ftr.attr({'style': 'position:fixed; top:' + (window.innerHeight - $ftr.outerHeight()) + 'px;' });
         $ftr.css("position", "fixed");
         $ftr.css("top", (window.innerHeight - $ftr.outerHeight()) + "px" );
    }
}
window.addEventListener("resize", SetMainHeight, false);
window.addEventListener("load", SetMainHeight, false);
