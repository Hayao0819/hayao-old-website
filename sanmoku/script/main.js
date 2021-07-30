const ClickedBox = (e) => {
    const MySelf = e.path[0]

    if (! GameEnded){

        if (MySelf.dataset.clicked != "true"){
            // クリックされたボックスの設定
            MySelf.innerText = PlayerMarks[CurrentPlayer];
            MySelf.dataset.clicked = "true";

            // プレイヤーを変更する
            ChangePlayer();

            // すべてチェックされた場合の処理
            CheckedBox++;
            if (CheckedBox == TableXNumber * TableYNumber){
                Msg.innerText = "終了"
                GameEnded = true;
            }
        }else{
            console.log("既にクリックされています")
        }
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
