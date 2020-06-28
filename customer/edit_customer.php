<?php
$id = '';
$name = '';
$email = '';
$phone  = '';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_GET['id'])) {$id = $_GET['id'];}
    if(isset($_POST['name'])) {$name = $_POST['name'];}
    if(isset($_POST['email'])) {$email = $_POST['email'];}
    if(isset($_POST['phone'])) {$phone = $_POST['phone'];}

    include_once '../database/database.php';
    $sql = "UPDATE customers 
            SET id = '$id',
                name = '$name',
                email = '$email',
                phone = '$phone'
            WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $conn = null;
    header('location: http://localhost/conference/customer/display_customers.php',true);

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
<h2>Edit customer infomation</h2>
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
                <td>Email</td>
                <td><input type="email" name="email" size="20"></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="phone" size="20"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Update</button></td>
            </tr>
        </table>
    </form>
</div>
<?php include '../layout/footer.php'?>
</body>
</html>

