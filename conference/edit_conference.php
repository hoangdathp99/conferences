<?php
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
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Conference Manager</title>
    <link type="text/css" rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php include '../layout/header.php'?>
<h2>Edit customer information</h2>
<div class="table">
    <form method="post" action="">
        <table>
            <tr>
                <td>ID</td>
                <td><?php if(isset($_GET['id'])) {$id = $_GET['id']; echo $id;} ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" size="20"></td>
            </tr>
            <tr>
                <td>Content</td>
                <td><input type="text" name="content" size="20"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="address" size="20"></td>
            </tr>
            <tr>
                <td>Amount</td>
                <td><input type="text" name="amount" size="20"></td>
            </tr>
            <tr>
                <td>Time</td>
                <td><input type="datetime-local" name="time" size="20"></td>
            </tr>
            <tr>
                <td>Img</td>
                <td><input type="text" name="img" size="20"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Edit</button></td>
            </tr>
        </table>
    </form>
</div>
<?php include '../layout/footer.php'?>
</body>
</html>

