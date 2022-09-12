---
title: "色々"
description: ""
date: 2022-03-12T12:15:16+09:00
categories:
  - "ブログ"
  - "プライベート"
tags:
draft: false
pager: true
share: true
---

ここ数日でいろんなことがありすぎてすごく疲れた。

久しぶりにMatterMostでFascodeの様子をのぞいたら、どうやらArch Linuxの上流の問題でQt5ctが壊れているらしい。

まぁどうせお約束のコマンドで修正できるので、それをブログに書いて適当に投稿しといた。

## 今

忌引で学校を3日間休めるので、フルで活用させてもらっている。学校行きたくないし気分というか気持ち的に無理。

でも親に連れられて隣の市のショッピングモールに来てる。んで親が買い物してる今フードコートでMacでこれ書いてる。

なんでこんなことしてるんだろうなって思うけど今こうやって文章を何かにアウトプットしていないとまた泣きそうになる。

なぜか文章を書いてると落ち着くというか、多分他のことに集中していれば一時的に忘れられるのかな。

何かアニメでも見るか。新しく何かを見る気にはなれないし、わたてんかひだまりすけっちだな。

めちゃくちゃ仲良かった人がいなくなっちゃった時ってどうすればいいんだろう。わからん。

今までお葬式とかって数回出てるけど、関わりのない人だったりそこまで好きじゃない人だったり幼少期だったりしてどれも参考にならない。

何か良い対象方法でもあったら教えてくれ。マジでそろそろ復帰しないとマジで引きこもりになる。

シンタローもこんな気持ちだったのかなって思うとマジで親近感が湧いてくる。このまま高校辞めよっかな。

## Twitterの話

ずっとあれからTwitterとか何かソシャゲとかやる気になれなくて、ずっと何もしていない。

いや、それは訂正。プロセカはめちゃくちゃやった。多分40回くらいやった。マジで。

スタミナみたいなやつ200回復して1ライブ5消費でずっとやってた。楽曲ランダムでひたすら無限に。

このままだったらTwitterいらねぇんじゃねぇかってなってる。

ただツイ廃の血はDNAレベルなのでいまだにこうして無意味な文を書いてるけど。

Twitterやめてこういう一方方向のブログでも良いのかななんて思い始めてる。

## 帰宅

なんかかんやで帰宅。相変わらず何もやる気になれん。のばまんの動画でも見るか。

## メガネ

目が見えなくなってきた。視力を測ったら、メガネしてる状態で0.2しかなかった。

んで新しく処方箋を出してもらったので、新しくレンズを買うことにした。

どうせちょうどまだレンズを買ってないまどマギコラボのさやかちゃんのメガネがあったのでそれにつけることにした。

## GNUとBSD

最近はPCはずっとMacでしか作業してないので書くシェルスクリプトも必然的にBSD系の実装になっている気がする。

Macで書いたコードをGitHub ActionのUbuntuで走らせたら`sed -i ""`ってコードが動かなかった。

ゆとりのワイにはPOSIX互換なんてコードは書けないので、

```bash
if sed -h 2>&1 | grep -q "GNU"; then
  sed -i
else
  sed -i ""
fi
```

というヘルプ文書を悪用した脳死コードでGNUかどうかを判別してる。

GNU系のツールの謎の文化なのかライセンスに厳しいからなのか、coreutils系のコマンドはすべてヘルプ文書にGNUという文字が入っているので、これを活用すれば環境ごとに別で分岐できる。

ぶっちゃけディストリをシェルスクリプトで判別するのは非常に難しいので、これが一番合理的。

いやneofetchのコードとか見てみ。ディストリとかOS判定でとんでもない量のコード書かれてるから。

各ディストリが`/etc/arch-release`みたいなファイルを好き勝手配置して、互換性のために`/etc/os-release`はベースOSのまま、みたいなのが行われてるせいで詳細なディストリ判定が不可能に近いことになってる。

これを簡単に行うライブラリとかあったら助かるんだけどな。

ちなみにデスクトップ環境とかウィンドウマネージャの判別はもっと難しくて、環境変数とか設定ファイルとかを地道に判断していくしかない。

XDGあたりが`XDG_DE`とか`XDG_WM`みたいな環境変数を標準で制定してくれれば多少は楽になる。

Windows、Linux、Mac、BSD、Android、iPhoneの判別はそれなりに簡単だから、あとはそれぞれの環境変数なり設定ファイルなりを参照すれば良いだけになる。

そのためのFreeDesktop.orgじゃないのかと思うけど、あいつらは性質上あまりにも保守的なのでだめ。

というか今更そんな環境変数を設定してもどうせ過去バージョンの対応とかで結局ダメになる。

この現象どこまで見たなって考えてたらこれブラウザのユーザーエージェントだわ。

ああやって文字列だけで共通のインターフェースを目指すとカオスになるっていうオチね。

レガシーコードは悪。

でも上のgrep使った[脳死ゴリ押し判定でビルド通った](https://github.com/Hayao0819/FasBashLib/runs/5522077963)のでよし。

## Alter Linuxの話

レガシーコードで思い出したんだけど、Alter Linuxの二大レガシーコードの話多分誰にもしてないよね。

あの中に`medit`と`qt5-styleplugin`っていうパッケージが入ってるんだけど、あの2つがめちゃくちゃ古い。

Meditは記述言語と使用技術がGTK2にPython２だからね？あれのためだけにAlter LinuxにはPython2のPyGObjectがインストールされているくらい。

んでビルドの上でPyGObjectは流石に重すぎるのでMeditを削除することにしたんだけど代替案がなくていまだに模索中。

MousePadかLeafPadあたりでいいかなと思ってるんだけどね。

んでもう一つは`qt5-styleplugin`、こいつはQtアプリ上でGTKテーマを使うために入れてるプラグイン。

でも公式のソース上だと開発が10年前に止まってて、それをAURのメンテナがパッチをなんとか作って今でも動かしてる状態。

んでQtのライブラリがアップデートされると動かなくなっちゃうから、自分で際ビルドしないといけない。

そのせいでQt系のアプリが全て死んでしまうというあまりにも迷惑なおち。

まぁMeditは削除が決まったんだけどQtの方はいまだにインストールリストにあるからね。

こいつをどうすればいいかなってのはずっと考えてるんだけど対象方法がわからん。

## 今思ったこと

正直Twitterよりもこうして一人で日記にした方がいいのでは？？運営とかいう面倒な輩もいないし。