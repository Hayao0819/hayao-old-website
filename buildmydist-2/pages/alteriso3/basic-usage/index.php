<!DOCTYPE html>
<html lang="ja">
<head>

    <?php
        // ページ設定
        $title = "Alter Linux - 基本的な使い方";
        $commonhtml = "${_SERVER['DOCUMENT_ROOT']}/buildmydist-2/commonhtml";
        $distro = "alteriso3";

        // 共通ファイルを読み込み
        $domain = $_SERVER['HTTP_HOST'];
        include("${commonhtml}/head.php");
    ?>

</head>
<body>
    <?php include("${commonhtml}/beforemain.php"); ?>

    <main>
        <h2>AlterISO3の基本的な使い方</h2>
        <p>基本的な使い方はコマンドラインで<code>build.sh</code>を実行するだけです。</p>
        <p>設定はコマンドラインオプションや設定ファイルで行います。</p>
        
        <h2>チャンネルについて</h2>
        <p>AlterISO3では、1つの設定やファイルの集合を「チャンネル」という単位で管理しています。</p>
        <p>例えば「Alter Linux Xfce」と「Alter Linux LXDE」というようにチャンネルを切り替えます。</p>
        <p>その1つのチャンネルの中で「日本語版」「英語版」「x86_64」「i686」のように設定を行っていきます。</p>
        <p>基本的にはデスクトップ環境やウィンドウマネージャでチャンネルを分けるのが良いと思います。</p>

        <h2>AlterISO3本体を取得しよう</h2>
        <p>GitHubからソースコードを取得します。</p>
        <div class="code language-shell">
            git clone "https://github.com/FascodeNet/alterlinux"<br>
            cd alterlinux/<br>
            ./build.sh -h
        </div>
        <p>上のコマンドでbuild.shの使い方が表示されれば成功です。</p>

        <h2>とりあえずビルドしてみよう</h2>
        <p>Alter Linux Xfceをまずはビルドしてみましょう。</p>
        <div class="code language-shell">
            sudo ./build.sh -b xfce
        </div>
        <p>これでビルドが開始されるはずです。</p>
        <p><code>-b</code>はブートスプラッシュ（起動時のアニメーション）を有効化するオプションです。</p>
        <p>開始されずにエラーが出た場合は<a href="../error/">エラー一覧とその対処方法</a>を参照してください。</p>


        <h2>ビルドオプションを確認しよう</h2>
        <p>build.shには様々なオプション、設定が有ります。</p>
        <p>それらは以下のコマンドで確認できます。</p>
        <div class="code language-shell">
            ./build.sh -h
        </div>
        <br>
        <p>英語ですがかんたんだと思うでの頑張って読んでください（投げやり）</p>
        <p>例えば、「カーネルはlts、アーキテクチャはi686、lxdeでデバッグメッセージを有効化する」という場合は以下のようにコマンドを実行します。</p>
        <div class="code language-shell">
            sudo ./build.sh -k lts -a i686 -d lxde
        </div>
        


        <h2>作成されたisoを手に入れる</h2>
        <p><code>out</code>ディレクトリ内にisoがあるはずです。</p>
        <p>rootユーザーが所有しているので自分が所有するように書き換えます。</p>
        <p><code>user</code>という部分を自分のユーザー名に置き換えてください。</p>
        <div class="code language-shell">
            sudo chown user ./out/*<br>
            sudo chmod 644 ./out/*<br>
        </div>
        <p>あとは<code>cp</code>コマンドなりGUIなりでisoファイルを移動してください。</p>

        <h2>作成されたisoを起動してみよう</h2>
        <p>通常のLinuxを起動するようにisoを仮想マシンで指定して起動します。</p>
        <p>仮想マシンの使い方については<a href="/pages/misc/virtual/index.php"></a>を参照してください。</p>
        <p>もし起動できない場合は以下に従ってください。</p>

        <h2>起動時にエラーが出たり、起動できない場合には</h2>
        <p>ビルドログを精査して、エラーが出ている箇所がないか確認を行ってください。</p>
        <p>また、チェックサムを確認してファイルのコピーやダウンロードが正常に行われているかを確認してください。</p>
        <p><a href="https://0e0.pw/aRx1">チェックサムの確認方法はこちら</a>を参照してください。</p>

        <h2>さいごに</h2>
        <p>AlterISO3の大体の使い方はわかったでしょうか？</p>
        <p>次は実際にAlterISO3を利用してカスタマイズを行っていこうと思います。</p>
        <p><a href="../customize/">次のページに進む</a></p>

    </main>

    <?php include("${commonhtml}/aftermain.php"); ?>
</body>
</html>
