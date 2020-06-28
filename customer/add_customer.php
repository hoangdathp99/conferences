<?php
include '../database/database.php';
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

    if(isset($_POST['name'])) {$name = $_POST['name'];}
    if(isset($_POST['email'])) {$email = $_POST['email'];}
    if(isset($_POST['phone'])) {$phone = $_POST['phone'];}
    if (isset($_POST['conference_id'])) {
        $conference_id = $_POST['conference_id'];
    }

    $sql_create_customer = "INSERT INTO customers (name, email, phone)
                VALUES ('$name', '$email', '$phone')";
    $conn->exec($sql_create_customer);
    $customer_id = $conn->lastInsertId();
//    var_dump($customer_id);
//    $conn = null;

    $sql_create_conference_customer = "INSERT INTO conference_customer (conference_id, customer_id)
                VALUES ('$conference_id', '$customer_id')";
    $conn->exec($sql_create_conference_customer);
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
    <title>Library Manager</title>
    <link type="text/css" rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php include '../layout/header.php'?>
<h2>Add new customer</h2>
<div class="table">
    <form method="post" action="">
        <table>
<!--            <tr>-->
<!--                <td>ID</td>-->
<!--                <td><input type="number" name="id" size="20"></td>-->
<!--            </tr>-->
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
                <td>Conference</td>
                <td>
                    <select name="conference_id">
                        <?php foreach($all_conferences as $conference): ?>
                            <option value="<?php echo $conference['id'] ?>"><?php echo $conference['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Add</button></td>
            </tr>
        </table>
    </form>
</div>
<?php include '../layout/footer.php'?>
</body>
</html>
