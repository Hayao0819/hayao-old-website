<!DOCTYPE html>
<html lang="ja">
<head>

    <?php
        // ページ設定
        $title = "Arch Linux - トップ";
        $commonhtml = "${_SERVER['DOCUMENT_ROOT']}/buildmydist-2/commonhtml";
        $distro = "archiso";

        // 共通ファイルを読み込み
        $domain = $_SERVER['HTTP_HOST'];
        include("${commonhtml}/head.php");
    ?>

</head>
<body>
    <?php include("${commonhtml}/beforemain.php"); ?>

    <main>
        <h2>Arch Linuxについて</h2>
        <p>Arch Linuxはarchisoというシェルスクリプトを利用してビルドします。</p>
        <p>設定プロファイルを追加することによって、カスタマイズを行います。</p>
        <p>ArchisoはあくまでCLIのArch Linux公式のライブCDをビルドすることに特化しているため、初心者にはとっつきにくいものになっています。</p>
    </main>

    <?php include("${commonhtml}/aftermain.php"); ?>
</body>
</html>
