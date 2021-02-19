<!-- 基本的な情報の定義 -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" type="text/css" media="print" href="/buildmydist-2/style/print.css">
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300,400,500,700,900&amp;subset=japanese" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


<!-- ここからCSS定義 -->
<link rel="stylesheet" href="/buildmydist-2/style/common.css">
<link rel="stylesheet" href="/buildmydist-2/style/var.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/modern-css-reset/dist/reset.min.css" />
<link rel="stylesheet" href="/buildmydist-2/style/sp.css" media="screen and (max-width: 799px)">
<link rel="stylesheet" href="/buildmydist-2/style/pc.css" media="screen and (min-width: 800px)">

<!-- ページ設定をJSに渡す -->
<script>
    var distro = "<?php echo "${distro}";?>";
    var title = "<?php echo "${title}";?>";
</script>

<title><?php echo "${title}" ?> | オリジナルLinuxディストリを自作しよう2</title>

<!-- PHPでconsole.logを行う -->
<?php 
    function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
    }

?>
