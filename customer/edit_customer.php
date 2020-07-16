<?php
include_once '../database/database.php';
$id = '';
$name = '';
$email = '';
$phone  = '';
$conference_id = '';

$stmt = $conn->prepare('SELECT * FROM conferences');
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$all_conferences = $stmt->fetchAll();
$conn = null;
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    include '../database/database.php';
    if(isset($_GET['id'])) {$id = $_GET['id'];}
    $customer_id = $id;
    if(isset($_POST['name'])) {$name = $_POST['name'];}
    if(isset($_POST['email'])) {$email = $_POST['email'];}
    if(isset($_POST['phone'])) {$phone = $_POST['phone'];}
    if (isset($_POST['conference_id'])) {
        $conference_id = $_POST['conference_id'];
    }
    $sql_edit_customer = "UPDATE customers 
            SET id = '$id',
                name = '$name',
                email = '$email',
                phone = '$phone'
            WHERE id = $id";
    $stmt = $conn->prepare($sql_edit_customer);
    $stmt->execute();
//    var_dump($stmt);
//    $customer_id == $id;
//    var_dump($customer_id);
    $sql_edit_conference_customer = "UPDATE conference_customer
            SET 
                conference_id = '$conference_id',
                customer_id = '$customer_id'
            WHERE customer_id = $customer_id";
    $stmt_conference_customer = $conn->prepare($sql_edit_conference_customer);
    $stmt_conference_customer->execute();
    $conn = null;
    header('location: http://localhost/conference/customer/display_customers.php',true);

}
?>
<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <title>Conference Manager</title>-->
<!--    <link type="text/css" rel="stylesheet" href="../css/main.css">-->
<!--</head>-->
<!--<body>-->
<?php //include '../layout/header.php'?>
<!--<h2>Edit customer infomation</h2>-->
<!--<div class="table">-->
<!--    <form method="post" action="">-->
<!--        <table>-->
<!--            <tr>-->
<!--                <td>ID</td>-->
<!--                <td>--><?php //if(isset($_GET['id'])) {$id = $_GET['id']; echo $id;} ?><!--</td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Name</td>-->
<!--                <td><input type="text" name="name" size="20"></td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Email</td>-->
<!--                <td><input type="email" name="email" size="20"></td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Phone</td>-->
<!--                <td><input type="text" name="phone" size="20"></td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Conference</td>-->
<!--                <td>-->
<!--                    <select name="conference_id">-->
<!--                        --><?php //foreach($all_conferences as $conference): ?>
<!--                            <option value="--><?php //echo $conference['id'] ?><!--">--><?php //echo $conference['name'] ?><!--</option>-->
<!--                        --><?php //endforeach; ?>
<!--                    </select>-->
<!--                </td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td></td>-->
<!--                <td><button type="submit">Update</button></td>-->
<!--            </tr>-->
<!--        </table>-->
<!--    </form>-->
<!--</div>-->
<?php //include '../layout/footer.php'?>
<!--</body>-->
<!--</html>-->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title></title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="../css/main.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
<div class="page-wrapper bg-dark p-t-100 p-b-50">
    <div class="wrapper wrapper--w900">
        <div class="card card-6">
            <div>
                <h2 >Thêm khách hàng</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-row">
                        <div class="name">ID</div>
                        <div class="value">
                            <?php if(isset($_GET['id'])) {$id = $_GET['id']; echo $id;} ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Họ tên</div>
                        <div class="value">
                            <input class="input--style-6" type="text" name="name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Địa chỉ Email</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-6" type="email" name="email" placeholder="example@email.com">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Số điện thoại</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-6" type="text" name="phone" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Chọn hội thảo</div>
                        <div class="value">
                            <select class="form-control form-control-lg"name="conference_id">
                                <?php foreach($all_conferences as $conference): ?>
                                    <option value="<?php echo $conference['id'] ?>"><?php echo $conference['name'] ?></option>
                                <?php endforeach; ?>
                            </select>

                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn--radius-2 btn--blue-2" type="submit">Thêm</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Jquery JS-->
<script src="vendor/jquery/jquery.min.js"></script>


<!-- Main JS-->
<script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->

