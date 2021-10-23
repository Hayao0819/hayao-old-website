<!DOCTYPE html>
<html lang="ja">
<head>

    <?php
        // ページ設定
        $title = "OS名 - トップ";
        $commonhtml = "${_SERVER['DOCUMENT_ROOT']}/buildmydist-2/commonhtml";
        $distro = "osname";

        // 共通ファイルを読み込み
        $domain = $_SERVER['HTTP_HOST'];
        include("${commonhtml}/head.php");
    ?>

</head>
<body>
    <?php include("${commonhtml}/beforemain.php"); ?>

    <main>
        <h2>ほげほげ</h2>
        <p>ふごふご！ほげぇ！？ふご！ふごふご！！コケェッ！！！</p>
    </main>

    <?php include("${commonhtml}/aftermain.php"); ?>
</body>
</html>
