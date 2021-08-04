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

            // 現在の情報を更新する
            UpdateCurrentConfig();

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

// 現在の設定を表示する
const UpdateCurrentConfig = () => {
    // ゲーム設定を表示
    let p1 = document.createElement("p") //ゲーム設定を表示する枠を作成
    p1.innerText = `横: ${TableXNumber} 縦: ${TableYNumber}` // テキストを設定

    // プレーヤー情報を表示
    let p2 = document.createElement("p") // プレーヤー情報を表示する枠を作成
    p2.innerText = `人数: ${PlayerNumer}人 現在: ${PlayerMarks[CurrentPlayer]}`

    // 作成した枠を文書に挿入
    CurrentConfig.innerHTML = null; // 枠の中の文書を削除
    CurrentConfig.appendChild(p1);  // ゲーム設定を挿入
    CurrentConfig.appendChild(p2);  // プレーヤー情報を挿入


}
window.addEventListener("load", UpdateCurrentConfig)
