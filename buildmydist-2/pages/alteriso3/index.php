<!DOCTYPE html>
<html lang="ja">
<head>

    <?php
        // ページ設定
        $title = "Alter Linux - トップ";
        $commonhtml = "${_SERVER['DOCUMENT_ROOT']}/buildmydist-2/commonhtml";
        $distro = "alteriso3";
        $description = "Alter LinuxをカスタマイズしてFascodeNetworkが開発したarchiso派生のAlterISO3を使用してArch Linux派生のディストリビューションを開発します。";

        // 共通ファイルを読み込み
        $domain = $_SERVER['HTTP_HOST'];
        include("${commonhtml}/head.php");
    ?>

</head>
<body>
    <?php include("${commonhtml}/beforemain.php"); ?>

    <main>
        <h2>Alter Linuxについて</h2>
        <p>Alter LinuxはArch LinuxをベースにFascode Networkが開発しているディストリビューションです</p>
        <p>CLIに特化しているArchisoを基に独自のAlterISO3というツールを開発しました。</p>
        <p>AlterISO3ではArchisoでできないことをコードを書かずにかんたんに実行できるようにする工夫がなされています。</p>

        <h2>AlterISO3で開発を行う具体的なメリット</h2>
        <ul>
            <li>一般ユーザーの作成を行える</li>
            <li>カーネルの種類をかんたんに切り替えられる</li>
            <li>多言語のビルドに対応</li>
            <li>AUR上に存在しているパッケージをインストール可能</li>
            <li>開発に必要なツールが揃っている</li>
            <li>基本的な設定ファイルは自動で配置される</li>
            <li>chroot環境で任意のコマンドを実行して柔軟に設定を行える</li>
        </ul>
        <p>誰でもディストリを開発しやすいように設計されており、Archisoよりはるかにかんたんに開発できます。</p>

        <h2>開発環境の構築</h2>
        <p>AlterISO3を利用するにはArch Linux環境が必須になります。</p>
        <p>Manjaroでもおそらく問題はありませんが一切の検証はしていません。</p>
        <p>Alter LinuxかArch Linuxがインストールされた環境を用意してください。</p>
        <p>また、パッケージリストやシェルスクリプトの操作があるのである程度のエディタも用意しておきましょう。</p>

        <h2>開発を始める</h2>
        <p>それでは次のページからAlterISO3の使い方を解説します。</p>
        <p><a href="./basic-usage/">次のページに進む</a></p>
    </main>

    <?php include("${commonhtml}/aftermain.php"); ?>
</body>
</html>
