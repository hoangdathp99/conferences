<?php
    $conference_id = '';

    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        include '../database/database.php';
        if(isset($_GET['id'])) {
            $conference_id = $_GET['id'];
        }

        $stmt_conference = $conn->prepare("SELECT * FROM conferences WHERE id = $conference_id");
        $stmt_conference->execute();
        $stmt_conference->setFetchMode(PDO::FETCH_ASSOC);
        $conference = $stmt_conference->fetch();

        $stmt_customers = $conn->prepare("SELECT * FROM conference_customer WHERE conference_id = $conference_id");
        $stmt_customers->execute();
        $stmt_customers->setFetchMode(PDO::FETCH_ASSOC);
        $list_customer_of_conference = $stmt_customers->fetchAll();

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
    <title>Document</title>
</head>
<body>

</body>
</html>
