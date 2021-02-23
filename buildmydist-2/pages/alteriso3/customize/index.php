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
            <li>GTKのテーマはAdaptaでアイコンのテーマはPapirus</li>
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
        <p>今回は「Karaage OS consisting of Openbox and Ulauncher」（OpenboxとUlauncherで構成された Karaage OS）としました。</p>

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
        <p>様々な値をここで設定するので1つずつ見ていきます。</p>
        

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
        <p>該当しているのはこの部分です。1つずつ見ていきます。</p>

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
        <p>コメントも含めた方が良いので最終的に以下のようになります。</p>
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
        <p>これで設定ファイルがビルド開始時に自動で読み込まれるようになります。</p>

        <h3>share-extraを有効化する</h3>
        <p>先程も説明したshare-extraチャンネルを使用するための設定を行います。</p>
        <p><code>default,conf</code>の後ろのほうに<code>include_extra</code>という変数が有るはずです。</p>
        <p>その設定とコメントをコピーして<code>config.any</code>に貼り付けます。</p>
        <p>そして<code>false</code>になっている部分を<code>true</code>に変更してください。</p>
        <p>これでshare-extraが含まれるようになります。</p>
        <p>（basicチャンネルをベースにしているので既にtrueに設定されているかもしれません。）</p>

        <h2>パッケージリストを定義しよう</h2>
        <p>ここからいよいよ本格的にチャンネルの開発を始めます。</p>

        <h3>インストールするパッケージを決めよう</h3>
        <p>まずはインストールするパッケージを決めます。</p>
        <p>先程も解説したとおり、ほとんどのパッケージはshare-extraによってインストールされるため、必要なことはそれほど多くありません。</p>
        <p>現にxfceチャンネルで指定されているパッケージもディスプレイマネージャとデスクトップ環境、そしてGTKのアイコンとテーマです。</p>
        <p>公式リポジトリのパッケージリストは全て<code>packages</code>ディレクトリ内に配置します。</p>
        <p>（AURのパッケージリストは別の場所に記述します。）</p>
        <p><code>config.x86_64</code>などと同様に拡張子でアーキテクチャを表しますが、パッケージリストはanyをサポートしていません。必ず対応しているアーキテクチャ分のパッケージリストを書く必要があります。</p>
        <p>パッケージディレクトリの直下に配置された、ファイル名が「.アーキテクチャ」で終わるファイルがパッケージリストとして読み込まれます。</p>
        <p>パッケージリストが書かれたファイル名はアーキテクチャさえ合っていればファイル名は何でも良いです。</p>
        <p>注意する点は、パッケージは1行で1つだけ記述することです。</p>
        
        <h3>もしインストールしたくないパッケージが合ったら</h3>
        <p>shareやshare-extraによって勝手にインストールされてしまうのを防ぎたい場合、excludeファイルを使用してください。</p>
        <p>excludeファイルに記述されているパッケージは明示的なインストールがされなくなります。（依存パッケージとしてインストールされることは有ります。）</p>

        <h3>Karaage OSのパッケージリスト</h3>
        <p>今回はOpenBoxとUlauncher、PCManFMを中心にデスクトップを構成するので、そのパッケージをインストールしていきます。</p>
        <h4>OpenBox</h4>
        <p>インストールするパッケージや設定方法などは<a href="https://wiki.archlinux.jp/index.php/Openbox">ArchWiki</a>が最も参考になります。</p>
        <p>今回はOpenBox本体とその設定ツールとして<code>openbox obconf lxinput lxrandr</code>をインストールします。</p>
        <p>パッケージファイルはそれぞれの役割ごとにカテゴリ分けしたほうが後々で管理をしやすいです。</p>
        <h4>GTKテーマ、アイコンテーマ</h4>
        <p>詳しくは<a href="/buildmydist-2/pages/misc/gtk-icon-theme/">GTKのアイコンとテーマについて</a>を参照してください。</p>
        <div class="box-warning">
            <p>ただし、テーマやアイコンを直接配置するのは推奨されていません。</p>
            <p>必ずPKGBUILDを作成してAURに投稿するなどの方法でインストールを行ってください。</p>
            <p>パッケージの作り方については<a href="http://localhost/buildmydist-2/pages/misc/pkgbuild">pacmanのパッケージを作る</a>を参照してください。</p>
        </div>
        <p>今回は既にArch Linuxの公式リポジトリ上に登録されている<code>adapta-gtk-theme papirus-icon-theme</code>をインストールします。</p>

        <h3>ネットワーク系のツールをインストールする</h3>
        <p>GUI用のネットワークツールとして<code>network-manager-applet</code>をインストールします。</p>
        <p>セキュリティツールとして<code>firewalld ufw</code>をインストールします。</p>
        <p>また、ブラウザとしては<code>chromium</code>をインストールします。</p>

        <h3>ディスプレイマネージャについて</h3>
        <p>ディスプレイマネージャにはLightDMをを採用します。</p>
        <p>また、Greeterとして<code>lightdm-slick-greeter</code>、その設定ツールとして<code>lightdm-settings</code>をインストールします。</p>

        <h3>AURのパッケージについて</h3>
        <p>AURのパッケージリストは<code>packages</code>の代わりに<code>packages_aur</code>ディレクトリにパッケージリストを入れてください。</p>
        <p>今回はAURからUlauncherをインストールしますので、それだけは別の場所に記述します。</p>
        <p><code>karaage.add/packages_aur.x86_64/ulauncher.conf</code>に<code>ulauncher</code>と書きます。</p>
        <p>これでAlterISO3はAURからPKGBUILDを取得してビルドし、インストールします。</p>

        <h3>細かい仕様について</h3>
        <p>Plymouthのパッケージやカーネルパッケージ、言語用パッケージなどの特定の条件でのみインストールされるパッケージがあります。</p>
        <p>それらのカスタマイズは通常のチャンネルでは必要ありませんが、より細かくカスタマイズをしたい場合は知っておくと良いでしょう。</p>
        <p>それらのパッケージの設定方法は<a href="https://github.com/FascodeNet/alterlinux/blob/dev/docs/jp/CHANNEL.md">チャンネルのの仕様</a>の「言語ごとのパッケージ」「カーネルごとのパッケージ」などを参照してください。</p>

        <h2>ここまでのソースコード</h2>
        <p>ここまででパッケージリストの定義といくつかの設定ファイルの変更を行いました。</p>
        <p>どうしても文章ばかりになってしまってわかりにくい箇所も合ったと思うので、ここで一回現段階のソースコードを確認します。</p>
        <p>以下のリンクでGitHub上に公開してあるので参考にしてみてください。</p>
        <p><a href="https://github.com/Hayao0819/alterlinux-channels/tree/54a4bb37232fc2e316feabbc9a957dcea3d54aef/karaage.add">ソースコードはこちら</a></p>
        <p>ここで完成ではなくこれからさらにいろいろといじっていきます。</p>

        <h2>イメージファイルに含める、上書きするファイルを配置する</h2>
        <div class="box-warning">
            このセクションがチャンネル開発の本質でもあり一番難しく、やることが多い部分です。<br>
            そのため解説がめちゃくちゃ長くなっています。ここさえ抜ければかんたんなので頑張ってください。
        </div>
        <p>airootfsディレクトリには上書きするファイルを含めることができます。</p>
        <p>airootfsを/に見立ててディレクトリ構造を維持しながらファイルを上書きします。</p>
        <p>例えば、全てのアーキテクチャで/etc/hostnameを上書きしたい場合は<code>karaage.add/airootfs.any/etc/hostname</code>にファイルを設置します。</p>
        <p>airootfsもpackagesと同様に拡張子でアーキテクチャを識別します。airootfsではanyアーキテクチャを指定可能です。</p>

        <h3>ライブ環境の設定のためにchrootでコマンドを実行する</h3>
        <p>AlterISOではパッケ０時のインストール後に様々なコマンドを実行してユーザー作成や言語設定などをこなっています。</p>
        <p>そしてチャンネル開発者が、自由にコマンドをroot権限で実行できる仕組みが用意されています。</p>
        <p>最初の準備で名前を変更したシェルスクリプトがあったはずです。あれこそがパッケージのインストール後にじっこうされるシェルスクリプトです。</p>
        <p><code>/root/customize_airootfs_[チャンネル名].sh</code>というシェルスクリプトがじっこうされるようになっています。</p>
        <p>ここで「コマンドによる」ライブ環境の設定を行うことができます。</p>
        <p>また、ユーザー名やパスワード、言語、カーネルなどのビルド時に指定された設定は全て変数から利用可能です。利用可能な変数は後々に解説します。</p>
        <p>ただし、注意することが2つあります。</p>
        <p>1つ目は「基本的にファイル作成は行わない」ということです。ファイルの内容までシェルスクリプトに書いてしまうとすぐにスクリプトが大きくなってしまいます。</p>
        <p>その場合はairootfsでファイルを設置しましょう。ユーザー名やカーネルなどのビルドされるまでわからない情報をファイルに含める場合、<code>sed</code>と変数を利用して置き換えるのが最もかんたんです。</p>
        <p>2つめはスクリプトの厳格さです。未定義の変数やコマンドを参照してしまうとエラーでビルドが停止してしまいます。</p>
        <p>また、実行したコマンドが失敗した場合にもビルドが停止してしまいます。それらに気をつけてスクリプトを作成してください。</p>

        <h3>ディスプレイマネージャの設定を行う</h3>
        <p>ここは少々複雑になってしまいます。（ハヤオもこの方法にたどり着くまで時間がかかりました。）</p>
        <p>まずはライブ環境の起動から、パスワードなどの入力を飛ばしてGUIを起動する手順を説明します。</p>
        <p>Arch Linux系のOSはまず、カーネルが起動し最低限のファイルやドライバなどの読み込みを行った後、systemdと呼ばれるソフトを起動します。</p>
        <p>このsystemdはがシステムを本格的に起動して様々な設定やソフトの起動を行います。（難しいので省略します。）</p>
        <p>そしてsystemdはディスプレイマネージャが設定されていない場合はそのままCLIで起動します。</p>
        <p>ここで、OSが起動した後に自動でGUIを立ち上げる方法が2つあることがわかります。</p>
        <p>1つはsystemdからディスプレイマネージャを起動し、自動ログインを利用してデスクトップ環境を起動すること。</p>
        <p>もう1つはCLIでの起動後に<code>.profile</code>などの起動時に自動でじっこうされるシェルスクリプトを利用して起動する方法。</p>
        <p>先に結論を述べます。<b>必ず前者を利用してください。</b>理由は色々とあるので今から説明します。</p>
        <p>まず、シェルスクリプトで単純にGUIを起動することは出来ません。シェルスクリプトで起動を行う場合、<code>xinit</code>と呼ばれるツールを利用して起動を行います。</p>
        <p>実のところAlter Linux Beta2まではこの方法を採用していました。しかし、一部の環境で起動できなかったり認証が正常に行われなかったりと様々なバグが報告されました。</p>
        <p>シェルスクリプトでGUIを起動すると、本来ディスプレイマネージャが自動で行っていることを自分でやる必要が有ります。（もちろんそれをシェルスクリプトでやるのは大変です。）</p>
        <p>そのため、正常にログインや起動処理が行われないことが有ります。それぞれのディスプレイマネージャの自動ログイン機能を利用しましょう。</p>

        <h4>それぞれのディスプレイマネージャに自動ログインを設定する</h4>
        <p>airootfsを利用して自動ログインを設定しましょう。ただし、ここにもまた落とし穴が有ります。</p>
        <p>AlterISO3のビルドオプションをよく見るとライブ環境のユーザー名を自由に変更することが出来ます。</p>
        <p>つまり、直接ユーザー名を設定ファイルに書くことは出来ません。</p>
        <p>そこで先程軽く説明したスクリプトによる置き換えを利用します。</p>
        <p>まず何も考えず普通にディスプレイマネージャの自動ログインを設定してください。</p>
        <p>自動ログインの設定については<a href="">ディスプレイマネージャについて</a>を参照してください。</p>
        <p>その後、自動ログインするユーザーを記述する部分に<code>%USERNAME%</code>と入れてください。</p>
        <p>この<code>%USERNAME%</code>をシェルスクリプトでユーザー名に置き換えます。</p>
        <br>
        <p>もし<code>/etc/lightdm/lightdm.conf</code>にユーザー名を書いたのなら以下のようなコマンドを<code>customize_airootfs</code>に記述してください。</p>
        <pre class="line-numbers"><code class="language-shell">
