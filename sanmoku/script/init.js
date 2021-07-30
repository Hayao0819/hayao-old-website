// 初期化をする関数
const InitilizeTable = () => {
    for (a = 0 ; a < TableYNumber; a++){ // 行を作成するループ
        
        // 行を作成する
        let tr = document.createElement("tr")

        // 先程作成した行の中で横並びのボックスを作る
        for(b = 0; b < TableXNumber; b++){
            let td = document.createElement("td"); // ボックスを作成
            td.innerText = InitialStr; // ボックスの文字を初期化する（空白に設定する）
            td.dataset.clicked = false; // ボックスの状態を「クリックされていない」にする
            td.addEventListener("click", ClickedBox) //ボックスがクリックされた時「ClickedBox」関数を実行する
            tr.appendChild(td) //行に先程作成したボックスを挿入する
        }
        MainTable.appendChild(tr) //完成した行を画面に挿入する
    }
}

// 初回読み込み時に初期化を行う
window.addEventListener("load", InitilizeTable)

