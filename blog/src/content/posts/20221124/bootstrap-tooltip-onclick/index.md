---
title: "BootstrapのTooltipをクリックされたときのみ表示する"
description: ""
date: 2022-11-24T22:16:46+09:00
categories:
  - "ブログ"
  - "プライベート"
  - "技術系"
tags:
draft: false
pager: true
share: true
---

クリップボードにコピーしたときにのみメッセージを表示したいと思い、BootstrapのTooltipで実装したのでそのメモです。

## 環境

Bootstrap 5の`bootstrap.bundle.min.js`をCDNで読み込んでいます。

## HTML

```html
<button type="button" class="btn btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="コピーしました" id="discord-copy">
  ボタン
</button>
```

## JavaScript

```js
const tooltipElement = document.getElementById("discord-copy")
const tooltip = new bootstrap.Tooltip(tooltipElement)
tooltip.disable()

tooltipElement.addEventListener("click", function() {
    tooltip.enable()
    navigator.clipboard.writeText("Hayao0819#2661");
    tooltip.show()
});

tooltipElement.addEventListener("hidden.bs.tooltip", ()=>{
    tooltip.disable()
});
```

## ポイント

`tooltip`は事前に初期化しておきます。このとき同時に`disable`で表示させないようにしておきます。

クリックされたときのみ、`enable`でTooltipを有効化してから`show`で表示します。

`hidden.bs.tooltip`イベントをハンドルして、Tooltipが隠れたときに再び`disable`します。

個人的なポイントは、このJSを`bootstrap.bundle.min.js`を読み込んだあとに実行することですね。

Bootstrap読み込み前に`<script>`で埋め込んでいるせいで`bootstrap is not defined`で30分ほど困ってました。

## 終わり

Bootstrap、JSやSCSSのほうまで弄りたいですね。


