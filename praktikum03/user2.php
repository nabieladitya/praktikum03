<?php
require_once "pdo.php";
if (isset($_POST['nama']) && isset($_POST['email'])
    && isset($_POST['password'])) {
        $sql = "INSERT INTO user (nama, email, password)
                    VALUES (:nama, :email, :password)";
        echo("<pre>\n".$sql."\n</pre>\n");
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':nama' => $_POST['nama'],
            ':email' => $_POST['email'],
            ':password' => $_POST['password']));
    }
$stmt = $pdo->query("SELECT nama, email, password FROM user");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<html>
<head></head><body><table border="1">
<?php
foreach ( $rows as $row ) {
    echo "<tr><td>";
    echo($row['nama']);
    echo("</td><td>");
    echo($row['email']);
    echo("</td><td>");
    echo($row['password']);
    echo("</td><td>");
}
?>
</table> 
<p>Add A New User</p>
    <form method="post">
    <p>Name:<input type="text" name="nama" size="40"></p>
    <p>Email:<input type="text" name="email"></p>
    <p>Password:<input type="password" name="password"></p>
    <p><input type="submit" value="Add New"/></p>
</form>
</body>