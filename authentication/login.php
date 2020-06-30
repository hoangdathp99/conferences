<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
//        if(isset($_POST['name'])) {$name = $_POST['name'];}
//        if(isset($_POST['content'])) {$content = $_POST['content'];}
//        if(isset($_POST['address'])) {$address = $_POST['address'];}
//        if(isset($_POST['amount'])) {$amount = $_POST['amount'];}
//        if(isset($_POST['time'])) {$time = $_POST['time'];}
//        if(isset($_POST['img'])) {$img = $_POST['img'];}
//
//        include_once '../database/database.php';
//        $sql = "INSERT INTO conferences (name , content, address, amount, time, img)
//                    VALUES ('$name', '$content', '$address', '$amount', '$time', '$img')";
//        $conn->exec($sql);
//        $conn = null;

        //check user & pass
        // if dung =>
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
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div class="bg">
        <div class="container-fluid row">
            <div class="col-1"></div>
            <div class="col-4 mt-5">
                <div class="h2 mb-3" style="text-align: center; color: white">LOGIN</div>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="color: white">User name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter user name">
                        <small id="emailHelp" class="form-text text-muted" style="color: white">We'll never share your user name with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" style="color: white">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div style="text-align: center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-7"></div>
        </div>
    </div>
</body>
</html>
