<!DOCTYPE html>
<html lang="ja">
<head>

    <?php
        // ページ設定
        $_GET["title"] = "Ubuntu 18.04 - トップ";
        $commonhtml = "${_SERVER['DOCUMENT_ROOT']}/buildmydist-2/commonhtml";

        // 共通ファイルを読み込み
        $domain = $_SERVER['HTTP_HOST'];
        include("${commonhtml}/head.php");
    ?>

</head>
<body>
    <?php include("${commonhtml}/header.php"); ?>

    <main>
        <h1>Ubuntu 18.04ベースのディストリビューションを作ろう</h1>
        <p>Ubuntu 18.04を使って自分だけのディストリビューションを作ります</p>
    </main>

    <?php include("${commonhtml}/jsloader.php"); ?>
</body>
</html>
