<?php
require_once("lib/util.php");
$user='staff';
$password='password';
$dbName='school';
$host='localhost:3306';
$dsn="mysql:host={$host};dbname={$dbName};charset=utf8";
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>schoolデータベース</title>
<link href="css/style.css" rel="stylesheet">
<link href="css/tablestyle.css" rel="stylesheet">
</head>
<body>
<div>
    <?php
    try {
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "データベース {$dbName} に接続しました。";

        $sql = "select * from resource where class = 'text' or class='pbbk'" ;
        $stm = $pdo->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        $tax = 1.1;
        //テーブルのタイトル行
        echo "<table>";
        echo "<thead><tr>";
        echo "<th>", "code", "</th>";
        echo "<th>", "name", "</th>";
        echo "<th>", "class", "</th>";
        echo "<th>", "price", "</th>";
        echo "</tr></thead>";

        echo "<tbody>";
        foreach ($result as $row){
            echo "<tr>";
            echo "<td>", es($row['code']), "</td>";
            echo "<td>", es($row['name']), "</td>";
            echo "<td>", es($row['class']), "</td>";
            echo "<td>", es($row['price']), "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } catch(Exception $e) {
        echo '<span class="error">エラーがありました。</span><br>';
        echo $e->getMessage();
        exit();
    }
    ?>
</div>
</body>
</html>