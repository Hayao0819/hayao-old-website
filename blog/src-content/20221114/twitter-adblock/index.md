---
title: "Twitterの広告ブロックをする方法"
description: ""
date: 2022-11-14T17:15:58+09:00
categories:
  - "ブログ"
  - "技術系"
tags:
  - "Android"
draft: false
pager: true
share: true
---

Androidで快適なTwitterライフを送るうえで必須なのが広告ブロック。

2つの方法があるんだけどどっちがいいか個人的にはよくわからない。

## 1. TwiFuckerを使う方法

[TwiFucker](https://github.com/Dr-TSNG/TwiFucker)を使う方法。

LSPatcherと組み合わせることでRootなしでも動作するらしい。（未検証）

## 2. YouTube Revancedを使う方法

なぜかYouTube RevancedのプロジェクトがTwitterの広告除去も実装している。

以前に書いた[Revanced Builder](http://hayao.fascode.net/blog/posts/20220713/youtube-revanced-easiest/)を使えばRootなしでも実行できると思う。

ただRevanced BuilderはJava SDKの依存関係がちと面倒なんだよな...

ただどうせこの記事を見てるオタクはみんなMagisk入れてると思うので、[こっちのRevanced Manager](https://github.com/revanced/revanced-manager)を使ったほうがかんたん。

Revanced Managerは内臓のアップデータがまだうまく動かないようで、自分の環境だと毎回手動でApkをダウンロードする必要がある。

## 終わり

上の2つはどっちもパッチを当てるだけなので、自分の環境では両方導入している。

今の所重いとかの問題もないし衝突も起こっていなさそうなので、絶対広告嫌って人は両方入れるのが最適カモ。

Rootある人はRevanced Manager+TwiFucker(with LSPosed)で、Root無い人はRevanced Builder+Twifucker(with LSPatcher)でいいと思う。

## おまけ

YouTubeのほうの広告ブロックもいろいろな方法があるけどどれがいいんだろう。

最近はRevanced BuilderもRevanced Managerも使わず[cuynu/ytvancedのapk](https://github.com/cuynu/ytvanced)を脳死でインストールしている。

一応Revancedのソースコードをベースにビルドしているらしいけど、Apkの配布は旧Vancedの二の舞になる気しかしない...

cuynu/ytvancedはMagisk Moduleも配布しているので、非Root用とModuleの2つをインストールしている。どっちを使うのがいいんだろうか。

ところで皆さんMicroGのほうの開発ってどうなってるんでしょうね。Vanced MicroGとmicroGの違いが全くわからない。
