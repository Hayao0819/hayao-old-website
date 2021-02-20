<!DOCTYPE html>
<html lang="ja">
<head>

    <?php
        // ページ設定
        $title = "成分表";
        $commonhtml = "${_SERVER['DOCUMENT_ROOT']}/buildmydist-2/commonhtml";
        //$distro = "osname";

        // 共通ファイルを読み込み
        $domain = $_SERVER['HTTP_HOST'];
        include("${commonhtml}/head.php");
    ?>

</head>
<body>
    <?php include("${commonhtml}/beforemain.php"); ?>

    <main>
        <h2>成分表</h2>
        <p>このサイトは主に以下の成分で構成されています。</p>
        <p>また、Arch Linux上で製造しています。アレルギーをお持ちの方はご注意ください。</p>
        <h3>HTML</h3>
        <p>本文を書くのに使用しています。</p>
        <h3>PHP</h3>
        <p>ヘッダーやフッター、サイドバーなどを共通化するために使用しています。</p>
        <h3>JavaScript</h3>
        <p>レスポンシブデザインを実現し、動的なことをするために使ってます。（たぶん全部CSSで代用できる）</p>
        <h3>魔法少女まどか☆マギカ （外伝 マギアレコード）</h3>
        <p>モチベの維持と癒やし、サントラを作業用BGMに使用。学校で疲れた後にマギレコやるのが趣味。杏ゆまは天使。</p>
        <h3>青春ブタ野郎シリーズ</h3>
        <p>モチベの維持。麻衣さんはかわいい。</p>
        <h3>Twitter</h3>
        <p>これがないと生きていけない。生活必需品。全人類がやるべき。</p>
        <h3>ゆるキャン△</h3>
        <p>松ぼっくりとか木の枝の声が好き。現在（2021年2月20日）2期なうなのでDアニメで本編見てからニコニコでコメントを見るのが好き。しまりんがかわいい。拝め。</p>
        <h3>なおこさん</h3>
        <p>PHPとCSSにものすごく強い人。めっちゃアドバイスもらってる。<a href="https://twitter.com/naoko1010hh">Twitter</a>は閲覧注意。</p>
    </main>

    <script>
        window.addEventListener("load", function(){
            document.getElementsByTagName("footer")[0].addEventListener("click", function(){
                document.location.href = "https://yurucamp.jp/";
            })
        })
    </script>
    <?php include("${commonhtml}/aftermain.php"); ?>
</body>
</html>
