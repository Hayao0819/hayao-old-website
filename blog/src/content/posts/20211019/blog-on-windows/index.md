---
title: "Windows上でブログを書く環境を構築した話"
description: ""
date: 2021-10-19T13:53:23+09:00
categories:
  - "Blog"
tags:
  - "Blog","Windows"
draft: true
---

もしかしたらこの記事あとからFascodeのブログに載ってこっちじゃ非公開にされるかもしれん。

Windows上でこのブログを執筆できるようにした。

なかなかにいいかんじに構築てきたのでそのメモを残してみる。

## このブログの構成

そもそもこの`hayao.fascode.net/blog`はどういう技術で構成されてるのか。

もともと`hayao.fascode.net`はなおこさんにサーバとドメインを借りて公開してる小さいサイトの集まり。

過去の自分が書いたHTMLとかを保存するために借りてる場所。

でもなんか個人だけのブログってほしいよねってことで作ったのがこのブログ。

完全に私用だし、更新をいつやめるかも不明なのでWPみたいな大掛かりなやつは嫌だった。（もともと好きじゃないし）

ということで趣味が似てそうな（？）山Dに相談したところ教えてもらったのがHugo

テーマとかのソースコードを読んだりいろいろ構築が大変で未だにできてないけどなんとか最低限の形は完成。

新規でHugoを構築する方法を解説してるサイトは何個もあったんだけど、既存のリポジトリのサブディレクトリにHugoを展開する方法はどこにも載ってなかった。

まぁ設定ファイルで強引にいろいろを書き換えることでうまくいけたのでヨシ（）

まず最終的なアドレスを`hayao.fascode.net/blog`にしたいので、`/blog/src`にHugoの設定をすべて移動させた。

その上でGitHub Actionsを使って`public`ブランチにHugoでビルドしたHTMLを`/blog`上にぶちまけてもらってる。

コンパイル後のツリーがこの上なく汚いのが現状の課題だけどまぁどうでもいいかな。

## Windows上の環境

というわけでGitを使っているので、Linux上では何の苦もなく構築できた。というか作業は全部Linux。

最近Windows PCを寝室に自作したので、そっちでも書きたいってことでWindowsで環境を整えた。

それがなかなかに曲者で、まずシェルスクリプトやGitが一切使えない。Windows常用者には当然なのかもしれないがLinux信者の俺にはとうてい耐えられる環境ではない。

ということでまずはGitKraken、gpg4win、VScode、Typoraをインストール。

MSYS4みたいなやつは環境が汚くなるしWindowsとの連携も悪いので今回は採用しなかった。

WSL2もディスクのスペースの関係上採用を見送り。OSまるまる打ち込んだらそれなりにサイズ食うからね。

GitKrakenは単体でGitが使えるという便利な代物。

どうせLinuxでもGitのGUiクライアントとしてGitKrakenを愛用してるので迷わずインストール。

署名の設定に手間取ったけどgpg4winと組み合わせることでうまくいった。

lsとかBashが使えないのもかなり問題なので、Busyboxをインストールしてつかえるようにした。

<img src=".\windows-1.png" alt="windows-1" style="zoom:75%;" />



一番シンプルなLinuxライクな環境になったと思う。

## 新しい記事を作る

Linux環境では新しい記事を作成する小さいシェルスクリプトを書いてそれを使っていた。

Windows歴が短いのでVBSやJScript、PowerShellでこれを書き直すのは面倒なので、短いVBSを書いてシェルスクリプトをBusyBox経由で無理やり実行した。

```vbs
Dim Input
Input = InputBox("Set English short title for argument")
Dim objShell
Set objShell = CreateObject("WScript.Shell")
Dim FlSysObj
Set FlSysObj = createObject("Scripting.FileSystemObject")
objShell.Run "cmd /c " & "bash .\new-post.sh " & Input ,0,false

```

VBSは学校の社会情報の暇な時間に軽く触った程度なのでどういうバグがあるかわからない。

現状はこれで動いてるのでよしとする。

ちなみにBusyboxで実行してるシェルスクリプトはこれ。

```bash
#!/usr/bin/env bash

set -eu

script_path="$( cd -P "$( dirname "$(readlink -f "${0}")" )" && pwd )"

[[ -z "${1-""}" ]] && echo "Set English short title for argument" >&2 && exit 1

cd "${script_path}" || return 0
filename="posts/$(date +%Y%m%d)/${1}/index.md"
[[ ! -f "${script_path}/${filename}" ]] && hugo new "${filename}"
type code 1>/dev/null 2>&1 && code "${script_path}/src/content/${filename}"

```

なんでこれがBusyBoxで動いたんだろうって疑問に思ってるんだけど動いたのでおｋ

hugoだけはhugo.exeというWin版をダウンロードしてきてBusyboxと同じパスにぶちこんでおいた。

実を言うとBusyBoxのBashはBashじゃなくてShなのに、なんでこのBash方言ゴリゴリのコードが動いてるのかまじでわからない。案外行けるもんなんだなって思ってる。

![dialog](C:\Users\hayao\Git\hayao.fascode.net\blog\src\content\posts\20211019\blog-on-windows\dialog.PNG)



というわけで、Linuxで作ったものを強引にWindowsで動かした経緯を書いてみた。

言いたいことは「OSにあった言語と方法を使え」ってことですかね。

結局エミュレーションとか互換環境ってのはカオスしか生み出さないので。

それでは、また今度。

