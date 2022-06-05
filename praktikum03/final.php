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

if (isset($_POST['delete']) && isset($_POST['id'])) {
        $sql = "DELETE FROM user WHERE id = :zip";
        echo("<pre>\n$sql\n</pre>\n");
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':zip'=>$_POST['id']));
    }
$stmt = $pdo->query("SELECT nama, email, password, id FROM user");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<html><head></head>
<body>
    <table border ="1">
    <?php
    foreach ( $rows as $row ) {
        echo "<tr><td>";
        echo($row['nama']);
        echo("</td><td>");
        echo($row['email']);
        echo("</td><td>");
        echo($row['password']);
        echo("</td><td>");
        echo('<form method="post"><input type="hidden" ');
        echo('name="id" value="'.$row['id'].'">'."\n");
        echo('<input type="submit" value="Del" name="delete">');
        echo("\n</form>\n");
        echo("</td></tr>\n");
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