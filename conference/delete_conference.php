<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id'])) {$id = $_GET['id'];}
    include '../database/database.php';

    $sql_delete_conference_customer = "DELETE FROM conference_customer
            WHERE conference_id = $id";
    $conn->exec($sql_delete_conference_customer);

    $sql_delete_conference = "DELETE FROM conferences
            WHERE id = $id";
    $conn->exec($sql_delete_conference);

    $conn = null;
    header('location: http://localhost/conference/conference/display_conferences.php',true);
}
?>
