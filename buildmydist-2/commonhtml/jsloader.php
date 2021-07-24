<span class="script_load" id="script_load">
    <?php 
        $script_file = glob("${_SERVER['DOCUMENT_ROOT']}/buildmydist-2/script/*.js");
        foreach($script_file as $script_path){
            $script_name = basename($script_path);
            echo "<script src=\"/buildmydist-2/script/${script_name}\"></script>";
        }
    ?>

    <!-- シンタックスハイライティング -->
    <script src="/buildmydist-2/prism/prism.js"></script>
    <link rel="stylesheet" href="/buildmydist-2/prism/prism.css">
</sapn>

