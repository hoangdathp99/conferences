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
    if(isset($_POST['name'])) {$name = $_POST['name'];}
    if(isset($_POST['content'])) {$content = $_POST['content'];}
    if(isset($_POST['address'])) {$address = $_POST['address'];}
    if(isset($_POST['amount'])) {$amount = $_POST['amount'];}
    if(isset($_POST['time'])) {$time = $_POST['time'];}
    if(isset($_POST['img'])) {$img = $_POST['img'];}

    include_once '../database/database.php';
    $sql = "INSERT INTO conferences (name , content, address, amount, time, img)
                VALUES ('$name', '$content', '$address', '$amount', '$time', '$img')";
    $conn->exec($sql);
    $conn = null;
    header('location: http://localhost/conference/conference/display_conferences.php',true);
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
                <h2 >Thêm mới hội thảo</h2>
            </div>
            <div class="card-body">
                <form method="POST">
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
                    <!--                        <div class="form-row">-->
                    <!--                            <div class="name">Phone</div>-->
                    <!--                            <div class="value">-->
                    <!--                                <div class="input-group">-->
                    <!--                                    <input class="input&#45;&#45;style-6" type="text" name="phone" placeholder="Message sent to the employer"></input>-->
                    <!--                                </div>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                        <div class="form-row">-->
                    <!--                            <div class="name">Conferences</div>-->
                    <!--                            <div class="value">-->
                    <!--                                <select name="conference_id">-->
                    <!--                                    <?php foreach($all_conferences as $conference): ?>-->
                    <!--                                    <option value="<?php echo $conference['id'] ?>"><?php echo $conference['name'] ?></option>-->
                    <!--                                    <?php endforeach; ?>-->
                    <!--                                </select>-->

                    <!--                        </div>-->
                    <!--                        </div>-->

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