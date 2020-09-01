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

                <table>

                    <!-- Plymouth ここから-->
                    <tr>
                        <td class="table_title"><h3>Plymouth</h3></td>
                        <td>有効にすると起動時にアニメーションを表示します</td>
                        <td>
                            <label for="plymouth_enable"><input type="radio" name="plymouth" value="enable" id="plymouth_enable" checked>有効</label>
                            <label for="plymouth_disable"><input type="radio" name="plymouth" value="disable" id="plymouth_disable">無効</label>
                        </td>
                    </tr>
                    <!-- Plymouth ここまで-->

                    <!-- クリーニング ここから-->
                    <tr>
                        <td class="table_title"><h3>クリーニング</h3></td>
                        <td>ビルド中に不要なファイルを削除します</td>
                        <td>
                            <label for="clean_enable"><input type="radio" name="clean" value="enable" id="clean_enable" checked>有効</label>
                            <label for="clean_disable"><input type="radio" name="clean" value="disable" id="clean_disable">無効</label>
                        </td>
                    </tr>
                    <!-- クリーニング ここまで-->

                    <!-- tarball ここから-->
                    <tr>
                        <td class="table_title"><h3>Tarball</h3></td>
                        <td>Tarball形式でビルドします</td>
                        <td>
                            <label for="tarball_enable"><input type="radio" name="tarball" value="enable" id="tarball_enable">有効</label>
                            <label for="tarball_disable"><input type="radio" name="tarball" value="disable" id="tarball_disable" checked>無効</label>
                        </td>
                    </tr>
                    <!-- tarball ここまで-->



                    <!-- アーキテクチャ ここから-->
                    <tr>
                        <td class="table_title"><h3>アーキテクチャ</h3></td>
                        <td>ビルドするアニメーションを指定します</td>
                        <td>
                            <select name="architecture" id="architecture">
                                <option value="i686">i686</option>
                                <option value="x86_64" selected>x86_64</option>
                            </select>
                        </td>
                    </tr>
                    <!-- アーキテクチャ ここまで-->


                    <!-- 圧縮設定 ここから-->
                    <tr>
                        <td class="table_title"><h3>Squashfsの圧縮方式</h3></td>
                        <td>Rootfsの圧縮方式を指定します</td>
                        <td>
                              <select name="sfs-comp-type" id="sfs-comp-type">
                                <option value="gzip">gzip</option>
                                <option value="lzma">lzma</option>
                                <option value="lzo">lzo</option>
                                 <option value="lz4">lz4</option>
                                <option value="xz">xz</option>
                                <option value="zstd" selected>zstd</option>
                            </select>
                        </td>
                    </tr>
                    <!-- 圧縮設定 ここまで-->

                    <!-- ユーザー ここから-->
                    <tr>
                        <td class="table_title"><h3>ライブ環境ユーザー名</h3></td>
                        <td>ライブ環境のユーザー名を指定します</td>
                        <td><input type="text" id="username" placeholder="alter" value="alter"></td>
                    </tr>
                    <tr>
                        <td class="table_title"><h3>ライブ環境パスワード</h3></td>
                        <td>ライブ環境のユーザーのパスワードを設定します</td>
                        <td><input type="password" id="password" placeholder="alter" value="alter"></td>
                    </tr>
                    <!-- ユーザー ここまで-->

                    <!-- デバッグ用オプション ここから -->
                    <tr>
                        <td class="table_title"><h3>デバッグメッセージ</h3></td>
                        <td>デバッグメッセージを表示します</td>
                        <td>
                            <label for="debug_enable"><input type="radio" name="debug" value="enable" id="debug_enable">有効</label>
                            <label for="debug_disable"><input type="radio" name="debug" value="disable" id="debug_disable" checked>無効</label>
                        </td>
                    </tr>
                    <!-- デバッグ用オプション ここまで -->

                </table>



                <h2>実行</h2>
                <textarea id="output" disabled></textarea><br>
                <input type="button" value="生成" onClick="startgen()">
            </form>
        </main>
        
        

        <footer>
        </footer>
    </body>

</html>