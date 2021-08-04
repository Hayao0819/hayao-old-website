// 横のマス目の数
let TableXNumber = 3;

// 縦のマス目の数
let TableYNumber = 3;

// マス目の初期値
const InitialStr = "　";

// プレイヤーの記号
const PlayerMarks = ["◯", "✗" , "△"];

// プレイヤーの人数（現在 2のみ指定可能）
let PlayerNumer = 2;

// 現在のプレイヤー
let CurrentPlayer = 0;

//// 以下プログラム用の変数定義につき変更禁止


// Main
const Main = document.getElementById("main");

// HTML
const HTML = document.getElementsByName("html")[0];

// メインテーブル
const MainTable = document.getElementById("maintable")

// メッセージを表示する場所
const Msg = document.getElementById("msg");

// 現在の設定を表示する場所
const CurrentConfig = document.getElementById("currentconfig")

// リセットボタン
const ResetButton = document.getElementById("reset");

// 適用ボタン
const ApplyButton = document.getElementById("apply");

// 設定フォーム: 縦のマス目
const InputTableX = document.getElementById("inputtablex")

// 設定フォーム: 横のマス目
const InputTableY = document.getElementById("inputtabley")

// 設定フォーム: プレーヤーの人数
const InputPlayerNumber = document.getElementById("inputplayernumber")

// チェック済みのボックスの数
let CheckedBox = 0;

// ゲームが終了してるかどうか
// これがtrueの場合はクリックしてもマークをつけない
let GameEnded = false;
