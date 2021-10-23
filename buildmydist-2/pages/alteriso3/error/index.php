<!DOCTYPE html>
<html lang="ja">
<head>

    <?php
        // ページ設定
        $title = "Alter Linux - エラー";
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
        <h2>エラーが出たときは</h2>
        <p>AlterISO3でよく遭遇するエラーをまとめています。</p>
        <p>わからないことや、書かれていないエラーがあった場合は管理人に知らせてください。</p>
        <p>環境や状況によって異なる箇所は「~~」で表記しています。</p>

        <h2>~~ default.conf was not found.</h2>
        <p>正常にソースコードの取得が出来てないか、設定ファイルを削除してしまっています。</p>
        <p><code>buiild.sh</code>は<code>default.conf</code>が無いと正常に動作しません。</p>

        <h2>The variable name ~~ is empty.</h2>
        <p>~~の変数が空になっています。設定ファイルを確認して正しい値を設定してください。</p>
        <p>正しい値を設定しているにも関わらずこのエラーが出る場合はバグの可能性が有るのでIssueを作成してください。</p>

        <h2>The variable name ~~ is not of bool type.</h2>
        <p>~~の変数に不正な値が設定されています。設定ファイルを確認して正しい値を設定してください。</p>
        <p>正しい値を設定しているにも関わらずこのエラーが出る場合はバグの可能性が有るのでIssueを作成してください。</p>

        <h2>~~ is not installed.</h2>
        <p>ビルドに必要なパッケージがインストールされていません。yayやpacmanを使用してインストールしてください。</p>

        <h2>~~ channel does not support current architecture.</h2>
        <p>指定されたチャンネルとアーキテクチャの組み合わせが正しくありません。</p>
        <p>チャンネルのアーキテクチャファイルや、ビルドオプション、設定ファイルを確認してください。</p>

        <h2>This kernel is currently not supported on this channel or architecture</h2>
        <p>指定されたカーネルとアーキテクチャの組み合わせが正しくありません。</p>
        <p>チャンネルのカーネルファイルや、ビルドオプション、設定ファイルを確認してください。</p>

        <h2>Invaild compressors ~~</h2>
        <p>指定された圧縮方式が間違っています。</p>
        <p>
            <div class="code language-shell">./build.sh -h</div>を実行して利用可能な圧縮方式を確認してください。
        </p>

        <h2>This option is obsolete in AlterISO 3. To use Japanese, use "-l ja".</h2>
        <p><code>-j</code>オプションはAlterISO 2で開始されたオプションです。変わりに<code>-l ja</code>を使用してください。</p>

        <h2>There is no git directory. You need to use git clone to use this feature.</h2>
        <p><code>--gitversion</code>を利用するには<code>git clone</code>でソースコードを取得し、<code>.git</code>ディレクトリが有る必要があります。</p>
        <p>ディレクトリを削除してしまっていないか、ソースコードをzipでダウンロードしていないかを確認してください。</p>

        <h2>Invalid argument ~~</h2>
        <p>利用できない引数を指定しています。</p>
        <p>
            <div class="code language-shell">./build.sh -h</div>を実行して利用可能な引数を確認してください。
        </p>

        <h2>This channel does not support Alter ISO 3.</h2>
        <p>このチャンネルはAlterISO3では利用できません。旧バージョンのAlterISOをダウンロードしてください。</p>

    </main>

    <?php include("${commonhtml}/aftermain.php"); ?>
</body>
</html>
