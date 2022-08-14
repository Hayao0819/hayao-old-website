---
title: "Gentoo Linuxでインストールされている全てのカーネルのInitramfsを生成する"
description: ""
date: 2022-08-14T15:37:10+09:00
categories:
  - "ブログ"
  - "技術系"
tags:
  - "Linux"
draft: false
pager: true
share: true
---

新型コロナに感染して陽性になって、家にいて暇なのでGentoo Linuxに再チャレンジしてみている。

Chromeでタブを40個ほど開いてソースコードやらGentoo WikiやらとにらめっこしながらMisskeyで山Dに質問しまくっている。（本当に申し訳ない）

![Chrome](./chrome.png)

そんな中でこのブログの開設のきっかけにもなった[切腹倶楽部でGentoo Linuxのebuildの入門記事が公開](https://seppuku.club/unix-like/gentoo-overlay-enter/)されており、しかも先日~~俺があまりにもわからなさすぎたのか~~いろいろと更新してくれたらしい。

中2くらいでArch Linuxを初めて触った頃にも同じ感じだった気がする...成長がまったくない。

## 本題

んで本題はGentoo LinuxのInitramfsの更新が面倒だということ。`dracut`コマンドで更新するのだが、新しくカーネルをインストールしたあとだと`dracut /boot/hoge.img 5.15.xx`みたいな感じで指定しないといけないので非常に面倒だった。

dracutは全く詳しくないので、何か便利にやってくれるオプションがあるのかもしれないがmanページを見るのも面倒だったので即席でラッパースクリプトを作ってしまった。

`/boot`以下と`/lib/modules`以下を調べて、カーネル本体とモジュールディレクトリの療法が存在していたらInitramfsを生成してくれる。

こういう短いラッパースクリプトでこそシェルスクリプトの真価を発揮できるなぁと思いました🍊

<script src="https://gist.github.com/Hayao0819/d0bc7d890fe220c92c34f651356c2cae.js"></script>


