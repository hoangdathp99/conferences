<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id'])) {$id = $_GET['id'];}
    include '../database/database.php';

    $sql_delete_conference_customer = "DELETE FROM conference_customer
            WHERE customer_id = $id";
    $conn->exec($sql_delete_conference_customer);

    $sql = "DELETE FROM customers
            WHERE id = $id";
    $conn->exec($sql);
    $conn = null;
    header('location: http://localhost/conference/customer/display_customers.php',true);
}
?>
