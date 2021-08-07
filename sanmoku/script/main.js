// 最初にのみログを表示する
window.addEventListener("load", function(){
    console.log(CurrentPlayer + "でゲームをスタートします")
})

// ボックスがクリックされたときの処理
// init.jsでボタンがクリックされた場合にClickedBox関数を実行するように指示している
var ClickedBox = function (e) {
    var MySelf = e.target // クリックされたボックスを取得する

    if (! GameEnded){ //もしゲームの状態が「終了」でなければ
        if (MySelf.getAttribute("data-clicked") != "true"){
            // クリックされたボックスの設定
            MySelf.innerText = PlayerMarks[CurrentPlayer]; //クリックされたボックスのテキストをクリックしたプレーヤーの記号にする

            //MySelf.dataset.clicked = "true"; //ボックスの状態を「クリック済み」にする
            //MySelf.dataset.player  = CurrentPlayer; // チェックしたプレーヤーのIDをボックスに書き込む

            MySelf.setAttribute("data-clicked", true) //ボックスの状態を「クリック済み」にする
            MySelf.setAttribute("data-player", CurrentPlayer) // チェックしたプレーヤーのIDをボックスに書き込む

            // ログ
            //console.log(CurrentPlayer + "が " + MySelf.dataset.x + "," + MySelf.dataset.y + " をクリックしました")
            console.log(CurrentPlayer + "が " + MySelf.getAttribute("data-x") + "," + MySelf.getAttribute("data-y") + " をクリックしました")

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
var ChangePlayer = function(){
    if (CurrentPlayer == PlayerNumer - 1){ // 今のプレーヤーが最後だったら
        CurrentPlayer = 0; //最初のプレーヤーに戻る
    }else{
        CurrentPlayer++; //次のプレーヤーにする
    }
    console.log("プレイヤー" + CurrentPlayer + "の番です") //ログを表示する
}

// 現在の設定を表示する関数
var UpdateCurrentConfig = function() {
    // ゲーム設定を表示
    var p1 = document.createElement("p") //ゲーム設定を表示する枠を作成
    p1.innerText = "横: " + TableXNumber +  "縦: " + TableYNumber // テキストを設定

    // プレーヤー情報を表示
    var p2 = document.createElement("p") // プレーヤー情報を表示する枠を作成
    p2.innerText = "人数: " + PlayerNumer + "人 現在: " + PlayerMarks[CurrentPlayer]

    // 作成した枠を文書に挿入
    CurrentConfig.innerHTML = "" ; // 枠の中の文書を削除
    CurrentConfig.appendChild(p1);  // ゲーム設定を挿入
    CurrentConfig.appendChild(p2);  // プレーヤー情報を挿入
}

// 初回起動時に現在の設定を表示
window.addEventListener("load", UpdateCurrentConfig)

// リセットボタンが押されたときの処理
ResetButton.addEventListener("click", function(){
    location.reload();
})

// 初回起動時に設定のボックス内に初期設定を入れておく
window.addEventListener("load", function(){
    InputTableX.value = TableXNumber;
    InputTableY.value = TableYNumber;
    InputPlayerNumber.value = PlayerNumer;
})

// 適用ボタンが押された時の処理
ApplyButton.addEventListener("click", function(){

    // それぞれの状態を初期化
    PlayerNumer   = InputPlayerNumber.value;
    GameEnded     = false;
    CheckedBox    = 0;
    CurrentPlayer = 0;
    Msg.innerText = "";

    // 入力された値が正常か確認
    if(InputTableX.value >= 3 && InputTableY.value >= 3){
        TableXNumber = InputTableX.value;
        TableYNumber = InputTableY.value;
    }else{
        Msg.innerText = "3以上の整数を指定してください"
        return;
    }
    
    // ゲーム全体の初期化と表示されている設定を更新
    InitilizeTable();
    UpdateCurrentConfig();
})
