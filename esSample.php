<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>XSS対策 es()</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div>
<Pre>
<?php
// util.php を読み込む
require_once("lib/util.php");
// HTML タグの入ったデータを用意する
$myCode = "<h2>テスト1</h2>";
$myArray = ["a"=>"<p>赤</p>", "b"=>"<script>alert('hello')</script>"];
// es() で HTML エスケープして表示する。
echo '$myCodeの値：', es($myCode);
echo PHP_EOL . PHP_EOL;
echo '$myArrayの値：';
print_r(es($myArray));
?>
</Pre>
</div>
</body>
</html>