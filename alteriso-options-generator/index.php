<!DOCTYPE html>
<html>
    <head>
        <title>AlterISO3 ビルドオプション ジェネレータ</title>
        <link rel="stylesheet" href="mobile.css" media="screen and (max-width:830px)">
        <link rel="stylesheet" href="pc.css" media="screen and (min-width:830px)">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="shortcut icon" href="./favicon.ico" type="image/vnd.microsoft.icon">
        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="@Hayao0819">
        <meta name="twitter:title" content="AlterISO3 ビルドオプション ジェネレータ">
        <meta name="twitter:description" content="AlterISO3のビルドオプションを生成するサイト。ハヤオがJSとかPHPとか覚えるために作った。">
        <meta name="twitter:image" content="https://fascode.net/projects/linux/alter/img/AlterV5-Logo-Colored-WhiteText-vector.svg">
        <meta name="twitter:url" content="http://hayao.fascode.net/alteriso-options-generator/index.php">
        <style>
            .hide_debug{
                display: none;
            }
        </style>
    </head>
    <body>
        <header ondblclick="clicked_header()">
            <h1>AlterISO3 ビルドオプション ジェネレータ</h1>
            <p>AlterISO3のスクリプトのオプションを生成します。</p>
            <p>ハヤオがCSSとJSを勉強するための副産物でしかないのでいつ更新やめるか不明。</p>
            <p><b>このサイトはハヤオが勉強目的で作っています。改善点等があったら<a href="https://twitter.com/Hayao0819" target="_blank">Twitter</a>までお願いします。</b></p>
        </header>

        
        <main>
            <form method="POST">
                <h2>ビルド設定</h2>

                <div class="option_box">

                    <!-- Plymouth ここから-->
                    <div class="option_box_child">
                        <p class="option_title"><h3>Plymouth</h3></p>
                        <p class="option_description">有効にすると起動時にアニメーションを表示します</p>
                        <p class="option_form">
                            <label for="plymouth_enable"><input type="radio" name="plymouth" value="enable" id="plymouth_enable" checked>有効</label>
                            <label for="plymouth_disable"><input type="radio" name="plymouth" value="disable" id="plymouth_disable">無効</label>
                        </p>
                    </div>
                    <!-- Plymouth ここまで-->

                    <!-- クリーニング ここから-->
                    <div class="option_box_child">
                        <p class="option_title"><h3>クリーニング</h3></p>
                        <p class="option_description">ビルド中に不要なファイルを削除します</p>
                        <p class="option_form">
                            <label for="clean_enable"><input type="radio" name="clean" value="enable" id="clean_enable" checked>有効</label>
                            <label for="clean_disable"><input type="radio" name="clean" value="disable" id="clean_disable">無効</label>
                        </p>
                    </div>
                    <!-- クリーニング ここまで-->

                    <!-- tarball ここから-->
                    <div class="option_box_child">
                        <p class="option_title"><h3>Tarball</h3></p>
                        <p class="option_description">Tarball形式でビルドします</p>
                        <p class="option_form">
                            <label for="tarball_enable"><input type="radio" name="tarball" value="enable" id="tarball_enable">有効</label>
                            <label for="tarball_disable"><input type="radio" name="tarball" value="disable" id="tarball_disable" checked>無効</label>
                        </p>
                    </div>
                    <!-- tarball ここまで-->



                    <!-- アーキテクチャ ここから-->
                    <div class="option_box_child">
                        <p class="option_title"><h3>アーキテクチャ</h3></p>
                        <p class="option_description">ビルドするアニメーションを指定します</p>
                        <p class="option_form">
                            <select name="architecture" id="architecture" onchange="kernelMain()">
                                <option value="i686">i686</option>
                                <option value="x86_64" selected>x86_64</option>
                            </select>
                        </p>
                    </div>
                    <!-- アーキテクチャ ここまで-->


                    <!-- 圧縮設定 ここから-->
                    <div class="option_box_child">
                        <p class="option_title"><h3>Squashfsの圧縮方式</h3></p>
                        <p class="option_description">Rootfsの圧縮方式を指定します</p>
                        <p class="option_form">
                              <select name="sfs-comp-type" id="sfs-comp-type">
                                <option value="gzip">gzip</option>
                                <option value="lzma">lzma</option>
                                <option value="lzo">lzo</option>
                                 <option value="lz4">lz4</option>
                                <option value="xz">xz</option>
                                <option value="zstd" selected>zstd</option>
                            </select>
                        </p>
                    </div>
                    <!-- 圧縮設定 ここまで-->

                    <!-- カーネル ここから-->
                    <div class="option_box_child">
                        <p class="option_title"><h3>カーネル</h3></p>
                        <p class="option_description">使用するカーネルを設定します</p>
                        <p class="option_form">
                            <select name="kernel" id="kernel">
                                <option disabled selected>アーキテクチャを選択してください</option>
                            </select>
                        </p>

                    </div>
                    <!-- カーネル ここまで-->

                    <!-- ユーザー ここから-->
                    <div class="option_box_child">
                        <p class="option_title"><h3>ライブ環境ユーザー名</h3></p>
                        <p class="option_description">ライブ環境のユーザー名を指定します</p>
                        <p class="option_form"><input type="text" id="username" placeholder="alter" value="alter"></p>
                    </div>
                    <div class="option_box_child">
                        <p class="option_title"><h3>ライブ環境パスワード</h3></p>
                        <p class="option_description">ライブ環境のユーザーのパスワードを設定します</p>
                        <p class="option_form"><input type="password" id="password" placeholder="alter" value="alter"></p>
                    </div>
                    <!-- ユーザー ここまで-->

                    <!-- チャンネル ここから-->
                    <div class="option_box_child">
                        <p class="option_title"><h3>チャンネル</h3></p>
                        <p class="option_description">
                            ビルドするチャンネルを指定します。
                            <br>
                            <span style="color: red;">この項目は必須です。</span>
                        </p>
                        <p class="option_form">
                            <input type="text" id="channel" placeholder="xfce" list="channel_list">
                            <datalist id="channel_list">
                            </datalist>
                        </p>
                        <script>
                            var channel_list = ['basic', 'cinnamon', 'deepin', 'gnome', 'gnome-mac', 'i3', 'lxde', 'plasma', 'releng', 'xfce', 'xfce-pro']
                            channel_list.forEach(function (_channel){
                                var _option_channel = document.createElement('option');
                                _option_channel.value = _channel;
                                document.getElementById("channel_list").appendChild(_option_channel);
                            });
                        </script>
                    </div>
                    <!-- チャンネル ここまで-->
                </div>
                
                <h2>デバッグ用オプション</h2>
                <label for="show_debug">
                    <input type="checkbox" name="show_debug" id="show_debug" onclick="switch_debug()">
                    デバッグ用オプションを表示する
                </label>

                <div id="debug_box" class="option_box hide_debug">
                    <!-- デバッグ用オプション ここから -->
                    <div class="option_box_child">
                        <p class="option_title"><h3>Shell版のmkalteriso</h3></p>
                        <p class="option_description">C++版の代わりにShell版のmkalterisoを使用します。</p>
                        <p class="option_form">
                            <label for="shmkalteriso_enable"><input type="radio" name="shmkalteriso" value="enable" id="shmkalteriso_enable">有効</label>
                            <label for="shmkalteriso_disable"><input type="radio" name="shmkalteriso" value="disable" id="shmkalteriso_disable" checked>無効</label>
                        </p>
                    </div>
                    <div class="option_box_child">
                        <p class="option_title"><h3>Gitバージョン</h3></p>
                        <p class="option_description">Gitのリビジョン番号をバージョン情報に含めます。</p>
                        <p class="option_form">
                            <label for="gitversion_enable"><input type="radio" name="gitversion" value="enable" id="gitversion_enable">有効</label>
                            <label for="gitversion_disable"><input type="radio" name="gitversion" value="disable" id="gitversion_disable" checked>無効</label>
                        </p>
                    </div>
                    <div class="option_box_child">
                        <p class="option_title"><h3>デバッグメッセージ</h3></p>
                        <p class="option_description">デバッグメッセージを表示します</p>
                        <p class="option_form">
                            <label for="debug_enable"><input type="radio" name="debug" value="enable" id="debug_enable">有効</label>
                            <label for="debug_disable"><input type="radio" name="debug" value="disable" id="debug_disable" checked>無効</label>
                        </p>
                    </div>
                    <div class="option_box_child">
                        <p class="option_title"><h3>スクリプトデバッグ</h3></p>
                        <p class="option_description">Bashのデバッグメッセージを表示します</p>
                        <p class="option_form">
                            <label for="bash_debug_enable"><input type="radio" name="bash_debug" value="enable" id="bash_debug_enable">有効</label>
                            <label for="bash_debug_disable"><input type="radio" name="bash_debug" value="disable" id="bash_debug_disable" checked>無効</label>
                        </p>
                    </div>
                    <!-- デバッグ用オプション ここまで -->

                </div>


                <div class="result_box">
                    <div class="result_box_child">
                        <h2>実行</h2>
                        <p>このジェネレータでは引数はデフォルト値ではない場合のみ指定するようになっています。</p>
                        <textarea id="output" disabled></textarea><br>
                        <label for="only_no_default"><input name="only_no_default" type="checkbox" id="only_no_default">デフォルトの値も引数で指定する。</label>
                        <label for="allow_no_channel"><input name="allow_no_channel" type="checkbox" id="allow_no_channel">チャンネルの省略を許可する。</label>
                        <input type="button" value="生成" onclick="startgen()">
                        <input type="button" value="コピー" onclick="copy_to_clipboard()">
                        <input type="button" value="ツイートする" onclick="tweetArguments()">
                    </div>
                
                    <div class="result_box_child">
                        <h2>ログ</h2>
                        <p>このジェネレータのログです。</p>
                        <textarea id="generator-output" disabled></textarea>
                        <input type="button" value="ログをリセット" onclick="log_clear()">
                        <label for="log_clear_noconfirm"><input name="log_clear_noconfirm" type="checkbox" id="log_clear_noconfirm">確認メッセージを表示しない</label>
                        <label for="log_nosave" onclick="clicked_log_nosave()"><input name="log_nosave" type="checkbox" id="log_nosave">ログを保存しない</label>
                    </div>
                </div>
            </form>
        </main>
        
        

        <footer onclick="clicked_footer()">
                <div style="text-align: left; float: left;">
                    GPLv3でライセンスされてます <a href="https://github.com/Hayao0819/hayao.fascode.net/tree/master/alteriso-options-generator" target="_blank">ソースコード</a>
                </div>
                <div style="text-align: right;">
                    Fascode Network Yamada Hayao
                </div>
        </footer>

        <script type="text/javascript" src="main.js"></script>
        <script type="text/javascript" src="kernellist.js"></script>
    </body>

</html>