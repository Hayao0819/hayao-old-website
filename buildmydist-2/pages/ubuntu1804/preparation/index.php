<!DOCTYPE html>
<html lang="ja">
<head>

<?php
        // ページ設定
        $title = "Ubuntu 18.04 - 準備編";
        $commonhtml = "${_SERVER['DOCUMENT_ROOT']}/buildmydist-2/commonhtml";
        $distro = "ubuntu1804";

        // 共通ファイルを読み込み
        $domain = $_SERVER['HTTP_HOST'];
        include("${commonhtml}/head.php");
    ?>

</head>
<body>
    <?php include("${commonhtml}/beforemain.php"); ?>

    <main>
        <h2>ベースとなるOSを選ぶ</h2>
        <p>今回はBasix OSというミニマムなUbuntu系ディストリビューションをベースに開発を行います。</p>
        <p>同じUbuntu 18.04系ならZorin OSや本家のUbuntuなどの他のOSを使用しても技術的な問題はありません。</p>
        <p>ただし、不要なファイルやパッケージを自分で選びながらたくさん削除、追加を行わなければいけないので手間になります。</p>
        <p>Basix OSはそもそもディストリビューションを自分で開発することを前提としているので比較的容易に開発をすることができます。</p>

        <h2>Basi OSとは</h2>
        <p>日本のLinux界隈で有名な<a href="http://simosnet.com/livecdroom/">ライブCDの部屋</a>の管理人さんが作成、公開しているOSです。</p>
        <p>イメージファイルは<a href="http://simosnet.com/livecd/basix/">こちら</a>からダウンロードできます。</p>
        <p>今回は<code>basix-4.0_x86_64.iso</code>を使用して作成していきます。（Beta 7以前のSerene Linuxもこれで開発されています。）</p>
        <p>このDLしたイメージファイルは削除せずにとっておいてください。</p>

        <h2>開発環境の構築</h2>
        <p>今回は開発環境にBasixをインストール、カスタマイズし、その上でまるごとイメージファイルにしていきます。</p>
        <p>そのため開発の土台となるのは仮想環境です。</p>
        <p><a href="/buildmydist-2/pages/misc/virtual/">仮想マシンについてはこちらを参照してください。</a></p>
        
        <h2>終わり</h2>
        <p>Ubutnu 18.04で特別に必要なものはこれだけです。</p>
        <p>それ以外に必要な物はすべて<a href="http://localhost/buildmydist-2/pages/common">はじめに</a>で紹介しているのでそちらを参照してください。</p>
        <p>次はカスタマイズ編です。</p>

        
        
    </main>

    <?php include("${commonhtml}/aftermain.php"); ?>
</body>
</html>