<?php
session_start();
if(!isset($_SESSION["username"])){
    header("location:http://localhost/conference/");
}
$id = '';
$name = '';
$content = '';
$address = '';
$amount = '';
$time = '';
$img = '';
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_GET['id'])) {$id = $_GET['id'];}
    if(isset($_POST['name'])) {$name = $_POST['name'];}
    if(isset($_POST['content'])) {$content = $_POST['content'];}
    if(isset($_POST['address'])) {$address = $_POST['address'];}
    if(isset($_POST['amount'])) {$amount = $_POST['amount'];}
    if(isset($_POST['time'])) {$time = $_POST['time'];}
    if(isset($_POST['img'])) {$img = $_POST['img'];}

    include_once '../database/database.php';
    $sql = "UPDATE conferences 
            SET name = '$name',
                content = '$content',
                address = '$address',
                amount = '$amount',
                time = '$time',
                img = '$img'
            WHERE id = '$id'";
//    var_dump($sql);
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $conn = null;
    header('location: http://localhost/conference/conference/display_conferences.php',true);

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
<!--<h2>Edit customer information</h2>-->
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
<!--                <td>Content</td>-->
<!--                <td><input type="text" name="content" size="20"></td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Address</td>-->
<!--                <td><input type="text" name="address" size="20"></td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Amount</td>-->
<!--                <td><input type="text" name="amount" size="20"></td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Time</td>-->
<!--                <td><input type="datetime-local" name="time" size="20"></td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Img</td>-->
<!--                <td><input type="text" name="img" size="20"></td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td></td>-->
<!--                <td><button type="submit">Edit</button></td>-->
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
                <h2 >Sửa hội thảo</h2>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-row">
                        <div class="name">ID</div>
                        <div class="value">
                            <?php if(isset($_GET['id'])) {$id = $_GET['id']; echo $id;} ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Tên hội thảo</div>
                        <div class="value">
                            <input class="input--style-6" type="text" name="name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Nội dung</div>
                        <div class="value">
                            <input class="input--style-6" type="text" name="content">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Địa chỉ</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-6" type="text" name="address">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Số lượng tối đa</div>
                        <div class="value">
                            <input class="input--style-6" type="text" name="amount">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Thời gian diễn ra</div>
                        <div class="value">
                            <input class="input--style-6" type="datetime-local" name="time">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Ảnh</div>
                        <div class="value">
                            <input class="input--style-6" type="text" name="img">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn--radius-2 btn--blue-2" type="submit">Sửa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>

</html>


