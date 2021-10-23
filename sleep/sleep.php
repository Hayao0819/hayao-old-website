<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
  </head>
  <body>
    <?php
        $wait = $_GET['time_to_wait'];
        sleep($wait);
    ?>
  </body>
</html>
