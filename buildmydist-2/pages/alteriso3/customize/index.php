<!DOCTYPE html>
<html lang="ja">
<head>

    <?php
        // ページ設定
        $title = "Alter Linux - カスタマイズ";
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
        <h2>AlterISO3のチャンネルを作成する</h2>
        <p>実際に独自のカスタマイズを施し、チャンネルの開発を行っていきます。</p>
    </main>

    <?php include("${commonhtml}/aftermain.php"); ?>
</body>
</html>
