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
        <h2>Ubuntu 18.04 LTSについて</h2>
        <p>中学生の頃の自分が書いたサイトがあるので参考にしてください。</p>
        <p>ページの内容はかなり古いので近々書き直します。20.04LTSはこの方法は使えません。</p>
        <p style="text-align: center;"><a href="/buildmydist/">→こちら！！！れ！れ！！←</a></p>
    </main>

    <?php include("${commonhtml}/footer.php"); ?>
</body>
</html>
