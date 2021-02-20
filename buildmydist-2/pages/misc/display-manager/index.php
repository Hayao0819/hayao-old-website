<!DOCTYPE html>
<html lang="ja">
<head>

    <?php
        // ページ設定
        $title = "ディスプレイマネージャ";
        $commonhtml = "${_SERVER['DOCUMENT_ROOT']}/buildmydist-2/commonhtml";
        $distro = "misc";
        $description = "";

        // 共通ファイルを読み込み
        $domain = $_SERVER['HTTP_HOST'];
        include("${commonhtml}/head.php");
    ?>

</head>
<body>
    <?php include("${commonhtml}/beforemain.php"); ?>

    <main>
        <h2>ディスプレイマネージャについて</h2>
        <p>ディスプレイマネージャはログイン画面の処理を担当しているソフトウェアです。</p>
        <p>内部的にはユーザーの認証とログイン、デスクトップ環境の起動などを行います。</p>
        <p>内部的な面はどのディスプレイマネージャも差がないので、主にGUI部分でどれを使うか決めます。</p>

        <h2>主なディスプレイマネージャ</h2>
        <h3>LightDM</h3>
        <p>最もよく使われている（印象がある）ディスプレイマネージャです。</p>
        <p>「Greeter」という概念によって内部的なログイン処理とGUIのログイン画面を分離させることによって、圧倒的なカスタマイズ性能を誇ります。</p>
        <p>動作も非常に軽快で、特別な理由がない限りはLigthDMを選択しておけば間違いありません。</p>
        <p>（Greeterもたくさんの種類があるので、別のページで解説をしようと思います。）</p>
        <br>
        <p>以下のスクリーンショットは全てLightDMです。</p>
        <p>
            <img src="/buildmydist-2/pages/misc/display-manager/images/lightdm-gtk-greeter.png" alt="GTK-Greeter">
            <img src="/buildmydist-2/pages/misc/display-manager/images/lightdm-slick-greeter.jpeg" alt="Slick-Greeter">
            <img src="/buildmydist-2/pages/misc/display-manager/images/lightdm-webkit2-greeter.jpg" alt="Webkit2-Greeter">
        </p>

    </main>

    <?php include("${commonhtml}/aftermain.php"); ?>
</body>
</html>
