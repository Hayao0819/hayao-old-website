<!DOCTYPE html>
<html>
    <head>
        <title>AlterISO3 ビルドオプション ジェネレータ</title>
        <link rel="stylesheet" href="mobile.css" media="screen and (max-width:480px)">
        <link rel="stylesheet" href="pc.css" media="screen and (min-width:480px)">
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
                    <input type="radio" name="plymouth" value="enable" id="plymouth_disable">
                    無効
                </label>
                <!-- Plymouth ここまで-->

                <!-- 圧縮設定 ここから-->
                <h3>Squashfsの圧縮方式</h3>
                <select name="sfs-comp-type">
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
                <input type="text" name="username" placeholder="alter">
                <h4>パスワード</h4>
                <input type="password" name="password" placeholder="alter">
                <!-- ユーザー ここまで-->


            </form>
        </main>
        
        

        <footer>
        </footer>
    </body>

</html>