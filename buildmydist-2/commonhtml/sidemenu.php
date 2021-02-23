<aside id="sidemenu-right">
    <h2>もくじ</h2>
    <span id="index"></span>
    <span id="relation_page">
        <?php
            $relation = "${_SERVER['DOCUMENT_ROOT']}/buildmydist-2/pages/$distro/relation.php";
            if(file_exists($relation)){
                echo "<h2>関連ページ</h2>";
                include($relation);
            }
        ?>
        <!--
        <h2>リンクまとめ</h2>
        <ul id="link-list">
            <script>
                Array.from(document.getElementsByTagName("main")[0].getElementsByTagName("a")).forEach(source =>{
                    var li = document.createElement("li");
                    var element = source.cloneNode(true);
                    li.appendChild(element);
                    document.getElementById("link-list").appendChild(li);
                    li = undefined;
                });
            </script>
        </ul>
        -->
    </span>

    <span id="link-collection">
        <h2>いろいろリンク集</h2>
        <h3>Fascode Network</h3>
        <ul>
            <li><a href="https://fascode.net/">公式サイト</a></li>
            <li><a href="https://blog.fascode.net/">公式ブログ</a></li>
            <li><a href="https://twitter.com/Fascode_JP">Twitter</a></li>
            <li><a href="https://github.com/FascodeNet/">GitHub</a></li>
        </ul>
        <h3>山田ハヤオ</h3>
        <ul>
            <li><a href="https://twitter.com/Hayao0819/">Twitter</a></li>
            <li><a href="https://github.com/Hayao0819/">GitHub</a></li>
            <li><a href="https://www.instagram.com/hayao0819/">Instagram</a></li>
        </ul>
    </span>

    <span id="about-hayao">
        <h2>作者について</h2>
        <p id="hayao-icon"><a href="https://twitter.com/Hayao0819"><img src="/buildmydist-2/images/hayao.jpg" alt=""></a></p>
        <p>
            <a href="https://twitter.com/yamad_linuxer">山D</a>と<a href="https://twitter.com/0_a_e">オレンジ</a>に誘われてSereneTeamを設立。
            その後、なんやかんやあってFascode Networkに改称し、現在はAlter Linuxと周辺のコマンドを主に担当している。
            まともに触れる言語が1つも無いのが最近の悩み。チョコレートとからあげが大好き。暇人...といいたいけど最近はかなり忙しい。
        </p>
    </span>

    <span id="show-top-warning" style="display: none;">
            <h2>警告</h2>
            <p><input type="button" value="ふざけた警告を再表示する" onclick="ShowTopWarning()"></p>
            <script>
                function ShowTopWarning(){
                    localStorage.removeItem("TopWarningHide");
                    document.getElementById("top-warning").style.display = "block";
                    document.getElementById("show-top-warning").style.display = "none"
                }
                window.addEventListener("load", function(){
                    if (localStorage.getItem("TopWarningHide") == "true"){
                        document.getElementById("show-top-warning").style.display = "block"
                    }
                })
            </script>
    </span>

</aside>
