<!DOCTYPE html>
<html>
    <head>
        <title>AlterISO3 ビルドオプション ジェネレータ</title>
        <link rel="stylesheet" href="mobile.css" media="screen and (max-width:480px)">
        <link rel="stylesheet" href="pc.css" media="screen and (min-width:480px)">
        <script type="text/javascript" src="main.js"></script>
    </head>
    <body>
        <header>
            <h1>AlterISO3 ビルドオプション ジェネレータ</h1>
            <p>AlterISO3のスクリプトのオプションを生成します。ハヤオのウェブ関連言語の勉強用です。</p>
        </header>

        
        <main>
            <form method="POST">
                <h2>ビルド設定</h2>

                <!-- Plymouth ここから-->
                <h3>Plymouth</h3>
                <label for="plymouth_enable">
                    <input type="radio" name="plymouth" value="enable" id="plymouth_enable" checked>
                    有効
                </label>
                <label for="plymouth_disable">
                    <input type="radio" name="plymouth" value="disable" id="plymouth_disable">
                    無効
                </label>
                <!-- Plymouth ここまで-->

                <!-- tarball ここから-->
                <h3>Tarball</h3>
                <label for="tarball_enable">
                    <input type="radio" name="tarball" value="enable" id="tarball_enable">
                    有効
                </label>
                <label for="tarball_disable">
                    <input type="radio" name="tarball" value="disable" id="tarball_disable" checked>
                    無効
                </label>
                <!-- tarball ここまで-->

                <!-- 圧縮設定 ここから-->
                <h3>Squashfsの圧縮方式</h3>
                <select name="sfs-comp-type" id="sfs-comp-type">
                    <option value="gzip">gzip</option>
                    <option value="lzma">lzma</option>
                    <option value="lzo">lzo</option>
                    <option value="lz4">lz4</option>
                    <option value="xz">xz</option>
                    <option value="zstd" selected>zstd</option>
                </select>
                <!-- 圧縮設定 ここまで-->

                <!-- ユーザー ここから-->
                <h3>ライブ環境ユーザー</h3>
                <h4>ユーザー名</h4>
                <input type="text" id="username" placeholder="alter" value="alter">
                <h4>パスワード</h4>
                <input type="password" id="password" placeholder="alter" value="alter">
                <!-- ユーザー ここまで-->

                <!-- デバッグ用オプション ここから -->
                <h3>デバッグ用設定</h3>
                <h4>デバッグメッセージ</h4>
                <label for="debug_enable">
                    <input type="radio" name="debug" value="enable" id="debug_enable">
                    有効
                </label>
                <label for="debug_disable">
                    <input type="radio" name="debug" value="disable" id="debug_disable" checked>
                    無効
                </label>

                <!-- デバッグ用オプション ここまで -->

                <input type="button" value="生成" onClick="startgen()">

                <h3>実行結果</h3>
                <textarea id="output" disabled></textarea>


            </form>
        </main>
        
        

        <footer>
        </footer>
    </body>

</html>