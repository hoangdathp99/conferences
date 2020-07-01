<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        if(isset($_GET['guest_id'])) {$guest_id = $_GET['guest_id'];}
        include_once '../database/database.php';

        $stmt = $conn->prepare("SELECT * FROM request WHERE id = $guest_id");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $guest = $stmt->fetch();
        $name = $guest['name'];
        $email = $guest['email'];
        $phone = $guest['phone'];
        $conference_id = $guest['conference_id'];

        $sql_create_customer = "INSERT INTO customers (name, email, phone)
                VALUES ('$name', '$email', '$phone')";
        $conn->exec($sql_create_customer);
        $customer_id = $conn->lastInsertId();

        $sql_create_conference_customer = "INSERT INTO conference_customer (conference_id, customer_id)
                VALUES ('$conference_id', '$customer_id')";
        $conn->exec($sql_create_conference_customer);

        $sql = "DELETE FROM request
            WHERE id = $guest_id";
        $conn->exec($sql);
        $conn = null;

        header('location: http://localhost/conference/customer/display_customers.php',true);
    }
