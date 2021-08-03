// 最初にのみログを表示する
window.addEventListener("load", ()=>{
    console.log(CurrentPlayer + "でゲームをスタートします")
})

// ボックスがクリックされたときの処理
// init.jsでボタンがクリックされた場合にClickedBox関数を実行するように指示している
const ClickedBox = (e) => {
    const MySelf = e.path[0] // クリックされたボックスを取得する

    if (! GameEnded){ //もしゲームの状態が「終了」でなければ

        if (MySelf.dataset.clicked != "true"){
            // クリックされたボックスの設定
            MySelf.innerText = PlayerMarks[CurrentPlayer]; //クリックされたボックスのテキストをクリックしたプレーヤーの記号にする
            MySelf.dataset.clicked = "true"; //ボックスの状態を「クリック済み」にする
            MySelf.dataset.player  = CurrentPlayer; // チェックしたプレーヤーのIDをボックスに書き込む

            // プレイヤーを変更する
            ChangePlayer();

            // 勝利判定を行う
            Judgement();

            // すべてチェックされた場合の処理
            CheckedBox++;
            if (CheckedBox == TableXNumber * TableYNumber){  // もしチェックされた数とマス目の数が等しいならば
                Msg.innerText = "終了" // メッセージに終了と表示
                GameEnded = true; // ゲームの状態を「終了」にする
            }
        }else{
            console.log("既にクリックされています")
        }
    }
}

// プレーヤーを変更する処理
const ChangePlayer = () => {
    if (CurrentPlayer == PlayerNumer - 1){ // 今のプレーヤーが最後だったら
        CurrentPlayer = 0; //最初のプレーヤーに戻る
    }else{
        CurrentPlayer++; //次のプレーヤーにする
    }
    console.log("現在のプレイヤーは" + CurrentPlayer + "です") //ログを表示する
}


