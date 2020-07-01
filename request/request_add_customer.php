<?php
include_once '../database/database.php';
$stmt = $conn->prepare('SELECT * FROM request');
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
</head>
<body>
<?php include '../layout/header.php'?>
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-9">
            <h2>Customers List</h2>
        </div>
    </div>

    <div class="table">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Conference ID</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($result as $item): ?>
                <tr>
                    <td><?php echo $item['id']?></td>
                    <td><?php echo $item['name']?></td>
                    <td><?php echo $item['email']?></td>
                    <td><?php echo $item['phone']?></td>
                    <td><?php echo $item['conference_id']?></td>
                        <td>
                            <span><a href="http://localhost/conference/request/apply_customer.php?guest_id=<?php echo $item['id'] ?>">Apply</a></span>
                            <span><a href="delete_customer.php?id=<?php echo $item['id']?>">Delete</a></span>
                        </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <!--    <table>-->
        <!--        <tr>-->
        <!--            <th>ID</th>-->
        <!--            <th>Name</th>-->
        <!--            <th>Email</th>-->
        <!--            <th>Phone</th>-->
        <!--            <th></th>-->
        <!--        </tr>-->
        <!---->
        <!--        --><?php //foreach($result as $item): ?>
        <!--            <tr>-->
        <!--                <td>--><?php //echo $item['id']?><!--</td>-->
        <!--                <td>--><?php //echo $item['name']?><!--</td>-->
        <!--                <td>--><?php //echo $item['email']?><!--</td>-->
        <!--                <td>--><?php //echo $item['phone']?><!--</td>-->
        <!--                <td>-->
        <!--                    <span><a href="edit_customer.php?id=--><?php //echo $item['id']?><!--">Update</a></span>-->
        <!--                    <span><a href="delete_customer.php?id=--><?php //echo $item['id']?><!--">Delete</a></span>-->
        <!--                </td>-->
        <!--            </tr>-->
        <!--        --><?php //endforeach; ?>
        <!---->
        <!--    </table>-->
    </div>
</div>

<?php include '../layout/footer.php'?>
<?php  ?>
</body>
</html>
