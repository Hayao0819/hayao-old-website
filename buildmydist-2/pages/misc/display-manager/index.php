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
        <p>ただし、設定を変更する場合は設定ファイルをroot権限で操作する必要があります。（一部GreeterはGUIが用意されています。）</p>
        <br>
        <p>以下のスクリーンショットは全てLightDMです。</p>
        <p>
            <img src="/buildmydist-2/pages/misc/display-manager/images/lightdm-gtk-greeter.png" alt="GTK-Greeter">
            <img src="/buildmydist-2/pages/misc/display-manager/images/lightdm-slick-greeter.jpeg" alt="Slick-Greeter">
            <img src="/buildmydist-2/pages/misc/display-manager/images/lightdm-webkit2-greeter.jpg" alt="Webkit2-Greeter">
        </p>

        <h3>GDM3</h3>
        <p>デスクトップ環境でも有名なGnomeが開発しているディスプレイマネージャです。</p>
        <p>モダンなUIでGnomeと相性がいいことが特徴ですが、カスタマイズをするにはdconfを操作する必要があり少々面倒です。</p>
        <p>（現在ハヤオがコマンドラインでかんたんに設定を行えるツールを開発していたりします）</p>
        <p>lightDmより動作も多少重いという印象が有ります。GDM3はGnome3に伴って大きく書き直されています。</p>
        <p>
            <img src="/buildmydist-2/pages/misc/display-manager/images/gdm.jpg" alt="GDM">
        </p>

        <h3>SDDM</h3>
        <p>Simple Desktop Display Managerの略です。KubuntuやPlasmaのデフォルトのディスプレイマネージャです。</p>
        <p>QMLを利用したテーマをサポートしているという点ではLightDMと似ています。</p>
        <p>設定をGUIから行えるというのも特徴です。</p>
        <p>
            <img src="/buildmydist-2/pages/misc/display-manager/images/sddm-default-theme.jpg" alt="">
        </p>

        <h3>LXDM</h3>
        <p>Lxdeのために開発されたディスプレイマネージャ。（その割にはLxdeはLightDMと一緒に使われてるような）</p>
        <p>GTK+2で書かれた軽量なディスプレイマネージャです。<s>正直ダサいのであまり使いみちはないような</s></p>
        <p>
            <img src="./images/lxdm.png" alt="LXDM">
        </p>

        <h3>KDM</h3>
        <p>昔の記事ではKDMが紹介されていますが、KDMはKDE 4以前で使用されていたディスプレイマネージャで、現在は既に開発が終了しています。</p>

        <h3>SLiM</h3>
        <p>最小限の依存関係で動作する非常に軽量なディスプレイマネージャ。2014年で開発が終了しているので使わないほうがいいです。</p>

        <h3>MDM</h3>
        <p>Gnome3に伴って大きく変更されたGDM3の前のバージョン（GDM2）のフォークです。</p>
        <p>2021年2月現在、2018年から更新されてないので使用しないほうが良いと思います。</p>


        <h3>NoDM</h3>
        <p>NoDMはGUIを提供しないディスプレイマネージャです。CLIによる自動化に特化しています。</p>
        <p>しかし2021年2月現在、2019年から開発が止まっているようなので使用はおすすめしません。</p>
        <p>ほとんど同じかそれ以上のことをLightDMの自動ログインで実現することができます。</p>

        <h2>結局どれが一番良いのか</h2>
        <p>ディスプレイマネージャはセキュリティ的にとても重要な部分です。</p>
        <p>そのため開発が終了しているディスプレイマネージャは使うべきではありません。</p>
        <p>それを踏まえた上で使うべきディスプレイマネージャは「LightDM」「GDM」「SDDM」のどれかになります。</p>
        <p>この3つは現在も活発に開発が続けられているため、どれを選んでも問題ないでしょう。</p>
        <p>あとはパッケージやその依存関係の大きさ、見た目、設定のしやすさなどで決めると良いと思います。</p>

        <h2>今使ってるディスプレイマネージャを調べる</h2>
        <p>systemdは現在有効化されているディスプレイマネージャへのシンボリックリンクを作成します。</p>
        <p><code>readlink</code>でシンボリックリンクが指している先を探し、<code>cut</code>と<code>basename</code>で名前のみを抽出しています。</p>
        <div class="code language-shell">
            basename $(readlink /etc/systemd/system/display-manager.service) | cut -d '.' -f 1
        </div>

        <h2>それぞれのディスプレイマネージャについての情報</h2>
        <p>追加してほしいサイトがあれば管理人までお願いします。</p>

        <h3>LightDM</h3>
        <ul>
            <li><a href="https://wiki.archlinux.jp/index.php/LightDM">LightDM - ArchWiki</a></li>
            <li><a href="https://github.com/canonical/lightdm">LightDM ソースコード</a></li>
            <li><a href="https://wiki.gentoo.org/wiki/LightDM/ja">LightDM - Gentoo Wiki</a></li>
            <li><a href="https://ja.wikipedia.org/wiki/LightDM">LightDM - Wikipedia</a></li>
        </ul>

        <h3>GDM3</h3>
        <ul>
            <li><a href="https://wiki.archlinux.jp/index.php/GDM">GDM - ArchWiki</a></li>
            <li><a href="https://wiki.gnome.org/Projects/GDM">GDM Project 公式サイト</a></li>
            <li><a href="https://help.gnome.org/admin/gdm/">GDMのドキュメント</a></li>
        </ul>



    </main>

    <?php include("${commonhtml}/aftermain.php"); ?>
</body>
</html>
