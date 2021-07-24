<!DOCTYPE html>
<html lang="ja">
<head>

    <?php
        // ページ設定
        $title = "Ubuntu 18.04 - トップ";
        $commonhtml = "${_SERVER['DOCUMENT_ROOT']}/buildmydist-2/commonhtml";
        $distro = "ubuntu1804";

        // 共通ファイルを読み込み
        $domain = $_SERVER['HTTP_HOST'];
        include("${commonhtml}/head.php");
    ?>

</head>
<body>
    <?php include("${commonhtml}/beforemain.php"); ?>

    <main>
        <h2>警告</h2>
        <p>ここで説明している内容はUbuntu 18.04LTSでしか使用できません。</p>
        <p>Ubunbtu 20.04以降の場合はPython2系が使用できないのでBodhi Builderが使用できないので注意してください。</p>

        <h2>主な作り方</h2>
        <p>Ubuntu 18.04をカスタマイズする場合は既に構築されたUbuntu環境をもとにイメージファイルを構築します。</p>
        <p>そのためAlter Linuxのようにソースコードでの管理ができません。</p>
        <p>本格的な開発ではなく、あくまでも簡易的なものとして使うのが良いでしょう。</p>

        <h2>開発を始める</h2>
        <p>まずは準備編で必要なファイルや環境の構築を行いましょう。</p>
        <p><a href="./preparation/">準備編</a>に進む</p>


    </main>

    <?php include("${commonhtml}/aftermain.php"); ?>
</body>
</html>
