<!DOCTYPE html>
<html lang="ja">
<head>

    <?php
        // ページ設定
        $title = "その他の雑学";
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
        <p>Linuxのカスタマイズをする上で必要な情報をまとめています。ようは開発をする上で便利なリンク集です。</p>
        <p>また、ディストリ共通の項目についてもここにまとめています。</p>
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
