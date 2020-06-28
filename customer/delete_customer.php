<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id'])) {$id = $_GET['id'];}
    include '../database/database.php';
    $sql = "DELETE FROM customers
            WHERE id = $id";
    $conn->exec($sql);
    $conn = null;
    header('location: http://localhost/conference/customer/display_customers.php',true);
}
?>
