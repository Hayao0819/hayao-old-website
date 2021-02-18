<!DOCTYPE html>
<html lang="ja">
<head>

    <?php
        // ページ設定
        $title = "Ubuntu 20.04 - トップ";
        $commonhtml = "${_SERVER['DOCUMENT_ROOT']}/buildmydist-2/commonhtml";
        $distro = "ubuntu2004";

        // 共通ファイルを読み込み
        $domain = $_SERVER['HTTP_HOST'];
        include("${commonhtml}/head.php");
    ?>

</head>
<body>
    <?php include("${commonhtml}/header.php"); ?>

    <main>
        <h2>Ubuntu 20.04 LTSについて</h2>
        <p>Ubuntu 20.04ではPython 2が公式パッケージから削除されたことによって、以前の方法が使えなくなりました。</p>
    </main>

    <?php include("${commonhtml}/footer.php"); ?>
</body>
</html>
