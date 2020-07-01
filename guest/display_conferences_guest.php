<?php
include_once '../database/database.php';
$stmt = $conn->prepare('SELECT * FROM conferences');
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();
//var_dump($result);
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
    <!--    <link type="text/css" rel="stylesheet" href="../css/main.css">-->
</head>
<body>
<?php include 'header_guest.php'?>
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-9">
            <h2>Conferences List</h2>
        </div>
<!--        <div class="col-3">-->
<!---->
<!--            <a href="add_conference.php"><button class="btn btn-primary">Add new conference</button></a>-->
<!---->
<!--        </div>-->
    </div>
    <div class="table">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Content</th>
                <th>Address</th>
                <th>Max Amount</th>
                <th>Time</th>
                <th>Image</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($result as $item): ?>
                <tr>
                    <td><?php echo $item['id']?></td>
                    <td>
                        <a href="display_guest.php?id=<?php echo $item['id']?>">
                            <?php echo $item['name']?>
                        </a>
                    </td>
                    <td>
                        <a href="../html/cotent_<?php echo $item['id']?>.html">
                            <?php echo $item['content']?>
                        </a>
                    </td>
                    <td><?php echo $item['address']?></td>
                    <td><?php echo $item['amount']?></td>
                    <td><?php echo $item['time']?></td>
                    <td>
                        <img src="<?php echo $item['img']?>" width="300" height="200"/>
                    </td>
<!--                    <td>-->
<!--                        <span><a href="edit_conference.php?id=--><?php //echo $item['id']?><!--">Update</a></span>-->
<!--                        <span><a href="delete_conference.php?id=--><?php //echo $item['id']?><!--">Delete</a></span>-->
<!--                    </td>-->
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../layout/footer.php'?>
</body>
</html>
