<!DOCTYPE html>
<html lang="ja">
<head>

    <?php
        // ページ設定
        $title = "Fedora 33 - トップ";
        $commonhtml = "${_SERVER['DOCUMENT_ROOT']}/buildmydist-2/commonhtml";
        $distro = "fedora33";

        // 共通ファイルを読み込み
        $domain = $_SERVER['HTTP_HOST'];
        include("${commonhtml}/head.php");
    ?>

</head>
<body>
    <?php include("${commonhtml}/beforemain.php"); ?>

    <main>
        <h2>Fedora 33 について</h2>
        <p>Fascode Networkで開発されているSerene Linuxは現在はFedoraベースで開発されています</p>
    </main>

    <?php include("${commonhtml}/aftermain.php"); ?>
</body>
</html>
