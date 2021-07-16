// ハンバーガーメニューの実装

MenuButton.addEventListener("click", (e) => {
    const ClassHidden = Array.from(Menu.classList).find(value => value.match(/hidden/g));
    const Open = ()=> {
        console.log("Open");
        Menu.classList.remove(ClassHidden);
        Menu.classList.add("block");
    }
    const Close = () =>{
        console.log("Close");
        Menu.classList.add("hidden");
        Menu.classList.remove("block");
    }
    if (ClassHidden != undefined){
        Open();
    }else{
        Close()
    }
});

// メニュー外クリックで閉じる
Main.addEventListener("click", function(){
    const ClassHidden = Array.from(Menu.classList).find(value => value.match(/hidden/g));
    if (ClassHidden == undefined){
        console.log("Close");
        Menu.classList.add("hidden");
        Menu.classList.remove("block");
    }
})

