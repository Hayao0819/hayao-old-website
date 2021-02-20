<!DOCTYPE html>
<html lang="ja">
<head>

    <?php
        // ページ設定
        $title = "Alter Linux - 基本的な使い方";
        $commonhtml = "${_SERVER['DOCUMENT_ROOT']}/buildmydist-2/commonhtml";
        $distro = "alteriso3";

        // 共通ファイルを読み込み
        $domain = $_SERVER['HTTP_HOST'];
        include("${commonhtml}/head.php");
    ?>

</head>
<body>
    <?php include("${commonhtml}/beforemain.php"); ?>

    <main>
        <h2>AlterISO3の基本的な使い方</h2>
        <p>基本的な使い方はコマンドラインで<code>build.sh</code>を実行するだけです。</p>
        <p>設定はコマンドラインオプションや設定ファイルで行います。</p>
        
        <h2>チャンネルについて</h2>
        <p>AlterISO3では、1つの設定やファイルの集合を「チャンネル」という単位で管理しています。/p>
        <p>例えば「Alter Linux Xfce」と「Alter Linux LXDE」というようにチャンネルを切り替えます。</p>
        <p>その1つのチャンネルの中で「日本語版」「英語版」「x86_64」「i686」のように設定を行っていきます。</p>
        <p>基本的にはデスクトップ環境やウィンドウマネージャでチャンネルを分けるのが良いと思います。</p>

        <h2>AlterISO3本体を取得しよう</h2>
        <p>GitHubからソースコードを取得します。</p>
        <div class="code language-shell">
            git clone "https://github.com/FascodeNet/alterlinux"<br>
            cd alterlinux/<br>
            ./build.sh -h
        </div>
        <p>上のコマンドでbuild.shの使い方が表示されれば成功です。</p>

        <h2>とりあえずビルドしてみよう</h2>
        <p>Alter Linux Xfceをまずはビルドしてみましょう。</p>
        <p></p>

    </main>

    <?php include("${commonhtml}/aftermain.php"); ?>
</body>
</html>
