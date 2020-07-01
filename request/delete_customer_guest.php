<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id'])) {$id = $_GET['id'];}
    include '../database/database.php';

    $sql = "DELETE FROM request
            WHERE id = $id";
    $conn->exec($sql);
    $conn = null;
    header('location: http://localhost/conference/request/request_add_customer.php',true);
}
?>

