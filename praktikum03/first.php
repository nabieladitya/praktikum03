<?php
echo "<pre>\n" ;
$pdo=new PDO('mysql:host=localhost;port=3306;dbname=praktikum03',
    'root', '');
$stmt = $pdo->query("SELECT * FROM user");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($rows);
echo "</pre>\n" ; ?>

