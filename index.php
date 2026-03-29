<?php
require_once "connect.php";
include 'send_email.php';

$mysql = "SELECT * FROM customers";
$result = $conn->query($mysql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Danh sách khách hàng</title>
</head>
<body>

<h2>Danh sách khách hàng</h2>

<table border="1">
    <tr>
        <th>Tên</th>
        <th>Địa chỉ</th>
        <th>SĐT</th>
        <th>Email</th>
        <th>Giới tính</th>
        <th>Action</th>
    </tr>

    <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['name'] ?></td>
            <td><?= $row['address'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['gender'] ?></td>
            <td>
                <form action="send_mail.php" method="post">
                    <input type="hidden" name="email" value="<?= $row['email'] ?>">
                    <input type="hidden" name="name" value="<?= $row['name'] ?>">
                    <button type="submit">Gửi mail</button>
                </form>
            </td>
        </tr>
    <?php } ?>

</table>

</body>
</html>