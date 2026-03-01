<?php
$db_server = "localhost";
$db_username = "root";
$db_password     = "";
$db_database = "portfolio";

$conn = new  mysqli($db_server, $db_username, $db_password, $db_database);

if($conn->connect_error) {
    die("access denied" . $conn->connect_error);
}

?>