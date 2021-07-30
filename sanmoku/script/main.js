const ClickedBox = (e) => {
    const MySelf = e.path[0]

    if (MySelf.dataset.clicked != "true"){
        //MySelf.innerText = "Clicked";
        MySelf.innerText = PlayerMarks[CurrentPlayer];
        MySelf.dataset.clicked = "true";
        CheckedBox++;
        ChangePlayer();
    }else{
        console.log("既にクリックされています")
    }
    
}

const ChangePlayer = () => {
    if (CurrentPlayer == PlayerNumer - 1){
        CurrentPlayer = 0;
    }else{
        CurrentPlayer++;
    }
    console.log("現在のプレイヤーは" + CurrentPlayer + "です")
}

window.addEventListener("load", ()=>{
    console.log(CurrentPlayer + "でゲームをスタートします")
})
