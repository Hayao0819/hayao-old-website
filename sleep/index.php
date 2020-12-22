<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UFT-8">
  <title>指定された秒数後に応答する</title>
</head>

<body>
  <h1>指定された秒数後に応答する</h1>
  <p>
    指定された秒数後に応答します。タイムアウトのテストなどに利用してください。
  </p>
  <p>
    <form action="./sleep.php" method="GET">
      <input type="number" name="time_to_wait"><br>
      <input type="submit" value="実行">
    </form>
  </p>
</body>

</html>