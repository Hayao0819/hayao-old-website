<!DOCTYPE html>
<html lang="ja">
<head>

    <?php
        // ページ設定
        $title = "Alter Linux - カスタマイズ";
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
        <h2>AlterISO3のチャンネルを作成する</h2>
        <p>実際に独自のカスタマイズを施し、チャンネルの開発を行っていきます。</p>

        <h2>このサイトの手順で開発をするもの</h2>
        <p>今回は新しくAlter Linuxのエディションを開発します。だいたいの方針は以下のとおりです。</p>
        <ul>
            <li>ウィンドウマネージャとしてOpenBoxを採用</li>
            <li>アプリケーションの起動はPlankとUlauncher</li>
            <li>GTKのテーマはAdaptaでアイコンのテーマはPapirus`</li>
            <li>デスクトップの処理やファイルマネージャーにはPCManFMを採用</li>
            <li>64bit版と32bit版を作成する</li>
            <li>OSの名前は「Karaage OS」にする</li>
            <li>チャンネル名は「karaage」にする</li>
        </ul>

        <h2>basicチャンネルをコピーして最低限の改造をしよう</h2>
        <p>ターミナルを開きbuild.shがあるディレクトリまで移動してください。</p>
        <p>AlterISO3にはかんたんにチャンネルを開発できるようにするためのベースチャンネルが用意されています。</p>
        <p>ここには最低限必須のファイルが既に揃っているのでそれを改造して最低限の準備を整えます。</p>

        <h3>basicをコピーしよう</h3>
        <p>コマンドでbasicチャンネルをコピーします</p>
        <p><code>.add</code>というのを付け加えることによってAlterISO3のそのもののソースコード管理から除外しつつAlterISO3にチャンネルとして正しく認識させることができます。</p>
        <code class="code language-shell">
            cd channels<br>
            cp -r basic/ karaage.add/<br>
        </code>
        <p>ここで作成されたkaraage.addが1つのチャンネルを構成するディレクトリになります。</p>
        <p>これを今後は「チャンネルディレクトリ」と呼びます。</p>

        <h3>必要なファイルを書き換えよう</h3>
        <p>いくつか用意されているファイルを書き換えます。</p>

        <h4>airootfs.any/root/custmize_airootfs_basic.sh</h4>
        <p>このディレクトリとスクリプトの意味は後々に解説します。とりあえずこのスクリプトを以下のように変更してください。</p>
        <p><code>custmize_airootfs_basic.sh</code>から<code>custmize_airootfs_karaage.sh</code>に変更します。</p>
        <p>最後の<code>_</code>のあとをチャンネル名にしてください。</p>

        <h4>alteriso</h4>
        <p>alterisoファイルはチャンネルが対応しているAlterISOのバージョンを書くためのものです。</p>
        <p>このファイルを変更してしまうとbuild.shに認識されなくなってしまうので十分注意してください。このファイルはチャンネルを構成する上で唯一必須のものです。</p>

        <h4>architecture</h4>
        <p>利用可能なアーキテクチャを1行ずつ列挙していきます。</p>
        <p>今回はi686版とx86_64版を作りますので、特に変更はいらないと思います。</p>
        <p>x86_64だけ、i686だけ、のようにしたい場合には先頭に#をつけてコメントアウトしてください。</p>

        <h4>config.any</h4>
        <p>後々でとても重要になってくるのですが、現段階では特に変更することはありません。</p>
        <p>このファイルはシェルスクリプトになっており、主にAlterISO3の設定(変数の定義)を行います。</p>
        <p>この設定に記述可能な変数は全てdefault.confに記述されています。(OS名やデフォルトのユーザー名などもここで設定します。)</p>

        <h4>description.txt</h4>
        <p>チャンネルの説明を記述するファイルです。</p>
        <p>build.shのヘルプを見たとき、下の方にチャンネルの一覧とその説明が表示されていたはずです。</p>
        <p>そのチャンネルの説明をこのファイルで定義します。</p>
        <p>基本的に1行で記述するのが望ましいです。</p>

        <h3>チャンネルの完全な仕様を確認する</h3>
        <p>上のセクションではbasicチャンネルに存在している最低限のファイルを書きましたが、gnomeやxfceなどの他のチャンネルを見てみると他にも数多くのファイルが設置されているのがわかると思います。</p>
        <p>チャンネルディレクトリ無いに置くことができるファイルの完全な一覧は全てドキュメント化されているのでそちらを参考にしてください。</p>
        <p>（主要なファイルはこのサイトでも解説しますが、細かい仕様や特殊な状況でしか使用しないファイルについては解説を行いませんのでドキュメントを読んでください。）</p>
        <p><a href="https://github.com/FascodeNet/alterlinux/tree/dev/docs/jp">完全なドキュメント一覧はこちら</a></p>

        <h2>shareチャンネルについて</h2>
        <p>AlterISO3には開発をものすごく容易にする「shareチャンネル」という仕組みがあります</p>
        <p>shareチャンネルは、ビルドされるチャンネルに関わらず自動で追加されるパッケージやファイルの集まりです。</p>
        <p>この仕組みによってチャンネルで共通のファイルを1箇所で管理し、また新しいチャンネルのソースコードを最小限に抑えます</p>
        <p>例えばLinuxカーネルやブートローダーなどはチャンネルに関わらず必ずインストールされます。</p>
        <p>また、ホスト名を設定する<code>/etc/hostname</code>や<code>/etc/bash.bashrc</code>などのファイルも必ず必要です。</p>
        <p>shareチャンネルにそれらをまとめることによって自動で追加されるようになっています。</p>
        <p>今この記事を見ているあなたが、AlterISO3本体の開発に関わりたいのではなく単純にチャンネルを作りたいだけなのならそこまで深く理解する必要はありません。</p>
        <p>単純に「必要なパッケージやファイルは自動で追加されるんだな」と思ってください。</p>
        <br>
        <p>shareチャンネルには「share」と「share-extra」があります。</p>
        <p>shareは強制的に全てのチャンネルで使用されますが、share-extraは設定ファイルで使用するかどうかを選択できます。</p>
        <p>というのも、share-extraはGUIのためのファイルやパッケージが多く含まれており、CLIのチャンネルを構成したい場合には邪魔にしかならないためです。</p>
        <br>
        <p>今回はGUIのチャンネルを開発するのでshare-extraを有効化する必要があります。</p>
        <p>有効化の設定はチャンネル設定ファイルで行います。まずはその設定ファイルについてを解説します。</p>


        <h2>チャンネル設定を定義しよう</h2>
        <p>チャンネル設定はチャンネルディレクトリ直下にある<code>config.any</code>で行います。</p>
        <p>もしアーキテクチャごとに異なる設定を適用したい場合には<code>config.i686</code>や<code>config.x86_64</code>に書きます。</p>
        <p>設定可能な値は全て<code>default.conf</code>に記述されていますので、それをコピーしてから編集します。</p>
        <p>様々な値をここで設定するので1つづつ見ていきます。</p>
        

        <h3>OSの名前を設定しよう</h3>
        <p>本来AlterISOはAlter Linuxのために開発されたのでデフォルトのOS名はAlter Linuxになっています。</p>
        <p>設定でOSの名前を自由に変更できるようになっているので、それを変更します。</p>
        <p>OS名は複数の変数で定義されています。それをまずは変更していきます。</p>
<pre class="line-numbers"><code class="language-shell">
# OS name used for startup screen, etc.
# This setting cannot be changed by an argument.
os_name="Alter Linux"

# OS name used for the name of the image file.
# This setting cannot be changed by an argument.
iso_name=alterlinux

# Image file label
# This setting cannot be changed by an argument.
iso_label="ALTER_$(date +%Y%m%d)"

# Directory name used for installation
# This setting cannot be changed by an argument.
install_dir=alter
</code></pre>
        <p>該当しているのはこの部分です。1つづつ見ていきます。</p>

        <h4>os_name</h4>
        <p>一番基本となるOS名です。空白や大文字などを含めることが出来ます。</p>
        <p>今回のOS名は「Karaage OS」なので、以下のように設定します。</p>
        <div class="code language-shell">os_name="Karaage OS"</div>

        <h4>iso_name</h4>
        <p>iso_nameはビルドされたISOのファイル名になります。</p>
        <p>空白や大文字を含めると思わぬエラーを引き起こす可能性があるので、小文字だけにすることをおすすめします。</p>
        <div class="code language-shell">iso_name="karaageos"</div>

        <h4>iso_label</h4>
        <p>ビルドされたisoをディスクに焼いたり、マウントしたりした際に使用されるラベルです。</p>
        <p>全て大文字にするのが良いと思いますので以下のようにします。</p>
        <div class="code language-shell">iso_label="KARAAGE_$(date +%Y%m%d)"</div>

        <h4>install_dir</h4>
        <p>システム内部で使用されるディレクトリの名前です。短くて小文字が良いと思います。</p>
        <p>（あまりに長いとブートローダーで細かい設定をするときに面倒になります。）</p>
        <div class="code language-shell">install_dir="karaage"</div>

        <h4>最終的なconfig.any</h4>
        <p>コメントも含め他方が良いので最終的に以下のようになります。</p>
<pre class="line-numbers"><code class="language-shell">
# OS name used for startup screen, etc.
# This setting cannot be changed by an argument.
os_name="Karaage OS"

# OS name used for the name of the image file.
# This setting cannot be changed by an argument.
iso_name="karaageos"

# Image file label
# This setting cannot be changed by an argument.
iso_label="KARAAGE_$(date +%Y%m%d)"

# Directory name used for installation
# This setting cannot be changed by an argument.
install_dir="karaage"
</code></pre>


        <h2>パッケージリストを定義しよう</h2>
        <p>ここからいよいよ本格的にチャンネルの開発を始めます。</p>
        <p>まずはインストールするパッケージを決めます。</p>
        <p>実はシステムの構成やGUIに必要なパッケージは全て「shareチャンネル」という仕組みによって自動でインストールされます。</p>
        <p></p>

    </main>

    <?php include("${commonhtml}/aftermain.php"); ?>
</body>
</html>
