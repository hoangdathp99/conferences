<?php
session_start();
if(!isset($_SESSION["username"])){
    header("location:http://localhost/conference/");
}
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
    $stmt_conference = $conn->prepare("SELECT * FROM conferences WHERE id = $conference_id");
    $stmt_conference->execute();
    $stmt_conference->setFetchMode(PDO::FETCH_ASSOC);
    $conference = $stmt_conference->fetch();

    $stmt_check_amount = $conn->prepare("SELECT COUNT(id) FROM conference_customer WHERE conference_id = $conference_id");
    $stmt_check_amount->execute();
    $stmt_check_amount->setFetchMode(PDO::FETCH_ASSOC);
    $amount = $stmt_check_amount->fetch();
//    var_dump($amount['COUNT(id)']);
    if ($amount['COUNT(id)'] < $conference['amount']){
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
    else {
        function phpAlert($msg) {
            echo '<script type="text/javascript">alert("' . $msg . '")</script>';
        }
        phpAlert("Đã hết chỗ, vui lòng chọn hội nghị khác");
    }


//    header('location: http://localhost/conference/customer/display_customers.php',true);
}
?>
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