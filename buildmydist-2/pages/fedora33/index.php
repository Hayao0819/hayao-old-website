<!DOCTYPE html>
<html lang="ja">
<head>

    <?php
        // ページ設定
        $_GET["title"] = "Fedora 33 - トップ";
        $commonhtml = "${_SERVER['DOCUMENT_ROOT']}/buildmydist-2/commonhtml";

        // 共通ファイルを読み込み
        $domain = $_SERVER['HTTP_HOST'];
        include("${commonhtml}/head.php");
    ?>

</head>
<body>
    <?php include("${commonhtml}/header.php"); ?>

    <main>
        <h2>Fedora 33 について</h2>
        <p>Fascode Networkで開発されているSerene Linuxは現在はFedoraベースで開発されています</p>
    </main>

    <?php include("${commonhtml}/footer.php"); ?>
</body>
</html>
