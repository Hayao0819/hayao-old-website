<!DOCTYPE html>
<html lang="ja">
<head>

    <?php
        // ページ設定
        $title = "pacmanのパッケージを作る";
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
        <h2>pacmanのパッケージを作る</h2>
        <p>pacmanのパッケージを作ると、ユーザーにアップデートを配布したり、開発者の管理が楽になったりします。</p>
        <p>中でもArch Linuxが採用しているパッケージマネージャのpacmanはものすごくかんたんにパッケージを作成できます。</p>
        <p>以下はそのパッケージを開発するためのまとめです。</p>

        <h2>makepkgとPKGBUILD</h2>
        <p>pacmanのパッケージファイルは<code>.pkg.tar.xz(.pkg.tar.zst)</code>という拡張子のアーカイブファイルです。</p>
        <p>そしてそのパッケージをコンパイルや圧縮を自動化するための仕組みがmakepkgとPKGBUILDです。</p>
        <p>makepkgはコマンドの名前でPKGBUILDはファイル名です。</p>
        <p>makepkgコマンドによってPKGBUILD（シェルスクリプト）の内容を読み取り、パッケージを作成します。</p>
        <p>つまり、PKGBUILDファイルを書けばpacmanのパッケージを作ることが出来ます。</p>

        <h2>PKGBUILDの構造</h2>
        <p>PKGBUILDの中身は完全なシェルスクリプトです。（何ならmakepkgコマンドもBashで書かれています。）</p>
        <p>PKGBUILDは変数と関数の定義で構成されています。</p>
        <h3>PKGBUILDで定義するべき変数</h3>
        <p>最低限、必ず定義する変数と状況によって定義する変数があります。</p>
        <p>正式な仕様は<a href="https://wiki.archlinux.jp/index.php/PKGBUILD">ArchWiki</a>を参照してください。</p>
        <h3>PKGBUILDで定義できる関数</h3>
        <p>PKGBUILDは変数を読み取ったあと、設定されている関数を順番に実行します。</p>
        <p>設定できる、するべき関数は<a href="https://wiki.archlinux.jp/index.php/%E3%83%91%E3%83%83%E3%82%B1%E3%83%BC%E3%82%B8%E3%81%AE%E4%BD%9C%E6%88%90#PKGBUILD.E3.81.AE.E4.BD.9C.E6.88.90">ArchWiki</a>を参照してください。</p>
        <h3>知っておくと便利なこと</h3>
        <p>PKGBUILDのいくつかできることがあります。（詳細は各自で検索してください。後々追記すると思います。）</p>
        <ul>
            <li>1つのPKGBUIDで複数のパッケージを作成できます。</li>
            <li>アーキテクチャごとにsourceやchecksumを切り替えることができます。</li>
            <li><code>$srcdir</code>と<code>$pkgdir</code>は自動て定義される変数で、「ソースが入っているディレクトリ」「実際にパッケージに含まれるディレクトリ」としてPKGBUILDから参照できます。</li>
        </ul>
        
        <h2>作成されたパッケージが適切かどうかを検証する</h2>
        <p><code>namcap</code>を使用してパッケージが適切かどうかを検証してください。</p>
        <p>また<code>sudo pacman -U /path/to/pkg</code>を実行して実際にインストールしてみてください。</p>


        <h2>作成されたパッケージをAURに投稿する</h2>
        <p>作成されたPKGBUILDは誰でもかんたんに使えるようにAURに投稿することができます。</p>
        <p>以下はそのための手順が記されたWikiへのリンク集です。</p>

        <h3>パッケージガイドラインに沿っているかを確認する</h3>
        <p>AURはユーザーが誰でもパッケージを投稿できるシステムです。秩序を守るためにガイドラインが有ります。</p>
        <p>ガイドラインにそって適切なパッケージを作成してください。</p>
        <p><a href="https://wiki.archlinux.jp/index.php/Arch_%E3%83%91%E3%83%83%E3%82%B1%E3%83%BC%E3%82%B8%E3%82%AC%E3%82%A4%E3%83%89%E3%83%A9%E3%82%A4%E3%83%B3">パッケージガイドラインはこちら</a></p>

        <h3>AURに送信する</h3>
        <p>PKGBUILDを送信するためにSSHの設定を最初に行う必要があります（初回だけです。2回目以降は必要ありません）</p>
        <p>それらのやり方は全てArchWikiで解説されています。</p>
        <p><a href="https://wiki.archlinux.jp/index.php/Arch_User_Repository#.E3.83.91.E3.83.83.E3.82.B1.E3.83.BC.E3.82.B8.E3.82.92.E6.8A.95.E7.A8.BF.E3.81.99.E3.82.8B">AURに投稿するための準備とコマンドはこちら</a></p>

        <h3>投稿ルールに従う</h3>
        <p>パッケージガイドラインにも投稿のルールがあります。</p>
        <p><a href="https://wiki.archlinux.jp/index.php/Arch_User_Repository#.E3.83.91.E3.83.83.E3.82.B1.E3.83.BC.E3.82.B8.E3.81.AE.E6.8A.95.E7.A8.BF.E3.83.AB.E3.83.BC.E3.83.AB">投稿ルールはこちら</a></p>

        <h2>PKGBUILDをAlterISO3に含める</h2>
        <p>後々追記します。（現在開発中の機能です。）</p>
    </main>

    <?php include("${commonhtml}/aftermain.php"); ?>
</body>
</html>
