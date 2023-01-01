---
title: "Magiskを使ってAndroidの充電状態を管理する"
description: ""
date: 2023-01-01T20:22:57+09:00
categories:
  - "ブログ"
  - "技術系"
tags:
  - "Android"
draft: false
pager: true
share: true
---


あけましておめでとうございます。今年もよろしくお願い致します。

新年早々暇すぎてAndroiのいい感じのモジュールを見かけたのでメモ。

## Advanced Charging Controller

名前の通り充電をコントロールするためのツール。Magisk上でCLIツールとして動くらしい。

色々ネットのフォーラムとか漁ってると配布場所が複数あるけど、素直に公式のGitHubから持ってくるべき。

[https://github.com/VR-25/acc/releases/latest](https://github.com/VR-25/acc/releases/latest)

拡張子がzipのやつを導入して終わり。

## AccA

Advanced Charging Controller はCLIで使いにくいので、GUIフロントエンドを導入。

GitHubにもApkがあるけど、無難にF-Droidから引っ張ってくればいいと思う。

[https://github.com/MatteCarra/AccA](https://github.com/MatteCarra/AccA)

[https://f-droid.org/packages/mattecarra.accapp/](https://f-droid.org/packages/mattecarra.accapp/)

みんなF-Droid好きでしょどうせしらんけど。

## 設定

とりあえず充電を85%で停止させるようにしておく。

果たしてこれがいい影響を与えるかどうかは非常に未知数ではあるけれども。

## おまけ

あんまりMagiskモジュールを知らないので、面白いやつ知ってたら教えて下さい。






