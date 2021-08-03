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

// 最初にのみログを表示する
window.addEventListener("load", ()=>{
    console.log(CurrentPlayer + "でゲームをスタートします")
})

// 配列の重複した値が指定回数以上ならTrueを返す
// 使い方: CountArrayValue(配列, 回数)
// 参考: https://teratail.com/questions/98451
const CountArrayValue = (array, count) => {
    // あとで実装する
}

// 勝敗の判定 ジャッジメントですの！
const Judgement = () => {
    // プレーヤーごとに判定
    // プレーヤーIDでループし、変数pに今チェック対象のプレーヤーIDが代入される
    for (p=0; p < PlayerNumer; p++){
        // チェックしたプレーヤーのIDが書き込まれたボックスの一覧を取得
        const elements = Array.from(MainTable.querySelectorAll("[data-player]"));

        // 今チェック中のプレーヤーのチェックしたボックスの座標
        CheckedByCurrentPlayerX = [];
        CheckedByCurrentPlayerY = [];

        // 上で取得したボックスの一覧1つ1つで確認処理を行う
        elements.forEach((e) => {

            if (e.dataset.player == p){ // もしいま確認しているボックスが今確認しているプレーヤーIDと一致したら

                // チェックされているボックスの座標を座標リストに追加する
                CheckedByCurrentPlayerX.push(e.dataset.x);
                CheckedByCurrentPlayerY.push(e.dataset.y);
            }
        });

        // X軸方向の確認
        //if ()
        console.log(CountArrayValue(CheckedByCurrentPlayerX, TableXNumber))

        // ログ表示
        //console.log(p + "のチェック済みのX座標")
        //console.log(CheckedByCurrentPlayerX)
        //console.log(p + "のチェック済みのY座標")
        //console.log(CheckedByCurrentPlayerY)
    }
}
