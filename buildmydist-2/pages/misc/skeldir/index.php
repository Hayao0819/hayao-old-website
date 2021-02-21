<!DOCTYPE html>
<html lang="ja">
<head>

    <?php
        // ページ設定
        $title = "ユーザーディレクトリを操作する";
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
        <h2>ユーザーディレクトリのファイルを操作するには</h2>
        <p>そのまま<code>/home/</code>以下のファイルを操作する際は注意する必要があります。</p>
        <p>インストーラによって設定されるユーザーディレクトリのパスは不特定多数だからです。</p>
        <p>そのためデフォルトのユーザーディレクトリとして<code>/etc/skel</code>を利用します。</p>
        <p>例えば<code>~/.zshrc</code>を設定したい場合は<code>/etc/skel/.zshrc</code>を書き換えます。</p>
        <p><code>/etc/skel</code>は作成された（特殊なユーザー以外の）全てのユーザーのデフォルトのホームディレクトリになります。</p>
        <div class="box-warning">
            <p><code>/etc/skel</code>に自分のホームディレクトリをそのままコピーするのは絶対にやめてください。</p>
            <p>そのままコピーすると、秘密鍵や認証情報などの公開してはいけないものまで含めてしまう可能性があります。</p>
        </div>
    </main>

    <?php include("${commonhtml}/aftermain.php"); ?>
</body>
</html>
