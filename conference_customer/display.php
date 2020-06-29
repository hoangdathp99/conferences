<?php
    $conference_id = '';
    $customer_id ='';
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        include '../database/database.php';
        if(isset($_GET['id'])) {
            $conference_id = $_GET['id'];
        }

        $stmt_conference = $conn->prepare("SELECT * FROM conferences WHERE id = $conference_id");
        $stmt_conference->execute();
        $stmt_conference->setFetchMode(PDO::FETCH_ASSOC);
        $conference = $stmt_conference->fetch();
//        var_dump($conference);

        $stmt_customers = $conn->prepare("SELECT * FROM conference_customer WHERE conference_id = $conference_id");
        $stmt_customers->execute();
        $stmt_customers->setFetchMode(PDO::FETCH_ASSOC);
        $list_customer_of_conference = $stmt_customers->fetchAll();
//            $customer_id = 'customer_id';
//        var_dump($list_customer_of_conference);
//        $conn = null;
        $stmt = $conn->prepare("SELECT * FROM customers INNER JOIN conference_customer ON customers.id = conference_customer.customer_id");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
//        var_dump($result);
        $conn = null;
    }
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
<div class="row mt-3">
    <div class="col-9">
        <h2>Customers List</h2>
    </div>
    <div class="col-3">

        <a href="add_customer.php"><button class="btn btn-primary">Add new customer</button></a>

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
                <td>
                    <span><a href="edit_customer.php?id=<?php echo $item['id']?>">Update</a></span>
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

<?php include '../layout/footer.php'?>
<?php  ?>
</body>
</html>

