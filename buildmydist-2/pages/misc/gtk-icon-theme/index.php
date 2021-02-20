<!DOCTYPE html>
<html lang="ja">
<head>

    <?php
        // ページ設定
        $title = "GTKのアイコンとテーマについて";
        $commonhtml = "${_SERVER['DOCUMENT_ROOT']}/buildmydist-2/commonhtml";
        $distro = "misc";

        // 共通ファイルを読み込み
        $domain = $_SERVER['HTTP_HOST'];
        include("${commonhtml}/head.php");
    ?>

</head>
<body>
    <?php include("${commonhtml}/beforemain.php"); ?>

    <main>
        <h2>GTKテーマとは</h2>
        <p>GTK+はLinuxで主に使用されているGUIツールキットです。（GUIをかんたんに描写するツールだと思ってください。）</p>
        <p>いろいろなテーマがネット上に無料で公開されており、アプリの見た目や色を一括で大きく変更することができます。</p>
        <p>Serene Linuxでは「Numix」、Alter Linuxでは「Adapta」や「Arc」を使用しています。</p>

        <h2>アイコンテーマとは</h2>
        <p>ランチャーやUIで使われているアイコンパックです。Androidのアイコンパックのようなものです。</p>
        <p>アイコンテーマを導入することで見た目を大きく変更することができます。</p>
        <p>Serene Linuxでは「Paper Icon theme」、Alter Linuxでは「Papirus Icon」「Inverse Icon theme」を使っています。</p>
        
        <h2>自分お好きなテーマを探す</h2>
        <p>自分の好きなテーマをネット上で探しましょう。テーマのライセンスが再配布可能で、GTK2と3に準拠しているものなら何でも使用できます。</p>
        
        <p>テーマは様々な場所で公開されていますが、主に以下のようなサイトで探すことが出来ます。</p>


    </main>

    <?php include("${commonhtml}/aftermain.php"); ?>
</body>
</html>