# Replace auto login user
sed -i "s|%USERNAME%|${username}|g" "/etc/lightdm/lightdm.conf"
        </code></pre>
        <p>設定ファイルのパスは各自で書き換えてください。</p>
        <p>その後、ディスプレイマネージャを自動起動させるためのsystemdのコマンドも同じスクリプトに記述してください。</p>
        <p>これで正常にディスプレイマネージャの自動ログインとGUIの自動起動の設定が出来ました。</p>
        <p>この部分はとてもむずかしいので実際にAlter Linux Xfceなどのソースコードを参照してみてください。</p>

        <h3>ユーザーディレクトリのファイルを操作する</h3>
        <p>~/内のファイルを上書き、追加する場合は注意することが有ります。</p>
        <p>詳しくは<a href="/buildmydist-2/pages/misc/skeldir">ユーザーディレクトリのファイルを操作するには</a>を参照してください。</p>

        <h3>様々な設定ファイルを作成する</h3>
        <p>実際にディストリビューションにデフォルトで適用する設定ファイルを作成します。</p>
        <p>詳しくは<a href="/buildmydist-2/pages/misc/create-config-file">GUIソフトの設定ファイルを作成する方法</a>を参照してください。</p>

        <h2>ブートローダーの背景を設定する</h2>
        <p>ここまでくればもう完成は目前です！</p>
        <p>もうここまできた人は何度か自分のチャンネルをビルドしていると思いますが、必ず気になることが有ります。</p>
        <p>isoを最初に起動したときのブートローダーの背景です。</p>
        <p>ブートローダーはSysLinuxというもので構成されており、設定ファイルもちょっと複雑になっています。</p>
        <p>しかしAlterISO3には背景をかんたんに変更できる仕組みがあります。</p>
        <p>チャンネルディレクトリ直下に<b>640x480でpng形式</b>の画像を<code>splash.png</code>という名前で設置するだけです。</p>
        <p>画像を作成する参考にAlter Linuxのものを載せておきます。</p>
        <p><img src="/buildmydist-2/pages/alteriso3/customize/images/splash.png" alt="起動画面"></p>



        
        
    </main>

    <?php include("${commonhtml}/aftermain.php"); ?>
</body>
</html>

