<!DOCTYPE html>
<html lang="ja">
<head>

    <?php
        // ページ設定
        $title = "GTKのデスクトップ環境でQtアプリを使う";
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
        <h2>GTKのデスクトップ環境でQtアプリを使う</h2>
        <p>GTKがベースのデスクトップ環境でQtを使うと、見た目が古い感じになります。</p>
        <p><img src="/buildmydist-2/pages/misc/qt5ct/images/without-qt5ct-vlc.png" alt="VLC without Qt5 on Xfce"></p>
        <p>それを適切な設定を行うことでGTKテーマを適用することができます。</p>
        <p><img src="/buildmydist-2/pages/misc/qt5ct/images/with-qt5ct-vlc.png" alt="VLC with Qt5 on Xfce"></p>
        <p>この設定を行うための手順を説明します。</p>
        <div class="box-warning">
            AlterISO3で<code>share-extra</code>を使用する場合はこの設定は不要です。（自動で設定されます。）
        </div>

        <h2>ArchWiki</h2>
        <p><a href="https://wiki.archlinux.jp/index.php/Qt_%E3%81%A8_GTK_%E3%82%A2%E3%83%97%E3%83%AA%E3%82%B1%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E3%81%AE%E5%A4%96%E8%A6%B3%E3%81%AE%E7%B5%B1%E5%90%88">QtとGTKアプリケーションの外観の統合</a>も参照してください。</p>

        <h2>警告</h2>
        <p>このページではArch Linuxを前提に解説を行います。パッケージのインストールなぞはそれぞれのパッケージマネージャに適している方法ととってください。</p>

        <h2>必要なパッケージをインストールする</h2>
        <p>まずは必要なパッケージをインストールします。</p>
        <p>AURからパッケージを取得するので必ずyayをインストールしておいてください。</p>
        <p>yayはpacmanよりも多くのパッケージをインストールすることができるツールです。</p>
        <p>yayのインストール方法については<a href="https://blog.fascode.net/2020/11/22/use-yay-bin/">こちら</a>を参照してください。</p>
        <code class="code language-shell">
            yay -S --noconfirm qt5ct qt5-styleplugins
        </code>
        <div class="box-warning">
            <p>qt5ctは公式リポジトリから、qt5-stylepluginsはAURからインストールします。</p>
            <p>AlterISO3で以下の設定を行う場合は注意しください。</p>
        </div>

        <h2>環境変数を設定する</h2>
        <p>環境変数<code>QT_QPA_PLATFORMTHEME</code>を設定します。</p>
        <p>
            以下のファイルの末尾に
            <code class="code language-shell">QT_QPA_PLATFORMTHEME=vlc</code>
            と記述してください
        </p>
        <ul>
            <li><code>/etc/bash.bashrc</code></li>
            <li><code>/etc/skel/.profile</code></li>
            <li><code>~/.profile</code></li>
            <li>(zshを使っている人は) <code>/etc/zsh/zshenv</code></li>
        </ul>
        <p>いくつか存在しないファイルが有ると思うので無い場合は追記を行ってください。</p>
        <p>fishなどのその他のシェルを設定している場合はそれぞれの適切な設定ファイルに追記を行ってください。</p>

        <h2>qt5ctの設定を変更する</h2>
        <p><img src="/buildmydist-2/pages/misc/qt5ct/images/qt5ct-1.png" alt="Qt5ct Screen Shot"></p>
        <p>デフォルトではこのようになっています。これを...</p>
        <p><img src="/buildmydist-2/pages/misc/qt5ct/images/qt5ct-2.png" alt="Qt5ct Screen Shot"></p>
        <p>このように設定を変更し、qt5ctを再起動します。しっかりとGTKテーマが適用されていれば成功です。</p>
        <h3>おまけ</h3>
        <p>Qt5ctの設定ファイルは<code>~/.config/qt5ct/qt5ct.conf</code>にあります。</p>
        <p>AlterISO3などで利用する場合に参考にしてください。</p>


        <h2>終わり</h2>
        <p>これで完了です。ターミナルからvlcなどのqtアプリを起動するとGTKテーマが適用されているはずです。</p>
    </main>

    <?php include("${commonhtml}/aftermain.php"); ?>
</body>
</html>
