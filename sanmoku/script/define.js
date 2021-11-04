// 横のマス目の数
var TableXNumber = 3;

// 縦のマス目の数
var TableYNumber = 3;

// マス目の初期値
var InitialStr = "　";

// プレイヤーの記号
var PlayerMarks = ["◯", "✗" , "△", "□"];

// プレイヤーの人数
var PlayerNumer = 2;

// 現在のプレイヤー
var CurrentPlayer = 0;

//// 以下プログラム用の変数定義につき変更禁止


// Main
var Main = document.getElementById("main");

// HTML
var HTML = document.getElementsByName("html")[0];

// メインテーブル
var MainTable = document.getElementById("maintable")

// メッセージを表示する場所
var Msg = document.getElementById("msg");

// 現在の設定を表示する場所
var CurrentConfig = document.getElementById("currentconfig")

// リセットボタン
var ResetButton = document.getElementById("reset");

// 適用ボタン
var ApplyButton = document.getElementById("apply");

// 設定フォーム: 縦のマス目
var InputTableX = document.getElementById("inputtablex")

// 設定フォーム: 横のマス目
var InputTableY = document.getElementById("inputtabley")

// 設定フォーム: プレーヤーの人数
var InputPlayerNumber = document.getElementById("inputplayernumber")

// チェック済みのボックスの数
var CheckedBox = 0;

// ゲームが終了してるかどうか
// これがtrueの場合はクリックしてもマークをつけない
var GameEnded = false;
