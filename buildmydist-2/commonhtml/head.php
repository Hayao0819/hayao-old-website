<!-- 基本的な情報の定義 -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>


<!-- アイコン -->
<link rel="shortcut icon" href="favicon.ico">

<!-- フォント -->
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300,400,500,700,900&amp;subset=japanese" rel="stylesheet">

<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>


<!-- 画像拡大用スクリプト -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/luminous-lightbox/2.3.3/Luminous.min.js" crossorigin="anonymous"></script>


<!-- Twitter -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="Hayao0819">
<meta name="twitter:title" content="<?php echo "${title}" ?> | オリジナルLinuxディストリを自作しよう2">
<meta name="twitter:description" content="<?php echo "${description}" ?>">
<!-- <meta name="twitter:image" content="画像URL“> -->


<!-- 検索エンジン用設定 -->
<meta content="<?php echo "${description}" ?>" name="description">
<meta property="og:title" content="<?php echo "${title}" ?>">
<meta property="og:description" content="<?php echo "${description}" ?>">
<meta property="og:type" content="article">
<meta property="og:url" content="<?php echo (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
<meta property="og:site_name" content="オリジナルLinuxディストリを自作しよう2">
<meta property="og:locale" content="ja_JP">
<!-- <meta property="og:image" content="画像URL"> -->


<!-- ここからCSS定義 -->
<link href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="/buildmydist-2/style/common.css">
<link rel="stylesheet" href="/buildmydist-2/style/var.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/modern-css-reset/dist/reset.min.css">
<link rel="stylesheet" href="/buildmydist-2/style/sp.css" media="screen and (max-width: 799px)">
<link rel="stylesheet" href="/buildmydist-2/style/pc.css" media="screen and (min-width: 800px)">
<link rel="stylesheet" type="text/css" media="print" href="/buildmydist-2/style/print.css">

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
