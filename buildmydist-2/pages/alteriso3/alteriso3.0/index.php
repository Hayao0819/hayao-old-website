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
        <h2>AlterISO3.0について</h2>
        <p>以下の情報はAlterISO 3.0のものです。</p>

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

        <h2>イメージファイルに含める、上書きするファイルを配置する</h2>


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
    </main>

    <?php include("${commonhtml}/aftermain.php"); ?>
</body>
</html>

