'use strict';

// ハンバーガーメニューのボタン
const MenuButton = document.getElementById("menu_button");

// ハンバーガーメニューの項目一覧
const Menu = document.getElementById("menu");

// リリース番号選択フォーム
const ReleaseIdForm = document.getElementById("releaseidform");

// エディション選択フォーム
const EditionForm = document.getElementById("editionform");

// ダウンロードボタン
const DownloadButton = document.getElementById("downloadbutton");

// <main>
const Main = document.getElementById("main");

// head内のタイトル
const MetaTitle = document.getElementById("meta_title");

// ヘッダー内のタイトル
const HeaderTitle = document.getElementById("header_title");

// 色



/*
    Color1: ヘッダー、タイトルの背景色 
    Color2: bodyの背景色
    Color3: ホバー時の背景色
    TextColor1: 本文の文字色
    TextColor2: ヘッダー、タイトルの文字色
    TextColor3: ホバー時の文字色
*/

//const Color1 = "black", Color2 = "white" , Color3 = "green-300"

const CommonColor = "red";
const Color1 = `${CommonColor}-400`
const Color2 = `white`
const Color3 = `${CommonColor}-500` 

const TextColor1="black";
const TextColor2="white";
const TextColor3="white";
