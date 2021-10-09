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
        <p>fedoraはRHELから派生して開発されているディストリビューションです。</p>
        <p>RHELのテストのような扱いになっており、Fedoraで新機能がテストされ、安定したものがRHELに取り込まれるという形になっています。</p>
        <p>Fascode Networkで開発されているSerene Linuxは現在はFedoraベースで開発されています。</p>

        <h2>Fedoraベースでディストリを開発するには</h2>
        <p>Fedora 33をベースに開発する最もかんたんな方法は「LFBS」を使用することです。</p>
        <p>LFBSは、Archisoに影響を受けてFascode Networkで開発を行っているスクリプト群の総称です。</p>
        <p>（開発リーダーは<a href="https://twitter.com/kokkiemouse">kokkiemouse</a> で、ハヤオもちょこちょこ開発に参加しています）</p>
        <p>LFBSを利用するとかんたんに派生ディストリを構築することができます。</p>

        <div class="box-warning">
            LFBSの開発はまだ初期段階です。仕様が確定したら追記を行います。
        </div>

    </main>

    <?php include("${commonhtml}/aftermain.php"); ?>
</body>
</html>
