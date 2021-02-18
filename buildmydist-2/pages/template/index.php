<!DOCTYPE html>
<html lang="ja">
<head>

    <?php
        // ページ設定
        $_GET["title"] = "OS名 - トップ";
        $commonhtml = "${_SERVER['DOCUMENT_ROOT']}/buildmydist-2/commonhtml";

        // 共通ファイルを読み込み
        $domain = $_SERVER['HTTP_HOST'];
        include("${commonhtml}/head.php");
    ?>

</head>
<body>
    <?php include("${commonhtml}/header.php"); ?>

    <main>
        <h2>ほげほげ</h2>
        <p>ふごふご！ほげぇ！？ふご！ふごふご！！コケェッ！！！</p>
    </main>

    <?php include("${commonhtml}/footer.php"); ?>
</body>
</html>
