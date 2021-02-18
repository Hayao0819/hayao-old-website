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
    <?php include("${commonhtml}/header.php"); ?>
    <main>
        <h1>タイトル</h1>
        <p>本文本文本文本文本文本文本文本文本文本文本文</p>
        a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>v
        <p>Hello</p>
        
    </main>

    <?php include("${commonhtml}/footer.php"); ?>
</body>
</html>
