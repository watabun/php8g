<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>PHP Sample Programs</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<table>
<tr><th>商品番号</th><th>商品名</th><th>価格</th></tr>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 'staff', 'password');
$sql=$pdo->prepare("select * from product where name like ?");
$sql->execute(['%'.$_REQUEST['keyword'].'%']);
foreach ($sql as $row) {
    echo '<tr>';
    echo '<td class="id">', htmlspecialchars($row['id']), '</td>';
    echo '<td class="name">', htmlspecialchars($row['name']), '</td>';
    echo '<td class="price">', htmlspecialchars($row['price']), '</td>';
    echo '</tr>';
    echo "\n";
}
?>
</table>
</body>
</html>