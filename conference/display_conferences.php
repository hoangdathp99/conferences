<?php
include_once '../database/database.php';
$stmt = $conn->prepare('SELECT * FROM conferences');
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();
$conn = null
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>United</title>
    <link type="text/css" rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php include '../layout/header.php'?>
<h2>Conferences List</h2>
<div class="table">
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Content</th>
            <th>Address</th>
            <th>Amount</th>
            <th>Time</th>
            <th>Image</th>
        </tr>

        <?php foreach($result as $item): ?>
            <tr>
                <td><?php echo $item['id']?></td>
                <td>
                    <a href="../conference_customer/display.php?id=<?php echo $item['id']?>">
                        <?php echo $item['name']?>
                    </a>
                </td>
                <td><?php echo $item['content']?></td>
                <td><?php echo $item['address']?></td>
                <td><?php echo $item['amount']?></td>
                <td><?php echo $item['time']?></td>
                <td>
                    <img src="<?php echo $item['img']?>" width="300" height="200"/>
                </td>
                <td>
                    <span><a href="edit_conference.php?id=<?php echo $item['id']?>">Update</a></span>
                    <span><a href="delete_conference.php?id=<?php echo $item['id']?>">Delete</a></span>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</div>
<a href="add_conference.php" type="button">Add new conferences</a>
<?php include '../layout/footer.php'?>
<?php  ?>
</body>
</html>
