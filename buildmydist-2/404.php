<!DOCTYPE html>
<html lang="ja">
<head>

    <?php
        // ページ設定
        $_GET["title"] = "トップページ";
        $commonhtml = "${_SERVER['DOCUMENT_ROOT']}/buildmydist-2/commonhtml";

        // 共通ファイルを読み込み
        $domain = $_SERVER['HTTP_HOST'];
        include("${commonhtml}/head.php");
    ?>

</head>
<body>
    <?php include("${commonhtml}/beforemain.php"); ?>

    <main>
        <h1>404 NOT FOUND !!</h1>
        <p>
            <img src="https://blog.fascode.net/wp-content/uploads/2020/04/result.png" alt="404 not found">
        </p>
        <p>
            へんじがない。まちがったアドレスのようだ。
        </p>
    </main>

    <?php include("${commonhtml}/aftermain.php"); ?>
</body>
</html>