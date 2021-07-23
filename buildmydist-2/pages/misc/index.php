<!DOCTYPE html>
<html lang="ja">
<head>

    <?php
        // ページ設定
        $title = "カスタマイズの仕方";
        $commonhtml = "${_SERVER['DOCUMENT_ROOT']}/buildmydist-2/commonhtml";
        $distro = "misc";

        // 共通ファイルを読み込み
        $domain = $_SERVER['HTTP_HOST'];
        include("${commonhtml}/head.php");
    ?>

</head>
<body>
    <?php include("${commonhtml}/beforemain.php"); ?>

    <main>
        <h2>このページは何？</h2>
        <p>Linuxのカスタマイズをする上で必要な情報です。</p>
        <p>カスタマイズはほとんどがOSに関係なく、共通しているのでこのページにまとめています。</p>
        <p>初めてLinuxを使う人も参考にしてみてください。</p>
        <?php
            $relation = "${_SERVER['DOCUMENT_ROOT']}/buildmydist-2/pages/$distro/relation.php";
            if(file_exists($relation)){
                echo "<h2>リンク集</h2>";
                include($relation);
            }
        ?>
    </main>

    <?php include("${commonhtml}/aftermain.php"); ?>
</body>
</html>
