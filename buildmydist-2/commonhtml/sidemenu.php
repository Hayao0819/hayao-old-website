<aside id="sidemenu-right">
    <h2>もくじ</h2>
    <span id="index"></span>
    <span id="relation_page">
        <?php
            $relation = "${_SERVER['DOCUMENT_ROOT']}/buildmydist-2/pages/$distro/relation.php";
            console_log($relation);
            
            if(file_exists($relation)){
                echo "<h2>関連ページ</h2>";
                include($relation);
            }
        ?>
    </span>

    <h2>サイト内検索</h2>
    <p>ここで検索できるようにする</p>

    <h2>いろいろリンク集</h2>
    <ul>
        <li>ふぁすこーど</li>
        <li>ぎっとはぶ</li>
        <li>ランダムで表示</li>
    </ul>

</aside>
