<!DOCTYPE html>
<html lang="ja">
<head>

    <?php
        // ページ設定
        $_GET["title"] = "その他の雑学";
        $commonhtml = "${_SERVER['DOCUMENT_ROOT']}/buildmydist-2/commonhtml";

        // 共通ファイルを読み込み
        $domain = $_SERVER['HTTP_HOST'];
        include("${commonhtml}/head.php");
    ?>

</head>
<body>
    <?php include("${commonhtml}/header.php"); ?>

    <main>
        <h2>このページは何？</h2>
        <p>Linuxのカスタマイズをする上で必要な情報をまとめています。</p>
        <p>ようは開発をする上で便利なリンク集です。</p>
    </main>

    <?php include("${commonhtml}/footer.php"); ?>
</body>
</html>
