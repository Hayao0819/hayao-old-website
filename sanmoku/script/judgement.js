// 配列の重複した値が指定回数以上ならTrueを返す
// 使い方: CountArrayValue(配列, 回数)
// 参考: https://teratail.com/questions/98451
//      https://teratail.com/questions/352619
const CountArrayValue = function(array, number) {
    let count = {};

    //for (let i of array) {
    //   count[i] = (count[i] || 0) + 1;
    //    if (count[i] == number) return true;
    //}

    for (i=0; i<array.length; i++){
        count[array[i]] = ( count[array[i]] || 0 ) + 1;;
        if (count[array[i]] == number) return true;
    }
    return false;
}



// 勝敗の判定 ジャッジメントですの！
const Judgement =function() {
    // プレーヤーごとに判定
    // プレーヤーIDでループし、変数pに今チェック対象のプレーヤーIDが代入される
    for (p=0; p < PlayerNumer; p++){
        // チェックしたプレーヤーのIDが書き込まれたボックスの一覧を取得
        const elements = MainTable.querySelectorAll("[data-player]");

        // 今チェック中のプレーヤーのチェックしたボックスの座標
        CheckedByCurrentPlayerX = []; // X軸方向のチェックしたボックスのリスト
        CheckedByCurrentPlayerY = []; // Y軸方向のチェックしたボックスのリスト
        CheckedbyCurrentPlayerD = []; // 斜め方向のチェックしたボックスのリスト

        // 上で取得したボックスの一覧1つ1つで確認処理を行う
        //elements.forEach(function(e) {
        for(i=0; i<elements.length; i++){
            let e = elements[i];
            if (e.dataset.player == p){ // もしいま確認しているボックスが今確認しているプレーヤーIDと一致したら
                //console.log(e)
                // チェックされているボックスの座標を座標リストに追加する
                CheckedByCurrentPlayerX.push(e.dataset.x);
                CheckedByCurrentPlayerY.push(e.dataset.y);
            }
        };

        // 勝利時に実行する関数
        const WinExit = function(text){
            Msg.innerText = p + "が" + text + "で勝ちました"
            GameEnded = true;
            return;
        }

        // X座標の確認
        if (CountArrayValue(CheckedByCurrentPlayerX, TableYNumber)){
            // チェックした値がX座標で一致した→すなわち縦方向がそろった
            WinExit("縦方向");
        }

        // Y軸方向の確認
        if (CountArrayValue(CheckedByCurrentPlayerY, TableXNumber)){
            // チェックした値がY座標で一致した→すなわち横方向がそろった
            WinExit("横方向");
        }


        // 斜め方向の判定
        if (TableXNumber == TableYNumber){ // 正方形の場合のみ （X軸とY軸の大きさが一致）

            // 左上からの斜め方向の判定
            {
                for (i=0; i<TableXNumber; i++){
                    let e = document.getElementById(i + "," + i)
                    if (e.dataset.clicked == "true" && e.dataset.player == p){
                        CheckedbyCurrentPlayerD.push(i + "," + i);
                    }
                }

                if(CheckedbyCurrentPlayerD.length == TableXNumber){
                    WinExit("左上からの斜め方向");
                }
            }

            // 斜め方向の判定を初期化
            CheckedbyCurrentPlayerD.splice(0)

            // 右上からの斜め方向の判定
            {
                for(x=TableXNumber-1; x > -1; x--){
                    let y = TableXNumber - x - 1;
                    let e = document.getElementById(x + "," + y);
                    if (e.dataset.clicked == "true" && e.dataset.player == p){
                        CheckedbyCurrentPlayerD.push(x + "," + y);
                    }
                }
                if(CheckedbyCurrentPlayerD.length == TableXNumber){
                    WinExit("右上からの斜め方向");
                }
            }
        } 

        

        // ログ表示
        //console.log(p + "のチェック済みのX座標")
        //console.log(CheckedByCurrentPlayerX)
        //console.log(p + "のチェック済みのY座標")
        //console.log(CheckedByCurrentPlayerY)
    }
}
