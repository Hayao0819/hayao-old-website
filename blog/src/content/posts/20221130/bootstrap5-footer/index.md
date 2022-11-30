---
title: "Bootstrap5でFooterを下部に固定する"
description: ""
date: 2022-11-30T19:02:18+09:00
categories:
  - "ブログ"
  - "プライベート"
  - "技術系"
tags:
draft: false
pager: true
share: true
---

```html
<body>
    <div class="container-fluid position-relative vh-100">
        <div class="row">
            色々ヘッダーとかコンテンツ
        </div>

        <div class="row position-absolute bottom-0 w-100">
            <footer>
                フッターの内容
            </footer>
        </div>
</body>
```

[参考にしたSEO汚染系量産型プログラミングスクールのサイトはこちら](https://magazine.techacademy.jp/magazine/19410)

よく見る手法だけどBootstrapで実装してるやつがパッと見なかったのでメモ

`position-relative`とかまだ良く理解できてないかもしれない。

`box-sizing: border-box;`はBootstrapではデフォルトでグローバルに当たってる。

`position-relative vh-100`を付けないとスクロールしたときに重なってしまって`✞CSS完全に理解した✞`状態になる。


