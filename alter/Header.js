//ヘッダー固定
if (FixedHeader){
    Array.from(document.getElementsByTagName("header")).forEach((element) =>{
        element.classList.add("fixed")
    })
}

// ヘッダーの高さ確保
const SetHeaderSpace = () =>{
    const Header = document.getElementsByTagName("header")[0];
    const Main   = document.getElementById("main");
    Main.style.paddingTop = "calc(" + Header.clientHeight + "px + 1rem)";
};
if (FixedHeader){
    window.addEventListener("resize", SetHeaderSpace);
    window.addEventListener("load", SetHeaderSpace);
}

// ダウンロードリンクをヘッダーまで広げる
window.addEventListener("load", (element)=>{
    Array.from(Menu.getElementsByTagName("li")).forEach(e=>{
        e.addEventListener ("click", ()=>{
            location.href = e.getElementsByTagName("a")[0].href;
        })
        e.classList.add("cursor-pointer");
    });
});

