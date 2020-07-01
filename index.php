<?php
$username = '';
$password = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'database/database.php';
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    }


    $stmt_login = $conn->prepare("SELECT * FROM admins WHERE username = '$username'");
    $stmt_login->execute();
    $stmt_login->setFetchMode(PDO::FETCH_ASSOC);
    $admin = $stmt_login->fetch();
    $conn = null;
    if ($admin['password'] == '') {
    function phpAlert($msg) {
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }
        phpAlert("wrong pass");
    }
    elseif ($admin['password'] == $password) {
        header('location: http://localhost/conference/conference/display_conferences.php',true);
    }
    else{
        phpAlert("wrong pass");
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="login.css"/>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
    </style>
</head>
<body>
<!--<div class="bg">-->
<!--    <div class="container-fluid row">-->
<!--        <div>-->
<!--            <h1>Login to continue</h1>-->
<!--        </div>-->
<!--        <div class="col-1"></div>-->
<!--        <div class="col-4 mt-5">-->
<!--            <div class="h2 mb-3" style="text-align: center; color: white">LOGIN</div>-->
<!--            <form method="POST" action="">-->
<!--                <div class="form-group">-->
<!--                    <label for="exampleInputEmail1" style="color: white">Username</label>-->
<!--                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter user name" name="username">-->
<!--                    <small id="emailHelp" class="form-text text-muted" style="color: white">We'll never share your user name with anyone else.</small>-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <label for="exampleInputPassword1" style="color: white">Password</label>-->
<!--                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">-->
<!--                </div>-->
<!--                <div style="text-align: center">-->
<!--                    <button type="submit" class="btn btn-primary">Submit</button>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
<!--        <div class="col-7"></div>-->
<!--    </div>-->
<!--</div>-->
<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <h2>Quản lý hội thảo</h2>
        </div>

        <!-- Login Form -->
        <form method="post">
            <input type="text" id="login" class="fadeIn second" name="username" placeholder="login">
            <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
            <input type="submit" class="fadeIn fourth" value="Log In">
        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
        </div>

    </div>
</div>
</body>
</html>
