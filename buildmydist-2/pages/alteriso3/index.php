<!DOCTYPE html>
<html lang="ja">
<head>

    <?php
        // ページ設定
        $title = "Alter Linux - トップ";
        $commonhtml = "${_SERVER['DOCUMENT_ROOT']}/buildmydist-2/commonhtml";
        $distro = "alteriso3";

        // 共通ファイルを読み込み
        $domain = $_SERVER['HTTP_HOST'];
        include("${commonhtml}/head.php");
    ?>

</head>
<body>
    <?php include("${commonhtml}/header.php"); ?>

    <main>
        <h2>Alter Linuxについて</h2>
        <p>Alter LinuxはArch LinuxをベースにFascode Networkが開発しているディストリビューションです</p>
        <p>CLIに特化しているArchisoを基に独自のAlterISO3というツールを開発しました。</p>
        <p>AlterISO3ではArchisoでできないことをコードを書かずにかんたんに実行できるようにする工夫がなされています。</p>
    </main>

    <?php include("${commonhtml}/footer.php"); ?>
</body>
</html>
